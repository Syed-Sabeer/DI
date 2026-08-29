@extends('layouts.frontend.master')
@php use Illuminate\Support\Str; @endphp
@section('modified_time', optional($blog->updated_at)->toAtomString())
@section('published_time', optional($blog->created_at)->toAtomString())
@section('meta_type', 'article')
@section('meta_image', ($blog->image && file_exists(public_path('storage/'.$blog->image))) ? asset('storage/'.$blog->image) : asset(config('seo.defaultImage')))

@section('title', $blog->meta_title ?: $blog->title)
@section('meta_description', $blog->meta_description ?: \Illuminate\Support\Str::limit(strip_tags($blog->content), 160))
@section('meta_keywords', $blog->meta_keywords ?: $blog->tags)

@section('content')
<div class="section-spacer"></div>

@include('frontend.partials.page-hero', [
    'heroEyebrow' => $blog->category ?: 'Article',
    'heroTitle' => e($blog->title),
    'heroWatermarkIcon' => 'ri-quill-pen-line',
    'heroCrumbMiddle' => ['label' => 'blog', 'route' => route('blog')],
    'heroCrumbCurrent' => \Illuminate\Support\Str::limit($blog->slug, 28, ''),
])

<section class="section team-page-section section-gap">
  <div class="container">

    @php
      // Fall back to a placeholder when the stored file is missing, so a broken
      // upload never renders as a broken-image icon with sprawling alt text.
      $blogCover = ($blog->image && file_exists(public_path('storage/' . $blog->image)))
          ? asset('storage/' . $blog->image)
          : asset('FrontendAssets/images/blog/blog17.png');
    @endphp

    @include('frontend.partials.detail-cover', [
      'coverImage' => $blogCover,
      'coverAlt'   => $blog->title,
      'coverPath'  => '~/blog/<b>' . e(\Illuminate\Support\Str::limit($blog->slug, 40, '')) . '</b>',
      'coverBadge' => optional($blog->created_at)->format('d M Y'),
    ])

    <div class="row gy-4">
    <div class="col-xl-8">
      <article class="article-shell article-details">
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
              <img class="mini-post__img" src="{{ ($latest->image && file_exists(public_path('storage/' . $latest->image))) ? asset('storage/' . $latest->image) : asset('FrontendAssets/images/blog/blog8.png') }}" alt="{{ $latest->title }}" loading="lazy" decoding="async">
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

@section('schema')
<script type="application/ld+json">
@php $ld = [
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'BlogPosting',
            '@id' => url('/blog/' . $blog->slug) . '#article',
            'headline' => Str::limit($blog->title, 110, ''),
            'description' => $blog->meta_description ?: Str::limit(strip_tags($blog->content), 160),
            'url' => url('/blog/' . $blog->slug),
            'datePublished' => optional($blog->created_at)->toAtomString(),
            'dateModified' => optional($blog->updated_at ?: $blog->created_at)->toAtomString(),
            'image' => ($blog->image && file_exists(public_path('storage/'.$blog->image)))
                ? asset('storage/'.$blog->image) : asset(config('seo.defaultImage')),
            'author' => ['@type' => 'Organization', '@id' => url('/') . '#organization', 'name' => 'Deveon Inc'],
            'publisher' => ['@id' => url('/') . '#organization'],
            'mainEntityOfPage' => ['@type' => 'WebPage', '@id' => url('/blog/' . $blog->slug)],
            'articleSection' => $blog->category,
            'keywords' => $blog->meta_keywords ?: $blog->tags,
            'inLanguage' => 'en',
        ],
        ['@type' => 'BreadcrumbList', 'itemListElement' => [['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')], ['@type' => 'ListItem', 'position' => 2, 'name' => 'Blog', 'item' => url('/blog')], ['@type' => 'ListItem', 'position' => 3, 'name' => Str::limit($blog->title, 60), 'item' => url('/blog/' . $blog->slug)]]],
    ],
]; @endphp
{!! json_encode($ld, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
</script>
@endsection
