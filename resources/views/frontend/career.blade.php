@extends('layouts.frontend.master')

@section('title', 'Careers')
@section('meta_description', 'Explore current career opportunities and join the Deveon Inc team.')

@section('content')
<div class="section-spacer"></div>
<section class="hero pages-banner overflow-hidden">
  <div class="container"><div class="row"><div class="col-12"><div class="hero-banner-content text-center">
    <h1 class="hero__title text-dark text-center text-animated-slider">Careers</h1>
    <div class="glow-border-container"><ul class="pagebreadcrumb-list"><li><a href="{{ route('home') }}">Home</a></li><li><i class="ri-expand-horizontal-s-fill"></i></li><li class="active">Careers</li></ul><div class="glow-border-card"><div class="glow-border-inner"></div></div></div>
  </div></div></div></div>
  <div class="bg-image-shape"><img src="{{ asset('FrontendAssets/images/shapes/33.png') }}" alt="" class="banner-light"><img src="{{ asset('FrontendAssets/images/shapes/7.png') }}" alt="" class="banner-dark d-none"></div>
</section>

<section class="section section-gap">
  <div class="container">
    <div class="row justify-content-center"><div class="col-xl-7"><div class="heading-section mb-5 text-center"><span class="heading-subtitle rounded-pill border px-3 py-1 d-inline-flex">Open Positions</span><h2 class="heading-title mt-4">Find Your Next Opportunity</h2><p>Join our team and help build digital products that make a difference.</p></div></div></div>
    <div class="jobs"><div class="jobs__grid">
      @forelse($careers as $career)
      <div class="jobs__col wow fadeInUp" data-wow-delay=".1s"><div class="job-card">
        <div class="job-card__icon"><i class="ri-briefcase-4-line" style="font-size:2rem"></i></div>
        <div class="job-card__content">
          <h3 class="job-card__title"><a href="{{ route('careers.show', $career->slug) }}">{{ $career->job_title }}</a></h3>
          <div class="job-card__divider"></div>
          <ul class="job-card__meta">
            @if($career->job_type)<li>+ {{ $career->job_type }}</li>@endif
            @if($career->experience)<li>+ {{ $career->experience }}</li>@endif
            @if($career->location)<li>+ {{ $career->location }}</li>@endif
          </ul>
          <a href="{{ route('careers.show', $career->slug) }}" class="btn btn-black-bg landing-custom-button btn-anim"><span class="btn__text">View & Apply</span><span class="btn__icon"><i class="ri-arrow-right-long-line"></i></span></a>
        </div>
      </div></div>
      @empty
      <div class="col-12 text-center py-5"><h3>No open positions right now</h3><p>Please check back soon for new opportunities.</p></div>
      @endforelse
    </div></div>
    @if($careers->hasPages())<div class="d-flex justify-content-center mt-5">{{ $careers->links() }}</div>@endif
  </div>
</section>
@endsection
