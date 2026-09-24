@extends('layouts.app.master')

@section('title', 'Subscriber Newsletter Activity')

@section('content')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row align-items-center">
        <div class="col-sm-8">
          <h3>Newsletter Activity</h3>
          <p class="text-muted mb-0">{{ $subscriber->email }}</p>
        </div>
        <div class="col-sm-4 text-sm-end mt-3 mt-sm-0">
          <a class="btn btn-light" href="{{ route('admin.newsletterlist') }}"><i class="fa fa-arrow-left me-1"></i> Subscribers</a>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row g-3 mb-4">
      @foreach([
        ['Emails Sent', (int) $summary->emails_sent, 'fa-envelope', 'primary'],
        ['Email Opens Detected', (int) $summary->emails_opened, 'fa-envelope-open', 'info'],
        ['Blogs Viewed', (int) $summary->blogs_viewed, 'fa-file-text-o', 'success'],
        ['Total Blog Views', (int) $summary->total_blog_views, 'fa-eye', 'warning'],
      ] as [$label, $value, $icon, $color])
        <div class="col-xl-3 col-sm-6">
          <div class="card h-100">
            <div class="card-body d-flex align-items-center justify-content-between">
              <div><p class="text-muted mb-1">{{ $label }}</p><h3 class="mb-0">{{ number_format($value) }}</h3></div>
              <span class="btn btn-{{ $color }} rounded-circle"><i class="fa {{ $icon }}"></i></span>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <div class="card">
      <div class="card-header card-no-border">
        <form method="GET" action="{{ route('admin.newsletterlist.activity', $subscriber) }}" class="row g-2 align-items-end">
          <div class="col-md-4">
            <label class="form-label" for="engagement">Engagement</label>
            <select class="form-select" id="engagement" name="engagement">
              <option value="all" @selected(request('engagement', 'all') === 'all')>All deliveries</option>
              <option value="opened" @selected(request('engagement') === 'opened')>Email open detected</option>
              <option value="viewed" @selected(request('engagement') === 'viewed')>Blog viewed</option>
            </select>
          </div>
          <div class="col-auto"><button class="btn btn-primary" type="submit">Apply filter</button></div>
        </form>
      </div>
      <div class="card-body px-0 pt-0">
        <div class="table-responsive">
          <table class="table align-middle mb-0">
            <thead><tr>
              <th>Blog</th><th>Delivery Status</th><th>Sent At</th><th>Open Detected</th><th>First Opened</th><th>Open Count</th><th>Blog Viewed</th><th>First Viewed</th><th>View Count</th><th>Last Activity</th>
            </tr></thead>
            <tbody>
              @forelse($deliveries as $delivery)
                @php
                  $lastActivity = collect([$delivery->last_opened_at, $delivery->last_viewed_at, $delivery->sent_at])->filter()->sortDesc()->first();
                @endphp
                <tr>
                  <td>
                    @if($delivery->blog)
                      <a href="{{ route('admin.blog.newsletter-analytics', $delivery->blog) }}">{{ $delivery->blog->title }}</a>
                    @else
                      <span class="text-muted">Deleted blog</span>
                    @endif
                  </td>
                  <td><span class="badge bg-{{ $delivery->status === 'sent' ? 'success' : ($delivery->status === 'failed' ? 'danger' : 'secondary') }}">{{ \Illuminate\Support\Str::headline($delivery->status) }}</span></td>
                  <td>{{ optional($delivery->sent_at)->format('d M Y, h:i A') ?? '—' }}</td>
                  <td>{{ $delivery->opened_at ? 'Yes' : 'No' }}</td>
                  <td>{{ optional($delivery->opened_at)->format('d M Y, h:i A') ?? '—' }}</td>
                  <td>{{ number_format($delivery->open_count) }}</td>
                  <td>{{ $delivery->viewed_at ? 'Yes' : 'No' }}</td>
                  <td>{{ optional($delivery->viewed_at)->format('d M Y, h:i A') ?? '—' }}</td>
                  <td>{{ number_format($delivery->view_count) }}</td>
                  <td>{{ $lastActivity?->format('d M Y, h:i A') ?? '—' }}</td>
                </tr>
              @empty
                <tr><td colspan="10" class="text-center py-5 text-muted">No matching newsletter deliveries.</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <div class="px-4 pt-3">{{ $deliveries->links() }}</div>
      </div>
    </div>
    <p class="text-muted small mt-3">Email open detection is approximate because some mail clients block, proxy, or preload tracking images. Tracked blog visits are a stronger engagement signal.</p>
  </div>
</div>
@endsection
