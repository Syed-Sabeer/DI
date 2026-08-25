<?php

return [
    'site_name' => 'Avrio Global Inc.',
    'domain' => 'https://avrioglobal.io',

    'default_title' => 'Avrio Global Inc. | Custom Software Development Company',
    'default_description' => 'Avrio Global Inc. is a custom software development company building mobile apps, web applications, AI/ML solutions, and fintech, banking, and insurance software for ambitious businesses worldwide.',
    'default_keywords' => 'software development company, custom software development, mobile app development, web app development, AI ML development, fintech software development, financial technology solutions, banking software solutions, insurance software solutions, digital marketing agency',

    'logo' => 'FrontendAssets/img/white-file/avrio-logo.png',

    // Default social share ("link preview card") image — 1200x630, the standard
    // Open Graph ratio WhatsApp/Facebook/Twitter expect. Individual pages can
    // override via @section('og_image', ...).
    'og_image' => 'FrontendAssets/img/og/avrio-logo.png',

    'phone' => '+15485732018',
    'phone_display' => '+1 548 573 2018',
    'email' => 'info@avrioglobal.io',

    'offices' => [
        [
            'name' => 'Canada Office',
            'street' => '349 Beechlawn Drive',
            'city' => 'Waterloo',
            'region' => 'ON',
            'postal_code' => 'N2L 5L8',
            'country' => 'CA',
            'country_name' => 'Canada',
        ],
        [
            'name' => 'Hong Kong Office',
            'street' => 'Unit 1406B, Belgian Bank Building, Nathan Road, Mong Kok',
            'city' => 'Kowloon',
            'region' => null,
            'postal_code' => null,
            'country' => 'HK',
            'country_name' => 'Hong Kong',
        ],
        [
            'name' => 'Pakistan Office',
            'street' => 'Plot No. A-26/1, Block 8, K.A.E.C.H.S',
            'city' => 'Karachi',
            'region' => null,
            'postal_code' => '75460',
            'country' => 'PK',
            'country_name' => 'Pakistan',
        ],
    ],

    'social' => [
        'facebook' => 'https://facebook.com',
        'instagram' => 'https://instagram.com',
        'linkedin' => 'https://www.linkedin.com/company/avrio-global/',
    ],
];
