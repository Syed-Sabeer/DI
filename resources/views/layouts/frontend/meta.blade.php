@php
/*
|---------------------------------------------------------------------------
| Head metadata
|---------------------------------------------------------------------------
| Every page supplies its own values through @section(...). Anything a page
| omits falls back to the defaults in config/seo.php, so no page can ever
| ship without a title, description, canonical URL or share image.
|
| Pages may set: title, meta_description, meta_keywords, meta_image,
| meta_robots, meta_type, canonical, schema
*/
$seo = config('seo');

$decodeSection = static fn (string $value): string => html_entity_decode(
    trim($value),
    ENT_QUOTES | ENT_HTML5,
    'UTF-8'
);

// Inline Blade sections escape dynamic values while capturing them. Decode
// once here, then let the HTML attributes below perform the final escaping.
$pageTitle = $decodeSection($__env->yieldContent('title'));
$metaTitle = $pageTitle !== ''
? (str_contains($pageTitle, $seo['titleSuffix']) ? $pageTitle : $pageTitle . ' | ' . $seo['titleSuffix'])
: $seo['defaultTitle'];

$metaDescription = $decodeSection($__env->yieldContent('meta_description')) ?: $seo['defaultDescription'];
$metaDescription = \Illuminate\Support\Str::limit(preg_replace('/\s+/', ' ', strip_tags($metaDescription)), 300, '');

$metaKeywords = $decodeSection($__env->yieldContent('meta_keywords')) ?: $seo['defaultKeywords'];

$metaImageRaw = trim($__env->yieldContent('meta_image')) ?: $seo['defaultImage'];
$metaImage = \Illuminate\Support\Str::startsWith($metaImageRaw, ['http://', 'https://'])
? $metaImageRaw
: asset($metaImageRaw);

$metaRobots = trim($__env->yieldContent('meta_robots'))
?: 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1';

$metaType = trim($__env->yieldContent('meta_type')) ?: 'website';

// Canonical: never carry query strings or pagination noise into the tag.
$canonical = trim($__env->yieldContent('canonical')) ?: url(request()->getPathInfo());
$canonical = rtrim($canonical, '/') ?: url('/');
$currentUrl = rtrim(url()->full(), '/') ?: url('/');
$hasSelfReferencingCanonical = $currentUrl === $canonical;
@endphp
<!-- ============================ META ============================ -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>{{ $metaTitle }}</title>
<meta name="description" content="{{ $metaDescription }}">
<meta name="keywords" content="{{ $metaKeywords }}">
<meta name="author" content="{{ $seo['brand'] }}">
<meta name="publisher" content="{{ $seo['brand'] }}">
<meta name="robots" content="{{ $metaRobots }}">
<meta name="googlebot" content="{{ $metaRobots }}">
<meta name="theme-color" content="#04050a">
<meta name="format-detection" content="telephone=no">

<link rel="canonical" href="{{ $canonical }}">

<!-- Only canonical pages publish language alternates. Faceted/query URLs point
     to the canonical page instead of claiming a non-self-referencing locale. -->
@if($hasSelfReferencingCanonical)
@foreach($seo['languages'] as $lang)
<link rel="alternate" hreflang="{{ $lang }}" href="{{ $canonical }}">
@endforeach
<link rel="alternate" hreflang="x-default" href="{{ $canonical }}">
@endif

<!-- Geo -->
<meta name="geo.region" content="{{ $seo['geo']['region'] }}">
<meta name="geo.placename" content="{{ $seo['geo']['placename'] }}">
<meta name="geo.position" content="{{ $seo['geo']['lat'] }};{{ $seo['geo']['lng'] }}">
<meta name="ICBM" content="{{ $seo['geo']['lat'] }}, {{ $seo['geo']['lng'] }}">

<!-- Open Graph -->
<meta property="og:type" content="{{ $metaType }}">
<meta property="og:site_name" content="{{ $seo['brand'] }}">
<meta property="og:title" content="{{ $metaTitle }}">
<meta property="og:description" content="{{ $metaDescription }}">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:image" content="{{ $metaImage }}">
<meta property="og:image:secure_url" content="{{ $metaImage }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="{{ $seo['brand'] }} — {{ $seo['tagline'] }}">
<meta property="og:locale" content="en_US">
@foreach(['en_CA', 'en_GB', 'en_AU'] as $alt)
<meta property="og:locale:alternate" content="{{ $alt }}">
@endforeach
@hasSection('published_time')
<meta property="article:published_time" content="@yield('published_time')">
<meta property="article:modified_time" content="@yield('modified_time')">
<meta property="article:publisher" content="{{ $seo['social']['facebook'] }}">
@endif

<!-- Twitter / X -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="{{ $seo['twitterHandle'] }}">
<meta name="twitter:creator" content="{{ $seo['twitterHandle'] }}">
<meta name="twitter:title" content="{{ $metaTitle }}">
<meta name="twitter:description" content="{{ $metaDescription }}">
<meta name="twitter:image" content="{{ $metaImage }}">
<meta name="twitter:image:alt" content="{{ $seo['brand'] }} — {{ $seo['tagline'] }}">

<!-- Icons -->
<link rel="icon" href="{{ asset('FrontendAssets/images/brand/favicon.png') }}" sizes="any">
<link rel="apple-touch-icon" href="{{ asset('FrontendAssets/images/brand/deveon-mark-lime.png') }}">

<!-- Performance hints -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="dns-prefetch" href="https://fonts.googleapis.com">

<!-- ===================== STRUCTURED DATA (sitewide) ===================== -->
<script type="application/ld+json">
    @php $ld = [
        '@context' => 'https://schema.org',
        '@graph' => [
            [
                '@type'       => 'Organization',
                '@id'         => url('/') . '#organization',
                'name'        => $seo['brand'],
                'legalName'   => $seo['legalName'],
                'alternateName' => 'Deveon',
                'url'         => url('/'),
                'slogan'      => $seo['tagline'],
                'description' => $seo['defaultDescription'],
                'foundingDate'=> $seo['founded'],
                'email'       => $seo['contact']['email'],
                'telephone'   => $seo['contact']['phone'],
                'logo' => [
                    '@type'  => 'ImageObject',
                    '@id'    => url('/') . '#logo',
                    'url'    => asset('FrontendAssets/images/brand/deveon-mark-lime.png'),
                    'caption'=> $seo['brand'],
                ],
                'image'  => asset($seo['defaultImage']),
                'sameAs' => array_values($seo['social']),
                'founder' => [
                    '@type'    => 'Person',
                    '@id'      => url('/about') . '#founder',
                    'name'     => 'Syed Sabeer Faisal',
                    'jobTitle' => 'Founder & Chief Executive Officer',
                    'worksFor' => ['@id' => url('/') . '#organization'],
                    'image'    => asset('FrontendAssets/images/profile/founder.webp'),
                ],
                'address' => [
                    '@type'           => 'PostalAddress',
                    'streetAddress'   => $seo['address']['street'],
                    'addressLocality' => $seo['address']['city'],
                    'addressRegion'   => $seo['address']['region'],
                    'postalCode'      => $seo['address']['postal'],
                    'addressCountry'  => $seo['address']['country'],
                ],
                'contactPoint' => [[
                    '@type'             => 'ContactPoint',
                    'contactType'       => 'sales',
                    'email'             => $seo['contact']['email'],
                    'telephone'         => $seo['contact']['phone'],
                    'availableLanguage' => ['English'],
                    'areaServed'        => array_column($seo['targetMarkets'], 'code'),
                ]],
                'areaServed' => array_map(fn ($m) => [
                    '@type' => 'Country', 'name' => $m['name'],
                ], $seo['targetMarkets']),
                'knowsAbout' => [
                    'Custom Software Development', 'Artificial Intelligence', 'Machine Learning',
                    'Mobile Application Development', 'Web Development', 'ERP Systems',
                    'CRM Systems', 'UI/UX Design', 'Cloud Architecture', 'Business Automation',
                ],
            ],
            [
                '@type'     => 'WebSite',
                '@id'       => url('/') . '#website',
                'url'       => url('/'),
                'name'      => $seo['brand'],
                'description'=> $seo['defaultDescription'],
                'publisher' => ['@id' => url('/') . '#organization'],
                'inLanguage'=> 'en',
                'potentialAction' => [[
                    '@type'       => 'SearchAction',
                    'target'      => [
                        '@type'       => 'EntryPoint',
                        'urlTemplate' => url('/blog') . '?search={search_term_string}',
                    ],
                    'query-input' => 'required name=search_term_string',
                ]],
            ],
            [
                '@type'      => 'WebPage',
                '@id'        => $canonical . '#webpage',
                'url'        => $canonical,
                'name'       => $metaTitle,
                'description'=> $metaDescription,
                'isPartOf'   => ['@id' => url('/') . '#website'],
                'about'      => ['@id' => url('/') . '#organization'],
                'inLanguage' => 'en',
            ],
        ],
    ]; @endphp
{!! json_encode($ld, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
</script>

@yield('schema')
