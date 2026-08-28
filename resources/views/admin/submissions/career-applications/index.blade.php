@extends('layouts.app.master')

@section('title', 'Career Applications')

@section('css')
<style>
  .candidate-avatar{width:42px;height:42px;border-radius:12px;display:grid;place-items:center;background:rgba(184,233,0,.18);color:#627d00;font-weight:800}
  .application-meta{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:12px}
  .application-meta>div{padding:12px;border:1px solid var(--border);border-radius:10px}
  .application-meta small{display:block;color:#8a8f98;margin-bottom:4px}.application-meta strong{word-break:break-word}
  .application-address{padding:14px;border-radius:10px;background:rgba(184,233,0,.08);border-left:3px solid #b8e900}
  @media(max-width:575px){.application-meta{grid-template-columns:1fr}}
</style>
@endsection

@section('content')
<div class="page-body">
  <div class="container-fluid"><div class="page-title"><div class="row"><div class="col-sm-6"><h3>Career Applications</h3></div><div class="col-sm-6"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><svg class="stroke-icon"><use href="{{ asset('AdminAssets/svg/icon-sprite.svg#stroke-home') }}"></use></svg></a></li><li class="breadcrumb-item">Submissions</li><li class="breadcrumb-item active">Career Applications</li></ol></div></div></div></div>
  <div class="container-fluid list-product-view product-wrapper"><div class="row"><div class="col-12">
    @if(session('success'))<div class="alert alert-success alert-dismissible fade show">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>@endif
    <div class="card" data-live-submissions>
      <div class="card-header card-no-border pb-3">
        <form method="GET" action="{{ route('admin.career-applications.index') }}" class="row g-3 align-items-end" data-live-filter-form>
          <div class="col-xl-3 col-md-6"><label class="form-label" for="application-search">Search</label><input class="form-control" id="application-search" type="search" name="search" value="{{ request('search') }}" placeholder="Candidate, email, job, city..."></div>
          <div class="col-xl-2 col-md-6"><label class="form-label" for="application-career">Position</label><select class="form-select" id="application-career" name="career_id"><option value="">All positions</option>@foreach($careers as $career)<option value="{{ $career->id }}" @selected((string)request('career_id') === (string)$career->id)>{{ $career->job_title }}</option>@endforeach</select></div>
          <div class="col-xl-2 col-md-3"><label class="form-label" for="application-from">From</label><input class="form-control" id="application-from" type="date" name="date_from" value="{{ request('date_from') }}"></div>
          <div class="col-xl-2 col-md-3"><label class="form-label" for="application-to">To</label><input class="form-control" id="application-to" type="date" name="date_to" value="{{ request('date_to') }}"></div>
          <div class="col-xl-1 col-md-3"><label class="form-label" for="application-sort">Sort</label><select class="form-select" id="application-sort" name="sort"><option value="newest" @selected(request('sort','newest')==='newest')>Newest</option><option value="oldest" @selected(request('sort')==='oldest')>Oldest</option></select></div>
          <div class="col-xl-2 col-md-3 d-flex gap-2"><button class="btn btn-primary flex-fill" type="submit"><i class="fa fa-search me-1"></i>Filter</button><a class="btn btn-light" href="{{ route('admin.career-applications.index') }}" title="Clear filters"><i class="fa fa-times"></i></a></div>
        </form>
        <p class="text-muted mb-0 mt-3">{{ number_format($applications->total()) }} {{ Str::plural('application', $applications->total()) }} found <span class="ms-2" data-live-status aria-live="polite"></span></p>
      </div>
      <div class="card-body px-0 pt-0"><div class="list-product"><div class="recent-table table-responsive custom-scrollbar product-list-table"><table class="table"><thead><tr><th></th><th>No.</th><th>Candidate</th><th>Position</th><th>Location</th><th>Submitted</th><th>Actions</th></tr></thead><tbody>
      @forelse($applications as $application)
        <tr><td><div class="candidate-avatar">{{ strtoupper(substr($application->first_name,0,1).substr($application->last_name,0,1)) }}</div></td><td>{{ $applications->firstItem()+$loop->index }}</td><td><strong>{{ $application->first_name }} {{ $application->last_name }}</strong><small class="d-block text-muted">{{ $application->email }}</small></td><td>{{ $application->career?->job_title ?? 'Deleted position' }}</td><td>{{ $application->city }}, {{ $application->country }}</td><td>{{ $application->created_at->format('d M Y') }}<small class="d-block text-muted">{{ $application->created_at->format('h:i A') }}</small></td><td><div class="product-action"><button class="square-white" data-bs-toggle="modal" data-bs-target="#applicationModal{{ $application->id }}" title="View"><svg><use href="{{ asset('AdminAssets/svg/icon-sprite.svg#eye') }}"></use></svg></button><form action="{{ route('admin.career-applications.destroy',$application) }}" method="POST" onsubmit="return confirm('Delete this application and its uploaded documents?')">@csrf @method('DELETE')<button class="square-white trash-3 border-0 bg-transparent p-0" type="submit"><svg><use href="{{ asset('AdminAssets/svg/icon-sprite.svg#trash1') }}"></use></svg></button></form></div></td></tr>
        <div class="modal fade" id="applicationModal{{ $application->id }}" tabindex="-1"><div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"><div class="modal-content"><div class="modal-header"><div><h5 class="modal-title">{{ $application->first_name }} {{ $application->last_name }}</h5><small class="text-muted">Application for {{ $application->career?->job_title ?? 'Deleted position' }}</small></div><button class="btn-close" type="button" data-bs-dismiss="modal"></button></div><div class="modal-body">
          <div class="application-meta mb-3">@foreach(['Email'=>$application->email,'Phone'=>$application->phone,'Experience'=>$application->years_experience,'Current workplace'=>$application->current_workplace ?: 'Not provided','Current position'=>$application->current_position ?: 'Not provided','Current salary'=>$application->current_salary ?: 'Not provided','Expected salary'=>$application->expected_salary ?: 'Not provided','Submitted'=>$application->created_at->format('d M Y, h:i A')] as $label=>$value)<div><small>{{ $label }}</small><strong>{{ $value }}</strong></div>@endforeach</div>
          <div class="application-address mb-3"><strong>Address</strong><div>{{ $application->address }}, {{ $application->city }}, {{ $application->state }}, {{ $application->postal_code }}, {{ $application->country }}</div></div>
          <div class="d-flex flex-wrap gap-2 mb-3">@if($application->linkedin_url)<a class="btn btn-light" href="{{ $application->linkedin_url }}" target="_blank" rel="noopener"><i class="fa-brands fa-linkedin me-1"></i>LinkedIn</a>@endif @if($application->github_url)<a class="btn btn-light" href="{{ $application->github_url }}" target="_blank" rel="noopener"><i class="fa-brands fa-github me-1"></i>GitHub</a>@endif</div>
          <div class="d-flex flex-wrap gap-2"><a class="btn btn-primary" href="{{ route('admin.career-applications.download',[$application,'resume']) }}"><i class="fa fa-download me-1"></i>Download Resume</a>@if($application->cover_letter_path)<a class="btn btn-outline-primary" href="{{ route('admin.career-applications.download',[$application,'cover-letter']) }}"><i class="fa fa-download me-1"></i>Download Cover Letter</a>@endif</div>
        </div><div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button></div></div></div></div>
      @empty<tr><td colspan="7" class="text-center py-5"><h6 class="mb-1">No career applications found</h6><p class="text-muted mb-0">New candidate applications will appear here.</p></td></tr>@endforelse
      </tbody></table></div><div class="px-4 pt-3">{{ $applications->links() }}</div></div></div>
    </div>
  </div></div></div>
</div>
@endsection

@section('script')
@include('admin.submissions.partials.live-filter-script')
@endsection
