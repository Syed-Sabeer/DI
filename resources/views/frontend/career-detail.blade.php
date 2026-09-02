@extends('layouts.frontend.master')
@php use Illuminate\Support\Str; @endphp
@section('meta_keywords', strtolower($career->job_title).' job, '.strtolower($career->job_title).' vacancy, software
careers, Deveon Inc hiring')

@section('title', $career->job_title.' | Careers at Deveon Inc')
@section('meta_description', Str::limit(strip_tags($career->description), 155))

@section('css')
<style>
  .career-points .feature-list-item>i {
    color: var(--primary-color);
    font-size: 1.25rem;
    line-height: 1.4;
    flex: 0 0 auto
  }

  .career-points .feature-list-item {
    display: flex;
    align-items: flex-start;
    gap: .6rem
  }

  /* ---------- Job meta chips (hero of the article) ---------- */
  .job-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
    margin-bottom: 2rem;
    padding: 0;
    border-bottom: none
  }

  .job-meta__item {
    display: flex;
    align-items: center;
    gap: 14px;
    flex: 1 1 200px;
    padding: 18px 20px;
    border: 1px solid var(--border);
    border-radius: 14px;
    background: var(--gray-100)
  }

  .job-meta__icon {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    width: 44px;
    height: 44px;
    border-radius: 12px;
    font-size: 1.2rem;
    background: color-mix(in srgb, var(--primary-color) 16%, transparent);
    color: var(--primary-color)
  }

  [data-theme-mode="light"] .job-meta__icon {
    text-shadow: 0 0 1px rgba(17, 17, 17, .35)
  }

  .job-meta__label {
    display: block;
    margin-bottom: 2px;
    font-size: .78rem;
    opacity: .65
  }

  .job-meta__value {
    margin: 0;
    font-size: 1rem;
    font-weight: 700;
    letter-spacing: 0;
    color: rgb(var(--dark-rgb))
  }

  /* ---------- Job overview sidebar rows ---------- */
  .career-overview-item {
    display: flex;
    align-items: flex-start;
    gap: 12px
  }

  .career-overview-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    margin-top: 2px;
    width: 34px;
    height: 34px;
    border-radius: 10px;
    font-size: .95rem;
    background: color-mix(in srgb, var(--primary-color) 14%, transparent);
    color: var(--primary-color)
  }

  [data-theme-mode="light"] .career-overview-icon {
    text-shadow: 0 0 1px rgba(17, 17, 17, .3)
  }

  /* ---------- Apply CTA (pill + circular arrow, matches site-wide services-cta) ---------- */
  .career-apply-cta {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 16px;
    width: auto;
    max-width: 100%;
    padding: 8px 8px 8px 26px;
    border: 0;
    border-radius: 999px;
    background: rgb(var(--dark-rgb));
    color: var(--custom-white);
    font-weight: 700;
    font-size: .85rem;
    letter-spacing: .04em;
    text-transform: uppercase;
    white-space: nowrap;
    cursor: pointer;
    transition: gap .35s cubic-bezier(.22, 1, .36, 1), box-shadow .35s ease
  }

  .career-apply-cta:hover {
    gap: 22px;
    color: var(--custom-white);
    box-shadow: 0 20px 40px -20px rgba(var(--dark-rgb), .5)
  }

  .career-apply-cta__icon {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    width: 42px;
    height: 42px;
    border-radius: 50%;
    background: var(--primary-color);
    color: #111;
    font-size: 1.1rem;
    transition: transform .35s cubic-bezier(.22, 1, .36, 1)
  }

  .career-apply-cta:hover .career-apply-cta__icon {
    transform: rotate(45deg)
  }

  .career-apply-modal {
    --apply-bg: #fff;
    --apply-soft: #f6f7f3;
    --apply-text: #151815;
    --apply-muted: #6b716c;
    --apply-border: #dfe3dc;
    z-index: 20000
  }

  .modal-backdrop {
    z-index: 19990
  }

  [data-theme-mode="dark"] .career-apply-modal {
    --apply-bg: #111411;
    --apply-soft: #191d19;
    --apply-text: #f3f5f2;
    --apply-muted: #aab0aa;
    --apply-border: #303630
  }

  .career-apply-modal .modal-dialog {
    max-width: 900px;
    margin: 20px auto;
    height: calc(100dvh - 40px);
    align-items: flex-start
  }

  .career-apply-modal .modal-content {
    height: 100%;
    max-height: calc(100dvh - 40px);
    background: var(--apply-bg);
    color: var(--apply-text);
    border: 1px solid var(--apply-border);
    border-radius: 22px;
    overflow: hidden;
    box-shadow: 0 28px 80px rgba(0, 0, 0, .28)
  }

  .career-apply-modal .modal-content>form {
    display: flex;
    flex-direction: column;
    height: 100%;
    min-height: 0
  }

  .career-apply-modal .modal-header {
    flex: 0 0 auto;
    padding: 24px 30px;
    border-color: var(--apply-border);
    background: linear-gradient(110deg, var(--apply-bg), var(--apply-soft));
    position: relative;
    z-index: 2
  }

  .career-apply-modal .modal-title {
    font-size: 1.55rem;
    font-weight: 700;
    margin: 0
  }

  .career-apply-modal .modal-title small {
    display: block;
    font-size: .78rem;
    color: var(--apply-muted);
    font-weight: 500;
    margin-top: 5px
  }

  .career-apply-modal .modal-body {
    flex: 1 1 auto;
    min-height: 0;
    overflow-y: auto;
    overscroll-behavior: contain;
    padding: 28px 30px;
    background: var(--apply-bg);
    scrollbar-color: #9cc700 var(--apply-soft);
    scrollbar-width: thin
  }

  .career-apply-modal .modal-footer {
    flex: 0 0 auto;
    padding: 18px 30px;
    border-color: var(--apply-border);
    background: var(--apply-soft);
    position: relative;
    z-index: 2
  }

  .apply-section {
    padding: 22px;
    border: 1px solid var(--apply-border);
    border-radius: 16px;
    background: var(--apply-soft);
    margin-bottom: 20px
  }

  .apply-section-title {
    display: flex;
    align-items: center;
    gap: 11px;
    font-size: 1.1rem;
    margin: 0 0 20px;
    color: var(--apply-text)
  }

  .apply-section-title span {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: grid;
    place-items: center;
    background: #b8e900;
    color: #0b0e0c;
    font-size: .82rem;
    font-weight: 800
  }

  .career-apply-modal .form-label {
    font-weight: 600;
    font-size: .88rem;
    margin-bottom: 7px;
    color: var(--apply-text)
  }

  .career-apply-modal .form-control {
    min-height: 50px;
    border: 1px solid var(--apply-border);
    border-radius: 10px;
    background: var(--apply-bg);
    color: var(--apply-text);
    padding: .72rem .9rem;
    box-shadow: none
  }

  .career-apply-modal textarea.form-control {
    min-height: 92px;
    resize: vertical
  }

  .career-apply-modal .form-control:focus {
    border-color: #9cc700;
    box-shadow: 0 0 0 3px rgba(184, 233, 0, .14)
  }

  .career-apply-modal .form-control::placeholder {
    color: var(--apply-muted);
    opacity: .72
  }

  .career-apply-modal .form-control[readonly] {
    background: rgba(184, 233, 0, .1);
    font-weight: 700
  }

  .apply-file {
    border: 1px dashed #9aac77;
    border-radius: 12px;
    padding: 14px;
    background: var(--apply-bg)
  }

  .apply-file small {
    display: block;
    color: var(--apply-muted);
    margin-top: 7px
  }

  .apply-required {
    color: #dc3545
  }

  .apply-submit,
  .apply-close {
    min-height: 48px;
    border-radius: 99px;
    padding: 0 22px;
    font-weight: 700;
    border: 0
  }

  .apply-submit {
    background: #b8e900;
    color: #0b0e0c;
    display: inline-flex;
    align-items: center;
    gap: 9px
  }

  .apply-submit:hover {
    background: #a7d300;
    color: #0b0e0c
  }

  .apply-submit:disabled {
    opacity: .7;
    cursor: not-allowed
  }

  .apply-close {
    background: var(--apply-bg);
    border: 1px solid var(--apply-border);
    color: var(--apply-text)
  }

  .career-apply-modal .btn-close {
    filter: none
  }

  [data-theme-mode="dark"] .career-apply-modal .btn-close {
    filter: invert(1)
  }

  .apply-spinner {
    animation: applySpin .8s linear infinite
  }

  @keyframes applySpin {
    to {
      transform: rotate(360deg)
    }
  }

  @media(max-width:575.98px) {

    .career-apply-modal .modal-header,
    .career-apply-modal .modal-body,
    .career-apply-modal .modal-footer {
      padding-left: 18px;
      padding-right: 18px
    }

    .apply-section {
      padding: 17px
    }

    .career-apply-modal .modal-dialog {
      margin: 8px;
      height: calc(100dvh - 16px)
    }

    .career-apply-modal .modal-content {
      max-height: calc(100dvh - 16px);
      border-radius: 16px
    }

    .career-apply-modal .modal-title {
      font-size: 1.25rem
    }
  }
</style>
@endsection

@section('content')
<div class="section-spacer"></div>
@include('frontend.partials.page-hero', [
'heroEyebrow' => $career->job_type ?: 'Open Position',
'heroTitle' => e($career->job_title),
'heroWatermarkIcon' => 'ri-briefcase-4-line',
'heroCrumbMiddle' => ['label' => 'careers', 'route' => route('careers')],
'heroCrumbCurrent' => \Illuminate\Support\Str::limit($career->slug, 28, ''),
])

<section class="section service-article section-gap">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-8">
        <article class="article-shell">
          <header class="article-head">
            <h2 class="article-title split-title">{{ $career->job_title }}</h2>
          </header>
          <div class="article-body">
            <div class="job-meta">
              @if($career->location)<div class="job-meta__item"><span class="job-meta__icon"><i
                    class="ri-map-pin-line"></i></span>
                <div><span class="job-meta__label">Work Location</span>
                  <h3 class="job-meta__value">{{ $career->location }}</h3>
                </div>
              </div>@endif
              <div class="job-meta__item"><span class="job-meta__icon"><i class="ri-calendar-line"></i></span>
                <div><span class="job-meta__label">Posted On</span>
                  <h3 class="job-meta__value">{{ $career->created_at->format('d F Y') }}</h3>
                </div>
              </div>
              @if($career->job_type)<div class="job-meta__item"><span class="job-meta__icon"><i
                    class="ri-briefcase-line"></i></span>
                <div><span class="job-meta__label">Employment Type</span>
                  <h3 class="job-meta__value">{{ $career->job_type }}</h3>
                </div>
              </div>@endif
            </div>

            <h3 class="section-title wow fadeInUp">Job Description</h3>
            <div class="wow fadeInUp">{!! nl2br(e($career->description)) !!}</div>

            @foreach([
            ['Key Responsibilities', $career->responsibilities_description, $career->responsibilities_points],
            ['Qualifications', $career->qualifications_description, $career->qualifications_points],
            ['Experience', $career->experience_description, $career->experience_points]
            ] as [$heading, $description, $points])
            @if($description || !empty($points))
            <h3 class="section-title mb-4 pt-3 wow fadeInUp">{{ $heading }}</h3>
            @if($description)<p class="wow fadeInUp">{{ $description }}</p>@endif
            @if(!empty($points))<ul class="about-feature-list career-points mb-4 pb-2">@foreach($points as $point)<li
                class="feature-list-item"><i class="ri-checkbox-circle-fill" aria-hidden="true"></i><span
                  class="feature-text">{{ $point }}</span></li>@endforeach</ul>@endif
            @endif
            @endforeach
          </div>
        </article>
      </div>

      <div class="col-lg-4">
        <aside class="aside-panel">
          <div class="side-card mb-4 side-nav wow fadeInUp">
            <h4 class="side-title">Job Overview</h4>
            @foreach([
            ['Salary Range', $career->salary_range, 'ri-money-dollar-circle-line'],
            ['Experience', $career->experience, 'ri-user-star-line'],
            ['Education', $career->education, 'ri-graduation-cap-line'],
            ['Work Schedule', $career->work_schedule, 'ri-time-line'],
            ['Position', $career->position, 'ri-briefcase-line'],
            ['Workweek', $career->workweek, 'ri-calendar-check-line'],
            ['Application Deadline', optional($career->application_deadline)->format('d M Y'), 'ri-calendar-close-line']
            ] as [$label, $value, $icon])
            @if($value)<div class="project-info-item career-overview-item"><span class="career-overview-icon"><i
                  class="{{ $icon }}"></i></span>
              <div class="text"><span>{{ $label }}:</span>
                <h5 class="title">{{ $value }}</h5>
              </div>
            </div>@endif
            @endforeach
            <button type="button" class="career-apply-cta career-apply-trigger" data-bs-toggle="modal"
              data-bs-target="#careerApplyModal">
              <span>Apply For This Job</span>
              <span class="career-apply-cta__icon"><i class="ri-arrow-right-up-line"></i></span>
            </button>
          </div>
        </aside>
      </div>
    </div>
  </div>
</section>

<div class="modal fade career-apply-modal" id="careerApplyModal" tabindex="-1" aria-labelledby="careerApplyModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="career-application-form" action="{{ route('careers.apply', $career) }}" method="POST"
        enctype="multipart/form-data" novalidate>
        @csrf
        <input type="hidden" name="submission_token" value="{{ (string) \Illuminate\Support\Str::uuid() }}">
        <div class="modal-header">
          <h2 class="modal-title" id="careerApplyModalLabel">Apply for this position<small>Join the team building
              meaningful digital experiences.</small></h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="apply-section">
            <h3 class="apply-section-title"><span>1</span> Personal information</h3>
            <div class="row g-3">
              <div class="col-md-6"><label class="form-label" for="apply_first_name">First name <b
                    class="apply-required">*</b></label><input class="form-control" id="apply_first_name"
                  name="first_name" maxlength="100" autocomplete="given-name" required></div>
              <div class="col-md-6"><label class="form-label" for="apply_last_name">Last name <b
                    class="apply-required">*</b></label><input class="form-control" id="apply_last_name"
                  name="last_name" maxlength="100" autocomplete="family-name" required></div>
              <div class="col-md-6"><label class="form-label" for="apply_email">Email address <b
                    class="apply-required">*</b></label><input class="form-control" id="apply_email" name="email"
                  type="email" placeholder="name@example.com" autocomplete="email" required></div>
              <div class="col-md-6"><label class="form-label" for="apply_phone">Phone <b
                    class="apply-required">*</b></label><input class="form-control" id="apply_phone" name="phone"
                  type="tel" maxlength="30" autocomplete="tel" required></div>
              <div class="col-md-6"><label class="form-label" for="apply_linkedin">LinkedIn URL</label><input
                  class="form-control" id="apply_linkedin" name="linkedin_url" type="url"
                  placeholder="https://linkedin.com/in/your-name"></div>
              <div class="col-md-6"><label class="form-label" for="apply_github">GitHub URL</label><input
                  class="form-control" id="apply_github" name="github_url" type="url"
                  placeholder="https://github.com/your-name"></div>
            </div>
          </div>
          <div class="apply-section">
            <h3 class="apply-section-title"><span>2</span> Career information</h3>
            <div class="row g-3">
              <div class="col-md-6"><label class="form-label" for="apply_workplace">Current workplace</label><input
                  class="form-control" id="apply_workplace" name="current_workplace" maxlength="255"></div>
              <div class="col-md-6"><label class="form-label" for="apply_current_position">Current
                  position</label><input class="form-control" id="apply_current_position" name="current_position"
                  maxlength="255"></div>
              <div class="col-md-6"><label class="form-label" for="apply_experience">Years of experience <b
                    class="apply-required">*</b></label><input class="form-control" id="apply_experience"
                  name="years_experience" placeholder="e.g. 3+ years" maxlength="100" required></div>
              <div class="col-md-6"><label class="form-label" for="apply_position">Applied position</label><input
                  class="form-control" id="apply_position" value="{{ $career->job_title }}" readonly></div>
              <div class="col-md-6"><label class="form-label" for="apply_current_salary">Current salary</label><input
                  class="form-control" id="apply_current_salary" name="current_salary" maxlength="100"></div>
              <div class="col-md-6"><label class="form-label" for="apply_expected_salary">Expected salary</label><input
                  class="form-control" id="apply_expected_salary" name="expected_salary" maxlength="100"></div>
            </div>
          </div>
          <div class="apply-section">
            <h3 class="apply-section-title"><span>3</span> Address</h3>
            <div class="row g-3">
              <div class="col-12"><label class="form-label" for="apply_address">Street address <b
                    class="apply-required">*</b></label><textarea class="form-control" id="apply_address" name="address"
                  maxlength="500" autocomplete="street-address" required></textarea></div>
              <div class="col-md-6"><label class="form-label" for="apply_country">Country <b
                    class="apply-required">*</b></label><input class="form-control" id="apply_country" name="country"
                  maxlength="120" autocomplete="country-name" required></div>
              <div class="col-md-6"><label class="form-label" for="apply_state">State / Province <b
                    class="apply-required">*</b></label><input class="form-control" id="apply_state" name="state"
                  maxlength="120" autocomplete="address-level1" required></div>
              <div class="col-md-6"><label class="form-label" for="apply_city">City <b
                    class="apply-required">*</b></label><input class="form-control" id="apply_city" name="city"
                  maxlength="120" autocomplete="address-level2" required></div>
              <div class="col-md-6"><label class="form-label" for="apply_postal">Postal code <b
                    class="apply-required">*</b></label><input class="form-control" id="apply_postal" name="postal_code"
                  maxlength="30" autocomplete="postal-code" required></div>
            </div>
          </div>
          <div class="apply-section mb-0">
            <h3 class="apply-section-title"><span>4</span> Documents</h3>
            <div class="row g-3">
              <div class="col-md-6">
                <div class="apply-file"><label class="form-label" for="apply_resume">Resume / CV <b
                      class="apply-required">*</b></label><input class="form-control" id="apply_resume" name="resume"
                    type="file" accept=".pdf,.doc,.docx" required><small>PDF, DOC or DOCX · maximum 5 MB</small></div>
              </div>
              <div class="col-md-6">
                <div class="apply-file"><label class="form-label" for="apply_cover">Cover letter <span
                      class="fw-normal">(optional)</span></label><input class="form-control" id="apply_cover"
                    name="cover_letter" type="file" accept=".pdf,.doc,.docx"><small>PDF, DOC or DOCX · maximum 5
                    MB</small></div>
              </div>
              <div class="col-12">
                <div class="form-check mt-2"><input class="form-check-input" type="checkbox" value="1" name="privacy"
                    id="apply_privacy" required><label class="form-check-label" for="apply_privacy">I confirm these
                    details are accurate and consent to their use for recruitment. <b
                      class="apply-required">*</b></label></div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="apply-close" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="apply-submit" data-apply-submit><i class="ri-send-plane-2-line"
              data-apply-icon></i><span data-apply-text>Submit application</span></button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  document.addEventListener('DOMContentLoaded', function () {
  const modalElement = document.getElementById('careerApplyModal');
  if (modalElement && modalElement.parentElement !== document.body) {
    document.body.appendChild(modalElement);
  }
  const form = document.getElementById('career-application-form');
  if (!form || !modalElement || typeof Swal === 'undefined') return;
  const submit = form.querySelector('[data-apply-submit]');
  const icon = form.querySelector('[data-apply-icon]');
  const text = form.querySelector('[data-apply-text]');
  const closeControls = modalElement.querySelectorAll('[data-bs-dismiss="modal"]');
  const alertTheme = () => {
    const dark = document.documentElement.getAttribute('data-theme-mode') === 'dark';
    return {background:dark?'#101311':'#fff',color:dark?'#f5f7f5':'#161816',confirmButtonColor:'#b8e900',customClass:{popup:'contact-swal-popup',confirmButton:'contact-swal-confirm'}};
  };
  const loading = state => {
    submit.disabled = state;
    closeControls.forEach(control => {
      control.disabled = state;
      control.setAttribute('aria-disabled', state ? 'true' : 'false');
    });
    text.textContent = state ? 'Submitting application...' : 'Submit application';
    icon.className = state ? 'ri-loader-4-line apply-spinner' : 'ri-send-plane-2-line';
  };
  modalElement.addEventListener('hide.bs.modal', event => {
    if (form.dataset.submitting === 'true' && form.dataset.allowClose !== 'true') {
      event.preventDefault();
    }
  });
  form.addEventListener('submit', async event => {
    event.preventDefault();
    event.stopImmediatePropagation();
    if (form.dataset.submitting === 'true') return;
    form.querySelectorAll('.is-invalid').forEach(field => field.classList.remove('is-invalid'));
    if (!form.checkValidity()) { form.reportValidity(); return; }
    form.dataset.submitting = 'true';
    loading(true);
    try {
      const response = await fetch(form.action,{method:'POST',headers:{Accept:'application/json','X-Requested-With':'XMLHttpRequest'},body:new FormData(form)});
      const data = await response.json().catch(() => ({}));
      if (!response.ok) {
        Object.keys(data.errors || {}).forEach(name => form.querySelector(`[name="${name}"]`)?.classList.add('is-invalid'));
        const throttled = response.status === 429;
        await Swal.fire({...alertTheme(),icon:throttled?'warning':(data.icon||'error'),title:throttled?'Please slow down':(data.title||'Unable to submit'),text:throttled?'Too many attempts were made. Please wait a few minutes and try again.':(data.message||'Please check your details and try again.'),confirmButtonText:'Got it'});
        return;
      }
      form.dataset.allowClose = 'true';
      bootstrap.Modal.getOrCreateInstance(modalElement).hide();
      form.dataset.allowClose = 'false';
      form.reset();
      const token = form.querySelector('[name="submission_token"]');
      if (token && window.crypto?.randomUUID) token.value = window.crypto.randomUUID();
      await Swal.fire({...alertTheme(),icon:'success',title:data.title,text:data.message,confirmButtonText:'Done',timer:7000,timerProgressBar:true});
    } catch (error) {
      await Swal.fire({...alertTheme(),icon:'error',title:'Connection problem',text:'We could not reach the server. Please check your connection and try again.',confirmButtonText:'Try again'});
    } finally {
      form.dataset.submitting = 'false';
      loading(false);
    }
  });
});
</script>
@endsection

@section('schema')
<script type="application/ld+json">
  @php $ld = [
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'JobPosting',
            '@id' => url('/career/' . $career->slug) . '#job',
            'title' => $career->job_title,
            'description' => $career->description,
            'datePosted' => optional($career->created_at)->toDateString(),
            'employmentType' => strtoupper(str_replace([' ', '-'], '_', $career->job_type ?? 'FULL_TIME')),
            'hiringOrganization' => [
                '@type' => 'Organization',
                'name' => 'Deveon Inc',
                'sameAs' => url('/'),
                'logo' => asset('FrontendAssets/images/brand/deveon-mark-lime.png'),
            ],
            'jobLocation' => [
                '@type' => 'Place',
                'address' => [
                    '@type' => 'PostalAddress',
                    'addressLocality' => config('seo.branchAddress.city'),
                    'addressRegion' => config('seo.branchAddress.region'),
                    'addressCountry' => config('seo.branchAddress.country'),
                ],
            ],
            'directApply' => true,
        ],
        ['@type' => 'BreadcrumbList', 'itemListElement' => [['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')], ['@type' => 'ListItem', 'position' => 2, 'name' => 'Careers', 'item' => url('/career')], ['@type' => 'ListItem', 'position' => 3, 'name' => $career->job_title, 'item' => url('/career/' . $career->slug)]]],
    ],
]; @endphp
{!! json_encode($ld, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
</script>
@endsection