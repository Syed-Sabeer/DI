@extends('layouts.app.master')

@section('title', 'Blog Newsletter Analytics')

@section('content')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row align-items-center">
        <div class="col-sm-8"><h3>Newsletter Analytics</h3><p class="text-muted mb-0">{{ $blog->title }}</p></div>
        <div class="col-sm-4 text-sm-end mt-3 mt-sm-0"><a class="btn btn-light" href="{{ route('admin.blog.index') }}"><i class="fa fa-arrow-left me-1"></i> Blogs</a></div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row g-3 mb-4">
      @foreach([
        ['Successfully Sent', (int) $summary->sent_count, 'success'],
        ['Failed', (int) $summary->failed_count, 'danger'],
        ['Queued', (int) $summary->queued_count, 'secondary'],
        ['Email Opens Detected', (int) $summary->opened_count, 'info'],
        ['Unique Blog Viewers', (int) $summary->viewed_count, 'primary'],
        ['Total Open Events', (int) $summary->total_open_events, 'info'],
        ['Total Blog View Events', (int) $summary->total_view_events, 'warning'],
      ] as [$label, $value, $color])
        <div class="col-xl-3 col-md-4 col-sm-6"><div class="card h-100"><div class="card-body"><p class="text-muted mb-1">{{ $label }}</p><h3 class="text-{{ $color }} mb-0">{{ number_format($value) }}</h3></div></div></div>
      @endforeach
      <div class="col-xl-3 col-md-4 col-sm-6"><div class="card h-100"><div class="card-body"><p class="text-muted mb-1">Open Rate</p><h3 class="mb-0">{{ number_format($openRate, 1) }}%</h3></div></div></div>
      <div class="col-xl-3 col-md-4 col-sm-6"><div class="card h-100"><div class="card-body"><p class="text-muted mb-1">View Rate</p><h3 class="mb-0">{{ number_format($viewRate, 1) }}%</h3></div></div></div>
    </div>

    <div class="card" data-live-submissions>
      <div class="card-header card-no-border pb-3">
        <div class="row g-3 align-items-end">
          <div class="col-12">
            <h5 class="mb-1">Subscriber Deliveries</h5>
            <p class="text-muted mb-0"><span>{{ number_format($deliveries->total()) }} {{ \Illuminate\Support\Str::plural('delivery', $deliveries->total()) }} found</span><span class="ms-2" data-live-status aria-live="polite"></span></p>
          </div>
          <div class="col-12">
            <form method="GET" action="{{ route('admin.blog.newsletter-analytics', $blog) }}" class="row g-2 align-items-end" data-live-filter-form>
              <div class="col-xl-4 col-lg-6">
                <label class="form-label" for="subscriber-email-search">Search subscriber email</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                  <input class="form-control" id="subscriber-email-search" type="search" name="search" value="{{ request('search') }}" placeholder="Type an email address..." autocomplete="off">
                </div>
              </div>
              <div class="col-xl-2 col-lg-3 col-md-4">
                <label class="form-label" for="engagement-filter">Engagement</label>
                <select class="form-select" id="engagement-filter" name="engagement">
                  <option value="all" @selected(request('engagement', 'all') === 'all')>All engagement</option>
                  <option value="opened" @selected(request('engagement') === 'opened')>Open detected</option>
                  <option value="not_opened" @selected(request('engagement') === 'not_opened')>Not opened</option>
                  <option value="viewed" @selected(request('engagement') === 'viewed')>Blog viewed</option>
                  <option value="not_viewed" @selected(request('engagement') === 'not_viewed')>Blog not viewed</option>
                  <option value="opened_not_viewed" @selected(request('engagement') === 'opened_not_viewed')>Opened, not viewed</option>
                </select>
              </div>
              <div class="col-xl-2 col-lg-3 col-md-4">
                <label class="form-label" for="delivery-status-filter">Delivery status</label>
                <select class="form-select" id="delivery-status-filter" name="status">
                  <option value="all" @selected(request('status', 'all') === 'all')>All statuses</option>
                  <option value="sent" @selected(request('status') === 'sent')>Sent</option>
                  <option value="queued" @selected(request('status') === 'queued')>Queued</option>
                  <option value="selected" @selected(request('status') === 'selected')>Selected</option>
                  <option value="failed" @selected(request('status') === 'failed')>Failed</option>
                  <option value="cancelled" @selected(request('status') === 'cancelled')>Cancelled</option>
                </select>
              </div>
              <div class="col-xl-2 col-lg-3 col-md-4">
                <label class="form-label" for="delivery-sort">Sort by</label>
                <select class="form-select" id="delivery-sort" name="sort">
                  <option value="latest" @selected(request('sort', 'latest') === 'latest')>Latest activity</option>
                  <option value="oldest" @selected(request('sort') === 'oldest')>Oldest activity</option>
                  <option value="most_opens" @selected(request('sort') === 'most_opens')>Most opens</option>
                  <option value="most_views" @selected(request('sort') === 'most_views')>Most views</option>
                  <option value="email" @selected(request('sort') === 'email')>Email A–Z</option>
                </select>
              </div>
              <div class="col-xl-2 col-lg-3 col-md-4 d-flex gap-2">
                <button class="btn btn-primary flex-grow-1" type="submit"><i class="fa fa-filter me-1"></i>Filter</button>
                @if(request()->filled('search') || request('engagement', 'all') !== 'all' || request('status', 'all') !== 'all' || request('sort', 'latest') !== 'latest')
                  <a class="btn btn-light" href="{{ route('admin.blog.newsletter-analytics', $blog) }}" title="Clear filters"><i class="fa fa-times"></i></a>
                @endif
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="card-body px-0 pt-0">
        <div class="table-responsive">
          <table class="table align-middle mb-0">
            <thead><tr><th>Subscriber Email</th><th>Delivery Status</th><th>Sent At</th><th>Open Detected</th><th>Open Count</th><th>Blog Viewed</th><th>View Count</th><th>Last Activity</th></tr></thead>
            <tbody>
              @forelse($deliveries as $delivery)
                @php
                  $lastActivity = collect([$delivery->last_opened_at, $delivery->last_viewed_at, $delivery->sent_at])->filter()->sortDesc()->first();
                @endphp
                <tr>
                  <td>
                    @if($delivery->subscriber)
                      <a href="{{ route('admin.newsletterlist.activity', $delivery->subscriber) }}">{{ $delivery->email }}</a>
                    @else
                      {{ $delivery->email }}
                    @endif
                  </td>
                  <td><span class="badge bg-{{ $delivery->status === 'sent' ? 'success' : ($delivery->status === 'failed' ? 'danger' : 'secondary') }}">{{ \Illuminate\Support\Str::headline($delivery->status) }}</span></td>
                  <td>{{ optional($delivery->sent_at)->format('d M Y, h:i A') ?? '—' }}</td>
                  <td>{{ $delivery->opened_at ? 'Yes' : 'No' }}</td>
                  <td>{{ number_format($delivery->open_count) }}</td>
                  <td>{{ $delivery->viewed_at ? 'Yes' : 'No' }}</td>
                  <td>{{ number_format($delivery->view_count) }}</td>
                  <td>{{ $lastActivity?->format('d M Y, h:i A') ?? '—' }}</td>
                </tr>
              @empty
                <tr><td colspan="8" class="text-center py-5 text-muted">No newsletter deliveries exist for this blog.</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <div class="px-4 pt-3">{{ $deliveries->links() }}</div>
      </div>
    </div>
    <p class="text-muted small mt-3">Open rate and view rate use successfully sent deliveries as the denominator. Email open detection may be affected by image blocking or proxying.</p>
  </div>
</div>
@endsection

@section('script')
@include('admin.submissions.partials.live-filter-script')
@endsection
