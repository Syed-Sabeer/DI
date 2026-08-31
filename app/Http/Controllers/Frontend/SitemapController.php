<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Career;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;

class SitemapController extends Controller
{
    /**
     * Full XML sitemap. Every public route on the site is generated from the
     * same data the pages themselves render, so adding a service, project,
     * post or vacancy puts it in the sitemap with no extra step.
     */
    public function index(): Response
    {
        $urls = [];

        $add = function (string $path, $lastmod, string $freq, string $priority, ?string $image = null) use (&$urls) {
            $urls[] = [
                'loc'      => rtrim(url($path), '/') ?: url('/'),
                'lastmod'  => $lastmod,
                'freq'     => $freq,
                'priority' => $priority,
                'image'    => $image,
            ];
        };

        $website = new WebsiteController;
        $now = now();

        // ---------- core pages ----------
        $add('/',          $now, 'weekly',  '1.0', asset(config('seo.defaultImage')));
        $add('/service',   $now, 'weekly',  '0.9');
        $add('/portfolio', $now, 'weekly',  '0.9');
        $add('/about',     $now, 'monthly', '0.8');
        $add('/contact',   $now, 'monthly', '0.8');
        $add('/blog',      $now, 'daily',   '0.8');
        $add('/career',   $now, 'weekly',  '0.7');

        // ---------- services ----------
        foreach ($website->servicesForSitemap() as $service) {
            $add('/service-detail/'.$service['slug'], $now, 'monthly', '0.8');
        }

        // ---------- portfolio ----------
        foreach ($website->portfoliosForSitemap() as $portfolio) {
            $add(
                '/portfolio/'.$portfolio['slug'],
                $now,
                'monthly',
                '0.8',
                isset($portfolio['image']) ? asset($portfolio['image']) : null
            );
        }

        // ---------- blog posts ----------
        foreach (Blog::where('visibility', 1)->get(['slug', 'image', 'updated_at']) as $blog) {
            $add(
                '/blog/'.$blog->slug,
                $blog->updated_at ?? $now,
                'monthly',
                '0.7',
                $blog->image ? asset('storage/'.$blog->image) : null
            );
        }

        // ---------- open vacancies ----------
        if (class_exists(Career::class)) {
            try {
                foreach (Career::where('visibility', 1)->get(['slug', 'updated_at']) as $career) {
                    $add('/career/'.$career->slug, $career->updated_at ?? $now, 'weekly', '0.6');
                }
            } catch (\Throwable $e) {
                // A schema difference must never take the whole sitemap down.
            }
        }

        // ---------- legal ----------
        foreach (['privacy-policy', 'terms-conditions', 'legal'] as $slug) {
            $add('/'.$slug, $now, 'yearly', '0.3');
        }

        $xml  = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" '
              . 'xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">'."\n";

        foreach ($urls as $url) {
            $xml .= '    <url>'."\n";
            $xml .= '        <loc>'.e($url['loc']).'</loc>'."\n";
            $xml .= '        <lastmod>'.Carbon::parse($url['lastmod'])->toAtomString().'</lastmod>'."\n";
            $xml .= '        <changefreq>'.$url['freq'].'</changefreq>'."\n";
            $xml .= '        <priority>'.$url['priority'].'</priority>'."\n";
            if (! empty($url['image'])) {
                $xml .= '        <image:image>'."\n";
                $xml .= '            <image:loc>'.e($url['image']).'</image:loc>'."\n";
                $xml .= '        </image:image>'."\n";
            }
            $xml .= '    </url>'."\n";
        }
        $xml .= '</urlset>';

        return response($xml, 200)
            ->header('Content-Type', 'application/xml; charset=UTF-8')
            ->header('X-Robots-Tag', 'noindex');
    }

    public function robots(): Response
    {
        $lines = [
            '# https://www.robotstxt.org/',
            '# '.config('seo.brand').' — '.config('seo.tagline'),
            '',
            'User-agent: *',
            'Allow: /',
            '',
            '# Private and non-content areas',
            'Disallow: /admin/',
            'Disallow: /admin/login',
            'Disallow: /login',
            'Disallow: /register',
            'Disallow: /reset-password/',
            'Disallow: /email/',
            'Disallow: /storage/framework/',
            'Disallow: /storage/logs/',
            'Disallow: /vendor/',
            'Disallow: /.env',
            '',
            '# Avoid indexing filtered duplicates of the blog archive',
            'Disallow: /*?search=',
            'Disallow: /*?page=',
            '',
            '# Assets must stay crawlable so pages render correctly for Google',
            'Allow: /FrontendAssets/',
            'Allow: /storage/uploads/',
            'Allow: /*.css$',
            'Allow: /*.js$',
            '',
            '# Major AI assistants are welcome — see /llms.txt',
            'User-agent: GPTBot',
            'Allow: /',
            '',
            'User-agent: ChatGPT-User',
            'Allow: /',
            '',
            'User-agent: OAI-SearchBot',
            'Allow: /',
            '',
            'User-agent: ClaudeBot',
            'Allow: /',
            '',
            'User-agent: Claude-Web',
            'Allow: /',
            '',
            'User-agent: PerplexityBot',
            'Allow: /',
            '',
            'User-agent: Google-Extended',
            'Allow: /',
            '',
            '# Aggressive SEO scrapers',
            'User-agent: AhrefsBot',
            'Crawl-delay: 10',
            '',
            'User-agent: SemrushBot',
            'Crawl-delay: 10',
            '',
            'Sitemap: '.url('/sitemap.xml'),
        ];

        return response(implode("\n", $lines)."\n", 200)
            ->header('Content-Type', 'text/plain; charset=UTF-8');
    }

    /**
     * llms.txt — a concise, machine-readable brief for AI assistants that cite
     * or summarise the site. Proposed spec: https://llmstxt.org
     */
    public function llms(): Response
    {
        $seo = config('seo');
        $website = new WebsiteController;

        $out = [];
        $out[] = '# '.$seo['brand'];
        $out[] = '';
        $out[] = '> '.$seo['tagline'].'. '.$seo['brand'].' is a software development company '
               . 'building custom software, mobile applications, AI automation and digital products '
               . 'for clients in the United States, Canada, the United Kingdom and Australia.';
        $out[] = '';
        $out[] = '## About';
        $out[] = '';
        $out[] = '- **Company:** '.$seo['legalName'];
        $out[] = '- **Tagline:** '.$seo['tagline'];
        $out[] = '- **Founder & CEO:** Syed Sabeer Faisal';
        $out[] = '- **Founded:** '.$seo['founded'];
        $out[] = '- **Headquarters:** '.$seo['address']['street'].', '.$seo['address']['city'].', '
               . $seo['address']['region'].' '.$seo['address']['postal'].', Canada';
        $out[] = '- **Additional office:** Karachi, Pakistan';
        $out[] = '- **Markets served:** '.implode(', ', array_column($seo['targetMarkets'], 'name'));
        $out[] = '- **Contact:** '.$seo['contact']['email'].' · '.$seo['contact']['phone'];
        $out[] = '- **Website:** '.url('/');
        $out[] = '';
        $out[] = '## Services';
        $out[] = '';
        foreach ($website->servicesForSitemap() as $service) {
            $short = isset($service['short']) ? ': '.trim(strip_tags($service['short'])) : '';
            $out[] = '- ['.$service['title'].']('.url('/service-detail/'.$service['slug']).')'.$short;
        }
        $out[] = '';
        $out[] = '## Selected work';
        $out[] = '';
        foreach ($website->portfoliosForSitemap() as $p) {
            $out[] = '- ['.$p['title'].']('.url('/portfolio/'.$p['slug']).'): '.trim(strip_tags($p['short'] ?? ''));
        }
        $out[] = '';
        $out[] = 'Note: the portfolio contains both delivered client projects and concept work. '
               . 'Interface screenshots may use illustrative sample data rather than measured production results. '
               . 'See '.url('/legal').' for the full disclosure.';
        $out[] = '';
        $out[] = '## Key pages';
        $out[] = '';
        $out[] = '- [Home]('.url('/').'): overview of services and capabilities';
        $out[] = '- [Services]('.url('/service').'): full service catalogue';
        $out[] = '- [Portfolio]('.url('/portfolio').'): case studies and product design work';
        $out[] = '- [About]('.url('/about').'): company, team and founder';
        $out[] = '- [Blog]('.url('/blog').'): articles on software, AI and product delivery';
        $out[] = '- [Careers]('.url('/career').'): open roles';
        $out[] = '- [Contact]('.url('/contact').'): enquiries and office locations';
        $out[] = '';
        $out[] = '## Policies';
        $out[] = '';
        $out[] = '- [Privacy Policy]('.url('/privacy-policy').')';
        $out[] = '- [Terms & Conditions]('.url('/terms-conditions').')';
        $out[] = '- [Legal Notice]('.url('/legal').')';
        $out[] = '';
        $out[] = '## Social';
        $out[] = '';
        foreach ($seo['social'] as $network => $link) {
            $out[] = '- '.ucfirst($network).': '.$link;
        }
        $out[] = '';
        $out[] = '---';
        $out[] = 'Sitemap: '.url('/sitemap.xml');
        $out[] = 'Last updated: '.now()->toDateString();

        return response(implode("\n", $out)."\n", 200)
            ->header('Content-Type', 'text/plain; charset=UTF-8');
    }
}
