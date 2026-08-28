<script>
document.addEventListener('DOMContentLoaded', function () {
  let requestController;
  let debounceTimer;

  async function updateSubmissions(url, updateHistory = true) {
    const currentRoot = document.querySelector('[data-live-submissions]');
    if (!currentRoot) return;
    requestController?.abort();
    requestController = new AbortController();
    currentRoot.style.opacity = '.62';
    const status = currentRoot.querySelector('[data-live-status]');
    if (status) status.innerHTML = '<i class="fa fa-spinner fa-spin me-1"></i>Updating...';

    try {
      const response = await fetch(url, {
        headers: { 'Accept': 'text/html', 'X-Requested-With': 'XMLHttpRequest' },
        signal: requestController.signal
      });
      if (!response.ok) throw new Error('Unable to load submissions.');
      const documentResult = new DOMParser().parseFromString(await response.text(), 'text/html');
      const nextRoot = documentResult.querySelector('[data-live-submissions]');
      if (!nextRoot) throw new Error('The results could not be updated.');
      currentRoot.replaceWith(nextRoot);
      if (updateHistory) history.replaceState({}, '', url);
    } catch (error) {
      if (error.name !== 'AbortError') {
        currentRoot.style.opacity = '1';
        if (status) status.innerHTML = '<span class="text-danger">Update failed. Please try again.</span>';
      }
    }
  }

  function submitLiveForm(form, delay = 0) {
    clearTimeout(debounceTimer);
    debounceTimer = setTimeout(function () {
      const params = new URLSearchParams(new FormData(form));
      params.delete('page');
      updateSubmissions(`${form.action}?${params.toString()}`);
    }, delay);
  }

  document.addEventListener('input', function (event) {
    const form = event.target.closest('[data-live-filter-form]');
    if (form && event.target.matches('input[type="search"]')) submitLiveForm(form, 350);
  });

  document.addEventListener('change', function (event) {
    const form = event.target.closest('[data-live-filter-form]');
    if (form && !event.target.matches('input[type="search"]')) submitLiveForm(form);
  });

  document.addEventListener('submit', function (event) {
    const form = event.target.closest('[data-live-filter-form]');
    if (!form) return;
    event.preventDefault();
    submitLiveForm(form);
  });

  document.addEventListener('click', function (event) {
    const link = event.target.closest('[data-live-submissions] .pagination a');
    if (!link) return;
    event.preventDefault();
    updateSubmissions(link.href);
  });

  window.addEventListener('popstate', () => updateSubmissions(window.location.href, false));
});
</script>
