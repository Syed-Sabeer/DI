@extends('layouts.app.master')

@section('title', 'Dashboard')

@section('css')
<style>
  .country-row{padding:12px 0;border-bottom:1px solid #eee}.country-row:last-child{border-bottom:0}.country-meta{display:flex;justify-content:space-between;gap:12px;margin-bottom:7px}.country-meta strong{color:#222}.country-meta span{color:#777;font-size:12px;white-space:nowrap}.country-card .progress{height:7px;background:#f0f0f0}.country-card .progress-bar{min-width:2px;background:#cf1f42}.country-card.visits .progress-bar{background:#198754}.stats-filter{display:flex;align-items:center;justify-content:flex-end;gap:10px;margin-bottom:20px}.stats-filter label{margin:0;font-weight:600;color:#333}.stats-filter select{width:auto;min-width:150px}
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
              @foreach ([['title' => 'Top Countries by Visits', 'rows' => $visitorCountries, 'class' => 'visits', 'total' => $filteredVisitorTotal], ['title' => 'Top Countries by Contact Submissions', 'rows' => $contactCountries, 'class' => 'contacts', 'total' => $filteredContactTotal]] as $countryGroup)
                <div class="col-xl-6">
                  <div class="card country-card {{ $countryGroup['class'] }}">
                    <div class="card-header card-no-border"><h5>{{ $countryGroup['title'] }}</h5><p class="mb-0 text-muted">{{ $periodLabel }} &middot; {{ number_format($countryGroup['total']) }} total records</p></div>
                    <div class="card-body pt-0">
                      @forelse ($countryGroup['rows'] as $country)
                        <div class="country-row">
                          <div class="country-meta"><strong>{{ $country->country }}</strong><span>{{ number_format($country->total) }} &middot; {{ number_format($country->percentage, 1) }}%</span></div>
                          <div class="progress" role="progressbar" aria-label="{{ $country->country }}" aria-valuenow="{{ $country->percentage }}" aria-valuemin="0" aria-valuemax="100"><div class="progress-bar" style="width: {{ $country->percentage }}%"></div></div>
                        </div>
                      @empty
                        <p class="text-muted mb-0">No country data is available yet.</p>
                      @endforelse
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>

        @endsection

@section('script')
@endsection
