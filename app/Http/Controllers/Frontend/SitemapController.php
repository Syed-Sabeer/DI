<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $urls = [];

        $urls[] = ['loc' => url('/'), 'lastmod' => now(), 'priority' => '1.0'];
        $urls[] = ['loc' => url('/about'), 'lastmod' => now(), 'priority' => '0.8'];
        $urls[] = ['loc' => url('/service'), 'lastmod' => now(), 'priority' => '0.8'];
        $urls[] = ['loc' => url('/portfolio'), 'lastmod' => now(), 'priority' => '0.8'];
        $urls[] = ['loc' => url('/blog'), 'lastmod' => now(), 'priority' => '0.8'];
        $urls[] = ['loc' => url('/contact'), 'lastmod' => now(), 'priority' => '0.8'];

        $services = (new WebsiteController)->servicesForSitemap();
        foreach ($services as $service) {
            $urls[] = [
                'loc' => url('/service-detail/'.$service['slug']),
                'lastmod' => now(),
                'priority' => '0.7',
            ];
        }

        $portfolios = (new WebsiteController)->portfoliosForSitemap();
        foreach ($portfolios as $portfolio) {
            $urls[] = [
                'loc' => url('/portfolio/'.$portfolio['slug']),
                'lastmod' => now(),
                'priority' => '0.7',
            ];
        }

        $blogs = Blog::where('visibility', 1)->get(['slug', 'updated_at']);
        foreach ($blogs as $blog) {
            $urls[] = [
                'loc' => url('/blog/'.$blog->slug),
                'lastmod' => $blog->updated_at ?? now(),
                'priority' => '0.6',
            ];
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";
        foreach ($urls as $url) {
            $xml .= '    <url>'."\n";
            $xml .= '        <loc>'.e($url['loc']).'</loc>'."\n";
            $xml .= '        <lastmod>'.\Illuminate\Support\Carbon::parse($url['lastmod'])->toAtomString().'</lastmod>'."\n";
            $xml .= '        <priority>'.$url['priority'].'</priority>'."\n";
            $xml .= '    </url>'."\n";
        }
        $xml .= '</urlset>';

        return response($xml, 200)->header('Content-Type', 'application/xml');
    }

    public function robots(): Response
    {
        $lines = [
            'User-agent: *',
            'Allow: /',
            '',
            'Disallow: /admin/',
            'Disallow: /login',
            'Disallow: /admin/login',
            'Disallow: /register',
            'Disallow: /storage/framework/',
            'Disallow: /storage/logs/',
            'Disallow: /vendor/',
            'Disallow: /.env',
            '',
            'Sitemap: '.url('/sitemap.xml'),
        ];

        return response(implode("\n", $lines)."\n", 200)->header('Content-Type', 'text/plain');
    }
}
