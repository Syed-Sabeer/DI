<link rel="stylesheet" href="{{ asset('AdminAssets/css/vendors/sweetalert2.css') }}">
<script src="{{ asset('AdminAssets/js/sweet-alert/sweetalert.min.js') }}"></script>
<script>
  window.showBlogError = function (message, title = 'Unable to save blog') {
    if (window.Swal) {
      return Swal.fire({ icon: 'error', title: title, text: message, confirmButtonText: 'OK' });
    }
    window.alert(message);
  };
  document.addEventListener('DOMContentLoaded', function () {
    const errors = {{ Illuminate\Support\Js::from($errors->all()) }};
    const error = {{ Illuminate\Support\Js::from(session('error')) }};
    const warning = {{ Illuminate\Support\Js::from(session('warning')) }};
    if (errors.length || error) {
      showBlogError(errors.concat(error ? [error] : []).join('\n'));
    } else if (warning) {
      if (window.Swal) {
        Swal.fire({ icon: 'warning', title: 'Newsletter could not be queued', text: warning, confirmButtonText: 'OK' });
      } else {
        window.alert(warning);
      }
    }
  });
</script>
