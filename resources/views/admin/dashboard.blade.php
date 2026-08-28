@extends('layouts.app.master')

@section('title', 'Dashboard')

@section('css')
<style>
  .country-row{padding:12px 0;border-bottom:1px solid #eee}.country-row:last-child{border-bottom:0}.country-meta{display:flex;justify-content:space-between;gap:12px;margin-bottom:7px}.country-meta strong{color:#222}.country-meta span{color:#777;font-size:12px;white-space:nowrap}.country-card .progress{height:7px;background:#f0f0f0}.country-card .progress-bar{min-width:2px;background:#cf1f42}.country-card.visits .progress-bar{background:#198754}.stats-filter{display:flex;align-items:center;justify-content:flex-end;gap:10px;margin-bottom:20px}.stats-filter label{margin:0;font-weight:600;color:#333}.stats-filter select{width:auto;min-width:150px}
  .location-drill-button{display:block;width:100%;padding:0;border:0;background:transparent;text-align:inherit}.location-drill-button:hover strong,.location-drill-button:focus-visible strong{color:#198754}.location-drill-button:focus-visible{outline:2px solid #198754;outline-offset:5px;border-radius:4px}.location-drill-button .country-meta strong{display:flex;align-items:center;gap:6px}.location-drill-button .country-meta strong::after{content:'\ea6e';font-family:'remixicon';font-size:16px;color:#198754}.drilldown-panel{display:none}.drilldown-panel.is-open{display:block}.drilldown-breadcrumb{display:flex;flex-wrap:wrap;align-items:center;gap:6px}.drilldown-breadcrumb button{border:0;background:transparent;padding:2px;color:#198754;font-weight:600}.drilldown-row{padding:13px 0;border-bottom:1px solid #eee}.drilldown-row:last-child{border-bottom:0}.drilldown-loading{display:flex;align-items:center;justify-content:center;gap:10px;min-height:140px}.drilldown-loading i{font-size:22px;animation:location-spin .8s linear infinite}@keyframes location-spin{to{transform:rotate(360deg)}}
</style>
@endsection

@section('content')

  <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Dashboard</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       
                        <svg class="stroke-icon">
                          <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    {{-- <li class="breadcrumb-item">Dashboard</li> --}}
                    <li class="breadcrumb-item active">Dashboard</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid dashboard-09">
            <div class="row">
              <div class="col-xxl-12 box-col-12"> 
                <div class="row"> 
                  <div class="col-md-6 col-sm-6"> 
                    <div class="card compare-order">
                      <div class="card-header card-no-border">
                        <div class="header-top"> 
                          <div class="compare-icon shadow-primary">
                            <svg class="fill-primary">
                              <use href="{{asset('AdminAssets/svg/icon-sprite.svg#crm-user')}}"></use>
                            </svg>
                          </div>
                      
                        </div>
                      </div>

                         <div class="card-body pt-0"> <span class="f-w-500 c-o-light">Total Visits</span>
                        <h4 class="mb-2"><span class="counter" data-target="{{ $totalVisitors }}"></span></h4>
                        {{-- <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
                          <div class="progress-bar bg-success" style="width: 58%"></div>
                        </div><span class="user-growth f-12 f-w-500"><i class="icon-arrow-up txt-success"></i><span class="txt-success">+7.9%</span></span><span class="user-text">last month</span> --}}
                      </div>


                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6"> 
                    <div class="card compare-order">
                      <div class="card-header card-no-border">
                        <div class="header-top"> 
                          <div class="compare-icon shadow-success">
                            <svg class="fill-success">
                              <use href="{{asset('AdminAssets/svg/icon-sprite.svg#crm-lead')}}"></use>
                            </svg>
                          </div>
                         
                        </div>
                      </div>



                   
     <div class="card-body pt-0"> <span class="f-w-500 c-o-light">Total Contacts Submitted</span>
                        <h4 class="mb-2">
                           <span class="counter" data-target="{{ $totalContacts }}"></span></h4>
                        {{-- <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
                          <div class="progress-bar bg-primary" style="width: 58%"></div>
                        </div> --}}
                        {{-- <span class="user-growth f-12 f-w-500"><i class="icon-arrow-down txt-danger"></i><span class="txt-danger">-4.3%</span></span><span class="user-text">last month</span> --}}
                      </div>


                    </div>
                  </div>
                
               
                </div>
              </div>
     
         
            </div>
            <form class="stats-filter" method="GET" action="{{ route('admin.dashboard') }}">
              <label for="stats-period">Filter statistics:</label>
              <select class="form-select" id="stats-period" name="period" onchange="this.form.submit()">
                <option value="all" @selected($period === 'all')>All Time</option>
                <option value="today" @selected($period === 'today')>Today</option>
                <option value="week" @selected($period === 'week')>Last 7 Days</option>
              </select>
              <noscript><button class="btn btn-primary" type="submit">Apply</button></noscript>
            </form>
            <div class="row">
              @foreach ([['title' => 'Top Countries by Visits', 'rows' => $visitorCountries, 'class' => 'visits', 'total' => $filteredVisitorTotal, 'drillable' => true], ['title' => 'Top Countries by Contact Submissions', 'rows' => $contactCountries, 'class' => 'contacts', 'total' => $filteredContactTotal, 'drillable' => false]] as $countryGroup)
                <div class="col-xl-6">
                  <div class="card country-card {{ $countryGroup['class'] }}">
                    <div class="card-header card-no-border"><h5>{{ $countryGroup['title'] }}</h5><p class="mb-0 text-muted">{{ $periodLabel }} &middot; {{ number_format($countryGroup['total']) }} total records</p></div>
                    <div class="card-body pt-0">
                      @forelse ($countryGroup['rows'] as $country)
                        <div class="country-row">
                          @if($countryGroup['drillable'])<button class="location-drill-button" type="button" data-location-country="{{ $country->country }}">@endif
                            <div class="country-meta"><strong>{{ $country->country }}</strong><span>{{ number_format($country->total) }} &middot; {{ number_format($country->percentage, 1) }}%</span></div>
                            <div class="progress" role="progressbar" aria-label="{{ $country->country }}" aria-valuenow="{{ $country->percentage }}" aria-valuemin="0" aria-valuemax="100"><div class="progress-bar" style="width: {{ $country->percentage }}%"></div></div>
                          @if($countryGroup['drillable'])</button>@endif
                        </div>
                      @empty
                        <p class="text-muted mb-0">No country data is available yet.</p>
                      @endforelse
                    </div>
                  </div>
                  @if($countryGroup['drillable'])
                  <div class="card drilldown-panel" id="location-drilldown" data-endpoint="{{ route('admin.dashboard.location-breakdown') }}" data-period="{{ $period }}">
                    <div class="card-header card-no-border d-flex justify-content-between align-items-start gap-3"><div><h5 class="mb-2" data-drilldown-title>Location Details</h5><div class="drilldown-breadcrumb" data-drilldown-breadcrumb></div></div><button class="btn-close" type="button" data-drilldown-close aria-label="Close"></button></div>
                    <div class="card-body pt-0" data-drilldown-body></div>
                    <div class="card-footer text-muted small">Percentages are calculated within the selected parent location. Detailed location data is available for visits recorded after this feature was enabled.</div>
                  </div>
                  @endif
                </div>
              @endforeach
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>

        @endsection

@section('script')
<script>
document.addEventListener('DOMContentLoaded', function () {
  const panel = document.getElementById('location-drilldown');
  if (!panel) return;
  const body = panel.querySelector('[data-drilldown-body]');
  const title = panel.querySelector('[data-drilldown-title]');
  const breadcrumb = panel.querySelector('[data-drilldown-breadcrumb]');
  const selection = { country: null, state: null, city: null };
  const labels = { state: 'States / Regions', city: 'Cities', area: 'Areas' };

  const escapeHtml = value => String(value).replace(/[&<>'"]/g, char => ({'&':'&amp;','<':'&lt;','>':'&gt;',"'":'&#039;','"':'&quot;'}[char]));

  function renderBreadcrumb(level) {
    const items = [];
    if (selection.country) items.push(`<button type="button" data-crumb-level="state">${escapeHtml(selection.country)}</button>`);
    if (selection.state && level !== 'state') items.push(`<i class="fa fa-angle-right"></i><button type="button" data-crumb-level="city">${escapeHtml(selection.state)}</button>`);
    if (selection.city && level === 'area') items.push(`<i class="fa fa-angle-right"></i><span>${escapeHtml(selection.city)}</span>`);
    breadcrumb.innerHTML = items.join('');
  }

  async function loadLevel(level) {
    panel.classList.add('is-open');
    title.textContent = labels[level];
    renderBreadcrumb(level);
    body.innerHTML = '<div class="drilldown-loading"><i class="ri-loader-4-line"></i><span>Loading location data...</span></div>';
    const params = new URLSearchParams({ level, period: panel.dataset.period, country: selection.country });
    if (selection.state) params.set('state', selection.state);
    if (selection.city) params.set('city', selection.city);
    try {
      const response = await fetch(`${panel.dataset.endpoint}?${params}`, { headers: { Accept: 'application/json' } });
      const data = await response.json();
      if (!response.ok) throw new Error(data.message || 'Unable to load location data.');
      if (!data.rows.length) { body.innerHTML = '<p class="text-muted mb-0">No detailed location data is available for this selection yet.</p>'; return; }
      const nextLevel = level === 'state' ? 'city' : (level === 'city' ? 'area' : null);
      body.innerHTML = data.rows.map(row => `<div class="drilldown-row">${nextLevel ? `<button type="button" class="location-drill-button" data-next-level="${nextLevel}" data-location-name="${escapeHtml(row.name)}">` : ''}<div class="country-meta"><strong>${escapeHtml(row.name)}</strong><span>${Number(row.total).toLocaleString()} · ${Number(row.percentage).toFixed(1)}%</span></div><div class="progress"><div class="progress-bar bg-success" style="width:${Math.max(0, Math.min(100, Number(row.percentage)))}%"></div></div>${nextLevel ? '</button>' : ''}</div>`).join('');
      panel.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    } catch (error) {
      body.innerHTML = `<div class="alert alert-danger mb-0">${escapeHtml(error.message)}</div>`;
    }
  }

  document.querySelectorAll('[data-location-country]').forEach(button => button.addEventListener('click', function () {
    selection.country = this.dataset.locationCountry; selection.state = null; selection.city = null; loadLevel('state');
  }));
  panel.addEventListener('click', function (event) {
    const next = event.target.closest('[data-next-level]');
    if (next) { if (next.dataset.nextLevel === 'city') { selection.state = next.dataset.locationName; selection.city = null; } else selection.city = next.dataset.locationName; loadLevel(next.dataset.nextLevel); return; }
    const crumb = event.target.closest('[data-crumb-level]');
    if (crumb) { if (crumb.dataset.crumbLevel === 'state') { selection.state = null; selection.city = null; } else selection.city = null; loadLevel(crumb.dataset.crumbLevel); }
  });
  panel.querySelector('[data-drilldown-close]').addEventListener('click', () => panel.classList.remove('is-open'));
});
</script>
@endsection
