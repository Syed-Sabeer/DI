@extends('layouts.app.master')

@section('title', 'Careers')

@section('content')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title"><div class="row"><div class="col-sm-6"><h3>Career List</h3></div></div></div>
    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    <div class="card">
      <div class="card-header text-end"><a class="btn btn-primary" href="{{ route('admin.careers.create') }}"><i class="fa fa-plus me-2"></i>Add Career</a></div>
      <div class="card-body px-0 pt-0"><div class="table-responsive">
        <table class="table align-middle">
          <thead><tr><th>#</th><th>Job Title</th><th>Location</th><th>Job Type</th><th>Experience</th><th>Deadline</th><th>Visible</th><th>Actions</th></tr></thead>
          <tbody>
          @forelse($careers as $career)
            <tr>
              <td>{{ $careers->firstItem() + $loop->index }}</td>
              <td><strong>{{ $career->job_title }}</strong><br><small class="text-muted">{{ $career->slug }}</small></td>
              <td>{{ $career->location ?: '—' }}</td>
              <td>{{ $career->job_type ?: '—' }}</td>
              <td>{{ $career->experience ?: '—' }}</td>
              <td>{{ optional($career->application_deadline)->format('d M Y') ?: '—' }}</td>
              <td><form method="POST" action="{{ route('admin.careers.toggle-visibility', $career) }}">@csrf<div class="form-check form-switch"><input class="form-check-input" type="checkbox" @checked($career->visibility) onchange="this.form.submit()"></div></form></td>
              <td><div class="d-flex gap-2">
                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.careers.edit', $career) }}"><i class="fa fa-edit"></i></a>
                <form method="POST" action="{{ route('admin.careers.destroy', $career) }}" onsubmit="return confirm('Delete this career?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger" type="submit"><i class="fa fa-trash"></i></button></form>
              </div></td>
            </tr>
          @empty<tr><td colspan="8" class="text-center py-4">No careers added yet.</td></tr>@endforelse
          </tbody>
        </table>
      </div>{{ $careers->links() }}</div>
    </div>
  </div>
</div>
@endsection
