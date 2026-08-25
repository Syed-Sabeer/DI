@extends('layouts.frontend.master')

@section('title', 'Software Development Blog & Insights | Avrio Global Inc.')
@section('meta_description', 'Software, product, and growth insights from Avrio Global Inc. — practical guidance on custom software development, mobile apps, AI, and digital strategy.')
@section('meta_keywords', 'software development blog, software insights, custom software development articles')

@push('schema')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Blog', 'item' => url('/blog')],
    ],
], JSON_UNESCAPED_SLASHES) !!}
</script>
@endpush

@section('css')

@endsection

@section('content')


    <!-- Breadcrumb Section Start -->
                    <div class="breadcrumb-wrapper light-theme-breadcrumb bg-cover" style="background-image: url({{ asset('FrontendAssets/img/inner-page/bread-line.png') }});">
                        <div class="light-bg">
                            <img src="{{ asset('FrontendAssets/img/inner-page/light.png')}}" alt="img">
                        </div>
                        <div class="container">
                            <div class="page-heading mb-0">
                                <div class="breadcrumb-sub-title">
                                    <h1 class="about-page-heading-title"><span>Software Insights</span>
                                        For Building Better Digital Products
                                    </h1>
                                </div>
                                <div class="breadcrumb-items">
                                    <ul>
                                        <li>
                                           <span class="about-page-heading-meta">Software insights for businesses</span>
                                        </li>
                                        <li>
    (&copy;2020 — {{ date('Y') }})
</li>
                                    </ul>
                                    <h2 class="title wa_title_spilt_1">
                                     Avrio Insights
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                   <!-- GT News-standard Section Start -->
                    <section class="news-standard-section section-padding">
                        <div class="container">
                            <div class="gt-news-standard-wrapper">
                                <div class="row g-4">
                                    <div class="col-12 col-lg-8">
                                        <div class="gt-news-standard-items">
                                            @forelse($blogs as $blog)
                                                <article class="gt-news-card-items-4">
                                                    <div class="gt-news-image">
                                                        <img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('FrontendAssets/img/inner-page/blog-post-1.jpg') }}" alt="{{ $blog->title }}">
                                                    </div>
                                                    <div class="gt-news-content">
                                                        <ul class="gt-date-list">
                                                            <li><i class="fa-solid fa-calendar-days"></i> {{ optional($blog->created_at)->format('d F Y') }}</li>
                                                            {{-- <li><i class="fa-solid fa-comments"></i> {{ $blog->comments_count ?? 0 }} Comments</li> --}}
                                                        </ul>
                                                        <h2 class="news-title"><a href="{{ route('blog.detail', $blog->slug) }}">{{ $blog->title }}</a></h2>
                                                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 220) }}</p>
                                                        <a class="theme-btn-main style-2 bg-white-style" href="{{ route('blog.detail', $blog->slug) }}">
                                                            <span class="theme-btn-arrow-left"><i class="fa-solid fa-arrow-up-right"></i></span>
                                                            <span class="theme-btn">Read More</span>
                                                            <span class="theme-btn-arrow-right"><i class="fa-solid fa-arrow-up-right"></i></span>
                                                        </a>
                                                    </div>
                                                </article>
                                            @empty
                                                <div class="gt-news-card-items-4"><div class="gt-news-content"><h2 class="news-title">No articles published yet</h2><p>New software insights and company updates will appear here soon.</p></div></div>
                                            @endforelse
                                            @if($blogs->hasPages())
                                                <div class="page-nav-wrap text-center">{{ $blogs->links() }}</div>
                                            @endif
                                       
                                           <div class="page-nav-wrap text-center d-none">
                                                <ul>
                                                    <li class="active"><a class="page-numbers" href="#">01</a></li>
                                                    <li><a class="page-numbers" href="#">02</a></li>
                                                    <li><a class="page-numbers" href="#">03</a></li>
                                                    <li><a class="page-numbers" href="#"><i class="fa-solid fa-arrow-up-right"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <aside class="blog-dynamic-sidebar gt-main-sideber sticky-style">
                                            <div class="gt-single-sideber-widget">
                                                <div class="gt-widget-title"><h3>Search</h3></div>
                                                <div class="gt-search-widget">
                                                    <form action="{{ route('blog') }}" method="GET">
                                                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search here">
                                                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="gt-single-sideber-widget">
                                                <div class="gt-widget-title"><h3>All Categories</h3></div>
                                                <ul class="gt-category-list">
                                                    @forelse($categories as $category)
                                                        <li><a href="{{ route('blog', ['category' => $category->category]) }}">{{ $category->category }}</a><span>({{ str_pad($category->total, 2, '0', STR_PAD_LEFT) }})</span></li>
                                                    @empty
                                                        <li><span>No categories yet</span></li>
                                                    @endforelse
                                                </ul>
                                            </div>
                                            <div class="gt-single-sideber-widget">
                                                <div class="gt-widget-title"><h3>Recent Posts</h3></div>
                                                <div class="gt-recent-post-area">
                                                    @forelse($latestBlogs as $latest)
                                                        <div class="gt-recent-items">
                                                            <div class="gt-recent-thumb"><img src="{{ $latest->image ? asset('storage/' . $latest->image) : asset('FrontendAssets/img/inner-page/post-1.jpg') }}" alt="{{ $latest->title }}"></div>
                                                            <div class="gt-recent-content"><h4 class="title"><a href="{{ route('blog.detail', $latest->slug) }}">{{ $latest->title }}</a></h4><ul><li>{{ optional($latest->created_at)->format('d M Y') }}</li></ul></div>
                                                        </div>
                                                    @empty
                                                        <p>No recent posts yet.</p>
                                                    @endforelse
                                                </div>
                                            </div>
                                            <div class="gt-single-sideber-widget mb-0">
                                                <div class="gt-widget-title"><h3>Popular Tags</h3></div>
                                                <div class="tagcloud">
                                                    @forelse($tags as $tag)<a href="{{ route('blog', ['search' => $tag]) }}">{{ $tag }}</a>@empty<span>No tags yet</span>@endforelse
                                                </div>
                                            </div>
                                        </aside>
                                  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                   

@endsection

@section('script')

@endsection
