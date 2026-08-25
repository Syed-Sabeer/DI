@php
    // @section('name', $value) inline form already runs $value through e(), so
    // decode here before re-escaping via {{ }} below to avoid double-encoding.
    $seoDecode = fn ($value) => $value === '' ? '' : html_entity_decode($value, ENT_QUOTES);

    $seoTitle = $seoDecode(trim($__env->yieldContent('title'))) ?: config('seo.default_title');
    $seoDescription = $seoDecode(trim($__env->yieldContent('meta_description'))) ?: config('seo.default_description');
    $seoKeywords = $seoDecode(trim($__env->yieldContent('meta_keywords'))) ?: config('seo.default_keywords');
    $seoRobots = $seoDecode(trim($__env->yieldContent('meta_robots'))) ?: 'index, follow';
    $seoCanonical = $seoDecode(trim($__env->yieldContent('canonical'))) ?: url()->current();
    // Normalize to the non-www host so canonical, og:url, and JSON-LD all agree —
    // this is a hint only; pair it with a real www -> non-www redirect at the server level.
    $seoCanonical = preg_replace('#^(https?://)www\.#i', '$1', $seoCanonical);
    $seoType = $seoDecode(trim($__env->yieldContent('og_type'))) ?: 'website';
    $seoLogo = asset(config('seo.logo'));

    // og_image sections hold a path relative to public/ (not yet wrapped in asset())
    // so we can read the real file on disk and report its true width/height/type —
    // WhatsApp/Facebook use these to render the preview without fetching the image first.
    $seoImageRelative = $seoDecode(trim($__env->yieldContent('og_image'))) ?: config('seo.og_image');
    $seoImage = asset($seoImageRelative);
    $seoImageWidth = 1200;
    $seoImageHeight = 630;
    $seoImageMime = 'image/jpeg';
    $seoImagePath = public_path($seoImageRelative);
    if (is_file($seoImagePath) && ($seoImageInfo = @getimagesize($seoImagePath))) {
        [$seoImageWidth, $seoImageHeight, $seoImageTypeConst] = $seoImageInfo;
        $seoImageMime = image_type_to_mime_type($seoImageTypeConst);
    }
@endphp
<!-- ========== Meta Tags ========== -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="{{ config('seo.site_name') }}">
<meta name="description" content="{{ $seoDescription }}">
<meta name="keywords" content="{{ $seoKeywords }}">
<meta name="robots" content="{{ $seoRobots }}">

<!-- ======== Page title ============ -->
<title>{{ $seoTitle }}</title>

<!-- ======== Canonical ============ -->
<link rel="canonical" href="{{ str_replace('https://www.', 'https://', $seoCanonical ?? url()->current()) }}">

<!-- ======== Favicon ============ -->
<link rel="icon" type="image/png" href="{{ $seoLogo }}">
<link rel="apple-touch-icon" href="{{ $seoLogo }}">

<!-- ======== Open Graph ============ -->
<meta property="og:site_name" content="{{ config('seo.site_name') }}">
<meta property="og:type" content="{{ $seoType }}">
<meta property="og:title" content="{{ $seoTitle }}">
<meta property="og:description" content="{{ $seoDescription }}">
<meta property="og:url" content="{{ $seoCanonical }}">
<meta property="og:image" content="{{ $seoImage }}">
<meta property="og:image:secure_url" content="{{ $seoImage }}">
<meta property="og:image:type" content="{{ $seoImageMime }}">
<meta property="og:image:width" content="{{ $seoImageWidth }}">
<meta property="og:image:height" content="{{ $seoImageHeight }}">
<meta property="og:image:alt" content="{{ $seoTitle }}">
<meta property="og:locale" content="en_US">

<!-- ======== Twitter Card ============ -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $seoTitle }}">
<meta name="twitter:description" content="{{ $seoDescription }}">
<meta name="twitter:image" content="{{ $seoImage }}">
<meta name="twitter:image:alt" content="{{ $seoTitle }}">

<!-- ======== Organization Structured Data ============ -->
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => config('seo.site_name'),
    'url' => config('seo.domain'),
    'logo' => $seoLogo,
    'contactPoint' => [
        '@type' => 'ContactPoint',
        'telephone' => config('seo.phone'),
        'contactType' => 'customer service',
        'email' => config('seo.email'),
    ],
    'sameAs' => array_values(array_filter(config('seo.social'))),
], JSON_UNESCAPED_SLASHES) !!}
</script>

@stack('schema')
