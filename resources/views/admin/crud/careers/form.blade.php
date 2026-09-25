@extends('layouts.app.master')

@section('title', $career->exists ? 'Edit Career' : 'Add Career')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
<style>
  .point-row{display:flex;gap:.5rem;margin-bottom:.5rem}
  .point-row .form-control{flex:1}
  .section-box{border:1px solid #e6e9ef;border-radius:.6rem;padding:1rem;margin-top:1rem}
  .alert-broadcast-card{position:relative;overflow:hidden;padding:22px;border:1px solid rgba(184,233,0,.35);border-radius:16px;background:linear-gradient(135deg,#10150f 0%,#1b2418 100%);color:#fff;box-shadow:0 14px 34px rgba(18,26,14,.14)}
  .alert-broadcast-card::after{content:'';position:absolute;width:150px;height:150px;top:-80px;right:-45px;border-radius:50%;background:rgba(184,233,0,.13);filter:blur(2px);pointer-events:none}
  .alert-broadcast-icon{display:grid;width:48px;height:48px;flex:0 0 48px;place-items:center;border-radius:14px;background:#b8e900;color:#10150f;font-size:22px;box-shadow:0 9px 24px rgba(184,233,0,.22)}
  .alert-broadcast-card .form-check-input{width:2.75rem;height:1.45rem;margin-top:0;cursor:pointer;border-color:rgba(255,255,255,.38);background-color:rgba(255,255,255,.14)}
  .alert-broadcast-card .form-check-input:checked{border-color:#b8e900;background-color:#b8e900}
  .alert-broadcast-card .form-check-input:focus{border-color:#b8e900;box-shadow:0 0 0 .2rem rgba(184,233,0,.18)}
  .alert-broadcast-card label{cursor:pointer}
  .alert-broadcast-meta{color:rgba(255,255,255,.66);font-size:.875rem}
  .alert-broadcast-count{color:#b8e900;font-weight:700}
  .alert-broadcast-note{padding:10px 14px;border-radius:10px;background:rgba(255,255,255,.07);color:rgba(255,255,255,.78);font-size:.83rem;line-height:1.55}
</style>
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

      {{-- ============ Job alert broadcast ============ --}}
      <div class="col-12">
        <div class="alert-broadcast-card">
          <div class="d-flex align-items-start gap-3 position-relative" style="z-index:1;">
            <div class="alert-broadcast-icon"><i class="fa fa-bullhorn"></i></div>
            <div class="flex-grow-1">
              <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
                <div>
                  <label class="form-label text-white fw-bold fs-6 mb-1" for="send-alert">Email this job opening to subscribers</label>
                  <div class="alert-broadcast-meta">
                    Available recipients:
                    <span class="alert-broadcast-count">{{ number_format($subscriberCount) }} {{ \Illuminate\Support\Str::plural('subscriber', $subscriberCount) }}</span>.
                    @if($editing && $alertSentCount > 0)
                      <span class="ms-1">Already emailed to {{ number_format($alertSentCount) }}.</span>
                    @endif
                  </div>
                </div>
                <div class="form-check form-switch m-0">
                  <input type="hidden" name="send_alert" value="0">
                  <input class="form-check-input" id="send-alert" name="send_alert" type="checkbox" value="1" role="switch" @checked(old('send_alert', ! $editing)) @disabled($subscriberCount === 0)>
                </div>
              </div>

              <div class="mt-3" id="alert-options">
                <label for="alert-audience" class="form-label text-white">Send to</label>
                <select name="alert_audience" id="alert-audience" class="form-select">
                  <option value="all" @selected(old('alert_audience', $alertAudience) === 'all')>All subscribers</option>
                  <option value="selected" @selected(old('alert_audience', $alertAudience) === 'selected')>Specific subscribers</option>
                </select>
                <div id="alert-recipients" class="mt-3" style="color:#212529">
                  <label for="alert-subscriber-ids" class="form-label text-white">Choose subscribers</label>
                  <select name="alert_subscriber_ids[]" id="alert-subscriber-ids" class="form-select" multiple>
                    @foreach($subscribers as $subscriber)
                      <option value="{{ $subscriber->id }}" @selected(in_array($subscriber->id, (array) old('alert_subscriber_ids', $selectedSubscriberIds)))>{{ $subscriber->email }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              @if($editing)
              <div class="form-check form-switch mt-3 ps-0 d-flex align-items-center gap-2">
                <input type="hidden" name="alert_recipients_enabled" value="0">
                <input class="form-check-input m-0" id="alert-recipients-enabled" name="alert_recipients_enabled" type="checkbox" value="1" role="switch" @checked(old('alert_recipients_enabled', $alertRecipientsEnabled)) @disabled($subscriberCount === 0)>
                <label class="form-check-label text-white mb-0" for="alert-recipients-enabled">Keep this audience eligible for a resend</label>
              </div>
              @endif

              <div class="alert-broadcast-note mt-3">
                <i class="fa fa-info-circle me-1"></i>
                Each subscriber receives this opening only once — re-saving will not send a duplicate.
                Use <strong>Resend</strong> on the career list to email it again.
              </div>

              <div class="alert-broadcast-meta mt-2">
                <i class="fa fa-clock-o me-1"></i>
                Saving stays fast; emails go out through the queue worker in the background.
                <a class="ms-1" style="color:#b8e900" href="{{ route('admin.newsletterlist') }}">View subscribers</a>
                @if($editing && $alertDeliveryCount > 0)
                  <a class="ms-2" style="color:#b8e900" href="{{ route('admin.careers.alert-analytics', $career) }}">Alert analytics</a>
                @endif
              </div>

              @if($subscriberCount === 0)
                <div class="alert-broadcast-meta mt-2 text-warning"><i class="fa fa-exclamation-triangle me-1"></i> There are no subscribers yet, so no alert can be sent.</div>
              @endif
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 d-flex gap-2"><button class="btn btn-primary" type="submit">{{ $editing ? 'Update Career' : 'Save Career' }}</button><a class="btn btn-light" href="{{ route('admin.careers.index') }}">Cancel</a></div>
    </form>
  </div></div>
</div></div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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

document.addEventListener('DOMContentLoaded', function () {
  if (window.jQuery && jQuery.fn.select2) {
    jQuery('#alert-subscriber-ids').select2({ width: '100%', placeholder: 'Search subscriber emails' });
  }

  const sendToggle = document.getElementById('send-alert');
  const audience = document.getElementById('alert-audience');
  const recipients = document.getElementById('alert-subscriber-ids');
  const keepToggle = document.getElementById('alert-recipients-enabled');

  function refresh() {
    const wantsAudience = (sendToggle && sendToggle.checked) || (keepToggle && keepToggle.checked);
    const specific = audience.value === 'selected';

    document.getElementById('alert-options').hidden = !wantsAudience;
    audience.disabled = !wantsAudience;
    document.getElementById('alert-recipients').hidden = !specific;
    recipients.disabled = !wantsAudience || !specific;
  }

  sendToggle?.addEventListener('change', refresh);
  keepToggle?.addEventListener('change', refresh);
  audience.addEventListener('change', refresh);
  refresh();
});
</script>
@endsection
