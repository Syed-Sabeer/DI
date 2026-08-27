@extends('layouts.app.master')

@section('title', $career->exists ? 'Edit Career' : 'Add Career')

@section('css')
<style>.point-row{display:flex;gap:.5rem;margin-bottom:.5rem}.point-row .form-control{flex:1}.section-box{border:1px solid #e6e9ef;border-radius:.6rem;padding:1rem;margin-top:1rem}</style>
@endsection

@section('content')
@php($editing = $career->exists)
<div class="page-body"><div class="container-fluid">
  <div class="page-title"><div class="row"><div class="col-sm-6"><h3>{{ $editing ? 'Edit' : 'Add' }} Career</h3></div></div></div>
  @if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
  <div class="card"><div class="card-body">
    <form method="POST" action="{{ $editing ? route('admin.careers.update', $career) : route('admin.careers.store') }}" class="row g-3">
      @csrf @if($editing) @method('PUT') @endif
      <div class="col-md-8"><label class="form-label">Job Title *</label><input class="form-control" name="job_title" required value="{{ old('job_title', $career->job_title) }}"></div>
      <div class="col-md-4"><label class="form-label">Slug <small>(optional)</small></label><input class="form-control" name="slug" value="{{ old('slug', $career->slug) }}"></div>
      <div class="col-12"><label class="form-label">Job Description *</label><textarea class="form-control" name="description" rows="5" required>{{ old('description', $career->description) }}</textarea></div>
      @foreach(['experience'=>'Experience','education'=>'Education','salary_range'=>'Salary Range','job_type'=>'Job Type','location'=>'Location','work_schedule'=>'Work Schedule','position'=>'Position','workweek'=>'Workweek'] as $name => $label)
      <div class="col-md-6"><label class="form-label">{{ $label }}</label><input class="form-control" name="{{ $name }}" value="{{ old($name, $career->{$name}) }}"></div>
      @endforeach
      <div class="col-md-6"><label class="form-label">Application Deadline</label><input class="form-control" type="date" name="application_deadline" value="{{ old('application_deadline', optional($career->application_deadline)->format('Y-m-d')) }}"></div>
      <div class="col-md-6 d-flex align-items-end"><div class="form-check form-switch mb-2"><input type="hidden" name="visibility" value="0"><input class="form-check-input" type="checkbox" name="visibility" value="1" id="visibility" @checked(old('visibility', $career->exists ? $career->visibility : true))><label class="form-check-label" for="visibility">Visible on website</label></div></div>

      @foreach([
        'responsibilities' => 'Key Responsibilities',
        'qualifications' => 'Qualifications',
        'experience' => 'Experience Details'
      ] as $key => $heading)
      <div class="col-12"><div class="section-box">
        <h5>{{ $heading }}</h5>
        <label class="form-label">Description</label>
        <textarea class="form-control mb-3" name="{{ $key }}_description" rows="3">{{ old($key.'_description', $career->{$key.'_description'}) }}</textarea>
        <div class="d-flex justify-content-between align-items-center mb-2"><label class="form-label mb-0">Points</label><button class="btn btn-sm btn-outline-primary" type="button" data-add-point="{{ $key }}"><i class="fa fa-plus me-1"></i>Add Point</button></div>
        <div data-points="{{ $key }}">
          @php($points = old($key.'_points', $career->{$key.'_points'} ?: ['']))
          @foreach($points as $point)
          <div class="point-row"><input class="form-control" name="{{ $key }}_points[]" value="{{ $point }}" placeholder="Enter a point"><button class="btn btn-outline-danger" type="button" data-remove-point><i class="fa fa-times"></i></button></div>
          @endforeach
        </div>
      </div></div>
      @endforeach

      <div class="col-12 d-flex gap-2"><button class="btn btn-primary" type="submit">{{ $editing ? 'Update Career' : 'Save Career' }}</button><a class="btn btn-light" href="{{ route('admin.careers.index') }}">Cancel</a></div>
    </form>
  </div></div>
</div></div>
@endsection

@section('script')
<script>
document.addEventListener('click', function (event) {
  const addButton = event.target.closest('[data-add-point]');
  if (addButton) {
    const key = addButton.dataset.addPoint;
    const row = document.createElement('div');
    row.className = 'point-row';
    row.innerHTML = `<input class="form-control" name="${key}_points[]" placeholder="Enter a point"><button class="btn btn-outline-danger" type="button" data-remove-point><i class="fa fa-times"></i></button>`;
    document.querySelector(`[data-points="${key}"]`).appendChild(row);
  }
  const removeButton = event.target.closest('[data-remove-point]');
  if (removeButton) removeButton.closest('.point-row').remove();
});
</script>
@endsection
