<?php

/*
|--------------------------------------------------------------------------
| SEO configuration
|--------------------------------------------------------------------------
| Single source of truth for brand identity, social profiles, target markets
| and structured-data defaults. Update a value here and it propagates to the
| meta tags, JSON-LD, sitemap, robots.txt and llms.txt.
*/

return [

    'brand'    => 'Deveon Inc',
    'tagline'  => 'Powering Intelligent Systems',
    'legalName'=> 'Deveon Inc',
    'founded'  => '2021',

    // Appended to page titles. Kept short so titles stay under ~60 characters.
    'titleSuffix' => 'Deveon Inc',

    'defaultTitle' => 'Deveon Inc | Powering Intelligent Systems',

    'defaultDescription' => 'Deveon Inc builds custom software, mobile apps and AI automation for companies in the USA, Canada, UK and Australia. Powering Intelligent Systems since 2021.',

    'defaultKeywords' => 'custom software development company, AI automation services, mobile app development USA, software development Canada, enterprise software UK, app developers Australia, ERP development, CRM development, UI UX design agency, Deveon Inc',

    'defaultImage' => 'FrontendAssets/images/seo/og-default.png',

    'twitterHandle' => '@deveoninc',

    'social' => [
        'linkedin'  => 'https://www.linkedin.com/company/deveon',
        'x'         => 'https://x.com/deveoninc',
        'instagram' => 'https://www.instagram.com/deveon.inc',
        'facebook'  => 'https://www.facebook.com/p/Deveon-Inc-61586168911211/',
    ],

    'contact' => [
        'email'     => 'info@deveoninc.com',
        'phone'     => '+1 905 514 8474',
        'phoneRaw'  => '+19055148474',
    ],

    'address' => [
        'street'   => 'Suite 391 - 1505 Laperriere Avenue',
        'city'     => 'Ottawa',
        'region'   => 'Ontario',
        'postal'   => 'K1Z 7T1',
        'country'  => 'CA',
    ],

    'branchAddress' => [
        'street'   => '71A Street 3, Sindhi Muslim Cooperative Housing Society, Block A (SMCHS)',
        'city'     => 'Karachi',
        'region'   => 'Sindh',
        'postal'   => '75400',
        'country'  => 'PK',
    ],

    // Ottawa HQ - used for geo meta tags.
    'geo' => [
        'lat'      => '45.3766',
        'lng'      => '-75.7381',
        'placename'=> 'Ottawa, Ontario, Canada',
        'region'   => 'CA-ON',
    ],

    // Markets we actively sell into. Drives the areaServed node in JSON-LD
    // and the geo.region meta tags.
    'targetMarkets' => [
        ['code' => 'US', 'name' => 'United States'],
        ['code' => 'CA', 'name' => 'Canada'],
        ['code' => 'GB', 'name' => 'United Kingdom'],
        ['code' => 'AU', 'name' => 'Australia'],
    ],

    'languages' => ['en-US', 'en-CA', 'en-GB', 'en-AU'],

];
