@extends('layouts.app.master')

@section('title', 'Careers')

@section('content')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title"><div class="row"><div class="col-sm-6"><h3>Career List</h3></div></div></div>

    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
    @endif
    @if(session('warning'))
      <div class="alert alert-warning alert-dismissible fade show" role="alert">{{ session('warning') }}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
    @endif
    @if($errors->has('password'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $errors->first('password') }}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
    @endif

    <div class="card">
      <div class="card-header text-end"><a class="btn btn-primary" href="{{ route('admin.careers.create') }}"><i class="fa fa-plus me-2"></i>Add Career</a></div>
      <div class="card-body px-0 pt-0"><div class="table-responsive">
        <table class="table align-middle">
          <thead><tr><th>#</th><th>Job Title</th><th>Location</th><th>Job Type</th><th>Experience</th><th>Deadline</th><th>Job Alert</th><th>Visible</th><th>Actions</th></tr></thead>
          <tbody>
          @forelse($careers as $career)
            <tr>
              <td>{{ $careers->firstItem() + $loop->index }}</td>
              <td><strong>{{ $career->job_title }}</strong><br><small class="text-muted">{{ $career->slug }}</small></td>
              <td>{{ $career->location ?: '—' }}</td>
              <td>{{ $career->job_type ?: '—' }}</td>
              <td>{{ $career->experience ?: '—' }}</td>
              <td>{{ optional($career->application_deadline)->format('d M Y') ?: '—' }}</td>
              <td>
                @if($career->alert_deliveries_count > 0)
                  <span class="badge bg-light text-dark border">{{ number_format($career->alert_deliveries_count) }} {{ \Illuminate\Support\Str::plural('recipient', $career->alert_deliveries_count) }}</span>
                @else
                  <span class="text-muted">Not sent</span>
                @endif
              </td>
              <td><form method="POST" action="{{ route('admin.careers.toggle-visibility', $career) }}">@csrf<div class="form-check form-switch"><input class="form-check-input" type="checkbox" @checked($career->visibility) onchange="this.form.submit()"></div></form></td>
              <td><div class="d-flex gap-2 flex-wrap">
                @if($career->alert_deliveries_count > 0)
                  <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.careers.alert-analytics', $career) }}" title="Job alert analytics"><i class="fa fa-line-chart me-1"></i>Analytics</a>
                @endif
                @if($career->alert_resendable_count > 0)
                  <button type="button" class="btn btn-sm btn-outline-warning"
                    data-bs-toggle="modal" data-bs-target="#resendAlertModal"
                    data-resend-action="{{ route('admin.careers.resend-alert', $career) }}"
                    data-career-title="{{ $career->job_title }}"
                    data-recipient-count="{{ $career->alert_resendable_count }}"
                    title="Resend this job alert"><i class="fa fa-paper-plane me-1"></i>Resend</button>
                @endif
                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.careers.edit', $career) }}"><i class="fa fa-edit"></i></a>
                <form method="POST" action="{{ route('admin.careers.destroy', $career) }}" onsubmit="return confirm('Delete this career?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger" type="submit"><i class="fa fa-trash"></i></button></form>
              </div></td>
            </tr>
          @empty<tr><td colspan="9" class="text-center py-4">No careers added yet.</td></tr>@endforelse
          </tbody>
        </table>
      </div>{{ $careers->links() }}</div>
    </div>
  </div>

  <div class="modal fade" id="resendAlertModal" tabindex="-1" aria-labelledby="resendAlertModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg">
        <form id="resendAlertForm" method="POST" action="">
          @csrf
          <div class="modal-header">
            <div>
              <h5 class="modal-title" id="resendAlertModalLabel">Resend job alert</h5>
              <p class="text-muted small mb-0">This queues the same opening for its eligible recipients.</p>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="alert alert-warning d-flex align-items-start" role="alert">
              <i class="fa fa-exclamation-triangle mt-1 me-2"></i>
              <div>
                <strong id="resendAlertCareerTitle">Selected role</strong>
                <div class="small mt-1"><span id="resendAlertRecipientCount">0</span> recipients will be considered. Recipients already queued will not be duplicated.</div>
              </div>
            </div>
            <label class="form-label" for="resendAlertPassword">Password</label>
            <div class="input-group">
              <input class="form-control" id="resendAlertPassword" name="password" type="password" placeholder="Enter resend password" autocomplete="current-password" required>
              <button class="btn btn-outline-secondary" id="toggleResendAlertPassword" type="button" aria-label="Show password" title="Show password"><i class="fa fa-eye"></i></button>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-warning" id="confirmAlertResend"><i class="fa fa-paper-plane me-1"></i> Queue resend</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
document.addEventListener('DOMContentLoaded', function () {
  const modal = document.getElementById('resendAlertModal');
  const form = document.getElementById('resendAlertForm');
  const password = document.getElementById('resendAlertPassword');
  const togglePassword = document.getElementById('toggleResendAlertPassword');
  const submitButton = document.getElementById('confirmAlertResend');

  modal?.addEventListener('show.bs.modal', function (event) {
    const trigger = event.relatedTarget;
    if (!trigger) return;
    form.action = trigger.dataset.resendAction;
    document.getElementById('resendAlertCareerTitle').textContent = trigger.dataset.careerTitle;
    document.getElementById('resendAlertRecipientCount').textContent = Number(trigger.dataset.recipientCount).toLocaleString();
    password.type = 'password';
    togglePassword.innerHTML = '<i class="fa fa-eye"></i>';
  });

  togglePassword?.addEventListener('click', function () {
    const show = password.type === 'password';
    password.type = show ? 'text' : 'password';
    this.innerHTML = show ? '<i class="fa fa-eye-slash"></i>' : '<i class="fa fa-eye"></i>';
    this.setAttribute('aria-label', show ? 'Hide password' : 'Show password');
    this.setAttribute('title', show ? 'Hide password' : 'Show password');
  });

  form?.addEventListener('submit', function () {
    submitButton.disabled = true;
    submitButton.innerHTML = '<i class="fa fa-spinner fa-spin me-1"></i> Queuing...';
  });
});
</script>
@endsection
