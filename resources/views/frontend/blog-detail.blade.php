@extends('layouts.frontend.master')

@section('title', $blog->meta_title ?: $blog->title)
@section('meta_description', $blog->meta_description ?: \Illuminate\Support\Str::limit(strip_tags($blog->content), 160))
@section('meta_keywords', $blog->meta_keywords ?: $blog->tags)

@section('content')
<div class="section-spacer"></div>

<section class="hero pages-banner overflow-hidden">
  <div class="container">
    <div class="row"><div class="col-12"><div class="hero-banner-content text-center">
      <h1 class="hero__title text-dark text-center text-animated-slider">{{ $blog->title }}</h1>
      <div class="glow-border-container">
        <ul class="pagebreadcrumb-list">
          <li class="pagebreadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li><i class="ri-expand-horizontal-s-fill"></i></li>
          <li class="pagebreadcrumb-item"><a href="{{ route('blog') }}">Blog</a></li>
          <li><i class="ri-expand-horizontal-s-fill"></i></li>
          <li class="active">{{ \Illuminate\Support\Str::limit($blog->title, 35) }}</li>
        </ul>
        <div class="glow-border-card"><div class="glow-border-inner"></div></div>
      </div>
    </div></div></div>
  </div>
  <div class="bg-image-shape">
    <img src="{{ asset('FrontendAssets/images/shapes/33.png') }}" alt="" class="banner-light">
    <img src="{{ asset('FrontendAssets/images/shapes/7.png') }}" alt="" class="banner-dark d-none">
  </div>
</section>

<section class="section team-page-section section-gap">
  <div class="container"><div class="row gy-4">
    <div class="col-xl-8">
      <article class="article-shell article-details">
        <figure class="article-hero wow fadeInUp" data-wow-delay=".1s">
          <img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('FrontendAssets/images/blog/blog17.png') }}" alt="{{ $blog->title }}">
        </figure>
        <header class="article-head"><h2 class="article-title split-title">{{ $blog->title }}</h2></header>
        <div class="post-facts wow fadeInUp" data-wow-delay=".3s">
          @if($blog->category)
          <div class="post-facts__cell">
            <div class="post-facts__icon"><i class="ri-folder-line"></i></div>
            <div class="post-facts__text"><span class="post-facts__label">Category</span><div class="post-facts__value"><a href="{{ route('blog', ['category' => $blog->category]) }}">{{ $blog->category }}</a></div></div>
          </div>
          @endif
          <div class="post-facts__cell">
            <div class="post-facts__icon"><i class="ri-calendar-line"></i></div>
            <div class="post-facts__text"><span class="post-facts__label">Date Released</span><div class="post-facts__value"><time datetime="{{ optional($blog->created_at)->toDateString() }}">{{ optional($blog->created_at)->format('d F, Y') }}</time></div></div>
          </div>
          @if($blog->min_read)
          <div class="post-facts__cell">
            <div class="post-facts__icon"><i class="ri-time-line"></i></div>
            <div class="post-facts__text"><span class="post-facts__label">Reading Time</span><div class="post-facts__value">{{ $blog->min_read }}</div></div>
          </div>
          @endif
        </div>
        <div class="article-body wow fadeInUp" data-wow-delay=".3s">{!! $blog->content !!}</div>
      </article>
    </div>

    <div class="col-xl-4">
      <aside class="aside-panel mb-4"><div class="side-card side-nav wow fadeInUp" data-wow-delay=".1s">
        <form class="blog-search-input-group" action="{{ route('blog') }}" method="GET">
          <input class="form-control" name="search" placeholder="Search blog..." type="search">
          <button class="btn bg-transparent border-0" type="submit" aria-label="Search"><i class="fe fe-search text-dark"></i></button>
        </form>
      </div></aside>

      <aside class="aside-panel mb-4"><div class="side-card side-nav wow fadeInUp" data-wow-delay=".2s">
        <h2 class="side-title">Recent Posts</h2>
        <div class="mini-posts" role="list">
          @forelse($latestBlogs as $latest)
          <article class="mini-post">
            <a class="mini-post__media" href="{{ route('blog.detail', $latest->slug) }}" aria-label="Open: {{ $latest->title }}">
              <img class="mini-post__img" src="{{ $latest->image ? asset('storage/' . $latest->image) : asset('FrontendAssets/images/blog/blog8.png') }}" alt="{{ $latest->title }}">
            </a>
            <div class="mini-post__body"><h3 class="mini-post__heading"><a class="mini-post__link" href="{{ route('blog.detail', $latest->slug) }}">{{ \Illuminate\Support\Str::limit($latest->title, 48) }}</a></h3><time class="mini-post__date" datetime="{{ optional($latest->created_at)->toDateString() }}">{{ optional($latest->created_at)->format('d M, Y') }}</time></div>
          </article>
          @empty
            <p>No recent posts.</p>
          @endforelse
        </div>
      </div></aside>

      @if($categories->isNotEmpty())
      <aside class="aside-panel mb-4"><div class="side-card side-nav wow fadeInUp" data-wow-delay=".3s">
        <h4 class="side-title">Category</h4>
        <ul class="blog-category-list">
          @foreach($categories as $category)
          <li><a href="{{ route('blog', ['category' => $category->category]) }}">{{ $category->category }} <span class="blog-count">({{ str_pad($category->total, 2, '0', STR_PAD_LEFT) }})</span></a></li>
          @endforeach
        </ul>
      </div></aside>
      @endif

      @if($tags->isNotEmpty())
      <aside class="aside-panel mb-4"><div class="side-card side-nav wow fadeInUp" data-wow-delay=".4s">
        <h4 class="side-title">Tags</h4>
        <div class="tags-container">@foreach($tags as $tag)<a href="{{ route('blog', ['search' => $tag]) }}">{{ $tag }}</a>@endforeach</div>
      </div></aside>
      @endif
    </div>
  </div></div>
</section>
@endsection
