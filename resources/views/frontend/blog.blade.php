@extends('layouts.frontend.master')

@section('title', 'Blog & Insights')
@section('meta_description', 'Explore insights on software development, mobile apps, design, and digital growth from Deveon Inc.')
@section('meta_keywords', 'software development blog, mobile apps, design, digital growth')

@section('css')
<style>
  .blog-archive .post-card .post-overlay-content {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
  }

  .blog-archive .post-card .post-meta {
    position: relative !important;
    inset: auto !important;
    display: block;
    margin-bottom: 1rem;
  }

  .blog-archive .post-card .post-category {
    margin-bottom: 0;
  }

  .blog-archive .post-card .post-title {
    width: 100%;
  }

  .blog-archive .clear-filters-button {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.65rem 1rem;
    border: 2px solid var(--primary-color);
    border-radius: 0.35rem;
    background: rgb(1, 1, 4);
    color: #fff;
    font-size: 0.9rem;
    font-weight: 600;
    line-height: 1;
    text-decoration: none;
    transition: color 0.2s ease, background-color 0.2s ease, transform 0.2s ease;
  }

  .blog-archive .clear-filters-button:hover,
  .blog-archive .clear-filters-button:focus-visible {
    background: var(--primary-color);
    color: rgb(1, 1, 4);
    transform: translateY(-1px);
  }

  .blog-archive .clear-filters-button:focus-visible {
    outline: 3px solid rgba(var(--primary-rgb), 0.25);
    outline-offset: 2px;
  }
</style>
@endsection

@section('content')
<div class="section-spacer"></div>

@include('frontend.partials.page-hero', [
    'heroEyebrow' => 'Insights & Ideas',
    'heroTitle' => 'Blog & <span>Insights</span>',
    'heroWatermarkIcon' => 'ri-quill-pen-line',
    'heroCrumbCurrent' => 'blog',
])

<section class="section team-page-section section-gap blog-archive">
  <div class="container"><div class="row gy-4">
    <div class="col-xl-8">
      @if(request()->filled('search') || request()->filled('category') || request()->filled('tag'))
      <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
        <p class="mb-0">Showing {{ $blogs->total() }} {{ \Illuminate\Support\Str::plural('result', $blogs->total()) }}</p>
        <a class="clear-filters-button" href="{{ route('blog') }}">
          <i class="ri-filter-off-line" aria-hidden="true"></i>
          <span>Clear all filters</span>
        </a>
      </div>
      @endif

      <div class="row gy-4">
        @forelse($blogs as $blog)
        <div class="col-md-6">
          <article class="post-card post-card-overlay wow fadeInUp" data-wow-delay=".2s">
            <div class="post-media">
              <a href="{{ route('blog.detail', $blog->slug) }}">
                <img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('FrontendAssets/images/blog/blog1.png') }}" alt="{{ $blog->title }}">
              </a>
            </div>
            <div class="post-overlay-content">
              <div class="post-meta"><span class="post-category">
                <a href="{{ route('blog', ['category' => $blog->category]) }}">{{ $blog->category ?: 'News' }}</a>
              </span></div>
              <h2 class="post-title mb-3"><a href="{{ route('blog.detail', $blog->slug) }}">{{ $blog->title }}</a></h2>
              <span class="posted-on"><time class="entry-date published ps-0 updated" datetime="{{ optional($blog->created_at)->toDateString() }}">{{ optional($blog->created_at)->format('M d, Y') }}</time></span>
            </div>
          </article>
        </div>
        @empty
        <div class="col-12 text-center py-5">
          <h3>No blog posts found</h3>
          <p>Try another search, category, or tag.</p>
          <a class="header-button d-inline-flex" href="{{ route('blog') }}"><span>View All Blogs</span></a>
        </div>
        @endforelse
      </div>

      @if($blogs->hasPages())
      <div class="mt-5 d-flex justify-content-center">{{ $blogs->onEachSide(1)->links() }}</div>
      @endif
    </div>

    <div class="col-xl-4">
      <aside class="aside-panel mb-4"><div class="side-card side-nav wow fadeInUp" data-wow-delay=".1s">
        <form class="blog-search-input-group" action="{{ route('blog') }}" method="GET">
          @if(request()->filled('category'))<input type="hidden" name="category" value="{{ request('category') }}">@endif
          @if(request()->filled('tag'))<input type="hidden" name="tag" value="{{ request('tag') }}">@endif
          <input class="form-control pe-5" name="search" value="{{ request('search') }}" placeholder="Search blogs..." type="search">
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
            <div class="mini-post__body">
              <h3 class="mini-post__heading"><a class="mini-post__link" href="{{ route('blog.detail', $latest->slug) }}">{{ \Illuminate\Support\Str::limit($latest->title, 48) }}</a></h3>
              <time class="mini-post__date" datetime="{{ optional($latest->created_at)->toDateString() }}">{{ optional($latest->created_at)->format('d M, Y') }}</time>
            </div>
          </article>
          @empty<p>No recent posts.</p>@endforelse
        </div>
      </div></aside>

      @if($categories->isNotEmpty())
      <aside class="aside-panel mb-4"><div class="side-card side-nav wow fadeInUp" data-wow-delay=".3s">
        <h4 class="side-title">Category</h4>
        <ul class="blog-category-list">
          <li><a href="{{ route('blog', array_filter(['search' => request('search'), 'tag' => request('tag')])) }}" class="{{ request()->filled('category') ? '' : 'active' }}">All Categories <span class="blog-count">({{ $categories->sum('total') }})</span></a></li>
          @foreach($categories as $category)
          <li><a href="{{ route('blog', array_filter(['category' => $category->category, 'search' => request('search'), 'tag' => request('tag')])) }}" class="{{ request('category') === $category->category ? 'active' : '' }}">{{ $category->category }} <span class="blog-count">({{ str_pad($category->total, 2, '0', STR_PAD_LEFT) }})</span></a></li>
          @endforeach
        </ul>
      </div></aside>
      @endif

      @if($tags->isNotEmpty())
      <aside class="aside-panel mb-4"><div class="side-card side-nav wow fadeInUp" data-wow-delay=".4s">
        <h4 class="side-title">Tags</h4>
        <div class="tags-container">
          @foreach($tags as $tag)
          <a href="{{ route('blog', array_filter(['tag' => $tag, 'search' => request('search'), 'category' => request('category')])) }}" class="{{ request('tag') === $tag ? 'active' : '' }}">{{ $tag }}</a>
          @endforeach
        </div>
      </div></aside>
      @endif
    </div>
  </div></div>
</section>
@endsection
