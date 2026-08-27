@extends('layouts.frontend.master')

@section('title', $career->job_title.' Career')
@section('meta_description', \Illuminate\Support\Str::limit(strip_tags($career->description), 160))

@section('css')
<style>
  .career-points .feature-list-item>i{color:var(--primary-color);font-size:1.25rem;line-height:1.4;flex:0 0 auto}
  .career-points .feature-list-item{display:flex;align-items:flex-start;gap:.6rem}
</style>
@endsection

@section('content')
<div class="section-spacer"></div>
<section class="hero pages-banner overflow-hidden">
  <div class="container"><div class="row"><div class="col-12"><div class="hero-banner-content text-center">
    <h1 class="hero__title text-dark text-center text-animated-slider">{{ $career->job_title }}</h1>
    <div class="glow-border-container"><ul class="pagebreadcrumb-list"><li><a href="{{ route('home') }}">Home</a></li><li><i class="ri-expand-horizontal-s-fill"></i></li><li><a href="{{ route('careers') }}">Careers</a></li><li><i class="ri-expand-horizontal-s-fill"></i></li><li class="active">Job Details</li></ul><div class="glow-border-card"><div class="glow-border-inner"></div></div></div>
  </div></div></div></div>
  <div class="bg-image-shape"><img src="{{ asset('FrontendAssets/images/shapes/33.png') }}" alt="" class="banner-light"><img src="{{ asset('FrontendAssets/images/shapes/7.png') }}" alt="" class="banner-dark d-none"></div>
</section>

<section class="section service-article section-gap"><div class="container"><div class="row g-5">
  <div class="col-lg-8"><article class="article-shell"><header class="article-head"><h2 class="article-title split-title">{{ $career->job_title }}</h2></header><div class="article-body">
    <div class="job-meta">
      @if($career->location)<div class="job-meta__item"><span class="job-meta__label">Work Location</span><h3 class="job-meta__value">{{ $career->location }}</h3></div>@endif
      <div class="job-meta__item"><span class="job-meta__label">Posted On</span><h3 class="job-meta__value">{{ $career->created_at->format('d F Y') }}</h3></div>
      @if($career->job_type)<div class="job-meta__item"><span class="job-meta__label">Employment Type</span><h3 class="job-meta__value">{{ $career->job_type }}</h3></div>@endif
    </div>

    <h3 class="section-title wow fadeInUp">Job Description</h3><div class="wow fadeInUp">{!! nl2br(e($career->description)) !!}</div>

    @foreach([
      ['Key Responsibilities', $career->responsibilities_description, $career->responsibilities_points],
      ['Qualifications', $career->qualifications_description, $career->qualifications_points],
      ['Experience', $career->experience_description, $career->experience_points]
    ] as [$heading, $description, $points])
      @if($description || !empty($points))
      <h3 class="section-title mb-4 pt-3 wow fadeInUp">{{ $heading }}</h3>
      @if($description)<p class="wow fadeInUp">{{ $description }}</p>@endif
      @if(!empty($points))<ul class="about-feature-list career-points mb-4 pb-2">@foreach($points as $point)<li class="feature-list-item"><i class="ri-checkbox-circle-fill" aria-hidden="true"></i><span class="feature-text">{{ $point }}</span></li>@endforeach</ul>@endif
      @endif
    @endforeach
  </div></article></div>

  <div class="col-lg-4"><aside class="aside-panel"><div class="side-card mb-4 side-nav wow fadeInUp"><h4 class="side-title">Job Overview</h4>
    @foreach([
      'Salary Range' => $career->salary_range,
      'Experience' => $career->experience,
      'Education' => $career->education,
      'Work Schedule' => $career->work_schedule,
      'Position' => $career->position,
      'Workweek' => $career->workweek,
      'Application Deadline' => optional($career->application_deadline)->format('d M Y')
    ] as $label => $value)
      @if($value)<div class="project-info-item"><div class="text"><span>{{ $label }}:</span><h5 class="title">{{ $value }}</h5></div></div>@endif
    @endforeach
    <a class="header-button" href="{{ route('contact') }}?subject={{ urlencode('Application for '.$career->job_title) }}"><span class="resume-icon"><i class="ri-arrow-right-line"></i></span><span>Apply For This Job</span></a>
  </div></aside></div>
</div></div></section>
@endsection
