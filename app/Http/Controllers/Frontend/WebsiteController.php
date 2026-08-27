<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Visitor;
use App\Support\IpCountryResolver;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WebsiteController extends Controller
{
	public function index()
	{
		$location = IpCountryResolver::resolve(request());

		$visitor = Visitor::firstOrCreate([
			'ip_address' => $location['ip'],
			'visit_date' => Carbon::today()->toDateString(),
		], ['country' => $location['country']]);

		if ((! $visitor->country || $visitor->country === 'Unknown') && $location['country'] !== 'Unknown') {
			$visitor->update(['country' => $location['country']]);
		}

		$latestBlogs = Blog::where('visibility', 1)->latest()->take(3)->get();
		return view('frontend.index', compact('latestBlogs'));
	}

	public function about()
	{
		return view('frontend.about');
	}

	public function contact()
	{
		return view('frontend.contact');
	}



	public function service()
	{
		return view('frontend.services', ['services' => $this->services()]);
	}

	public function blog()
	{
		return view('frontend.blog');
	}

	public function portfolio()
	{
		return view('frontend.portfolio');
	}

	public function serviceDetail(?string $slug = null)
	{
		$services = $this->services();
		$service = collect($services)->firstWhere('slug', $slug) ?: $services[0];
		return view('frontend.service-detail', compact('service', 'services'));
	}

	private function services(): array
	{
		return [
			[
				'slug' => 'software-development',
				'title' => 'Software Development',
				'icon' => 'ri-terminal-box-line',
				'accent' => '#f2a90c',
				'short' => 'Custom business software and portal solutions designed for scalability and reliability, built around the way your team actually works.',
				'tags' => ['Enterprise Software', 'Cloud & APIs', 'Security'],
				'tagline' => 'Custom Software Solutions',
				'subheading' => 'Build powerful, scalable software applications tailored to your unique business processes and requirements.',
				'intro' => "We design and build custom software that fits the way your business actually operates — not the other way around. From internal tools and portals to full enterprise platforms, every system we ship is built to scale, integrate cleanly with what you already run, and stay maintainable long after launch.",
				'features' => [
					['title' => 'Enterprise Software', 'desc' => 'Scalable solutions for large organizations and complex workflows.'],
					['title' => 'CRM Systems', 'desc' => 'Customer relationship management tools that drive sales and retention.'],
					['title' => 'Cloud Applications', 'desc' => 'Cloud-based software built for accessibility, reliability, and scale.'],
					['title' => 'API Development', 'desc' => 'Robust APIs for seamless integration and data exchange.'],
					['title' => 'Database Design', 'desc' => 'Optimized database architecture for performance and reliability.'],
					['title' => 'Security & Compliance', 'desc' => 'Enterprise-grade security and regulatory compliance built in from day one.'],
				],
			],
			[
				'slug' => 'web-development',
				'title' => 'Web Development',
				'icon' => 'ri-global-line',
				'accent' => '#17a2a6',
				'short' => 'Modern, responsive, and conversion-focused websites tailored to your business goals — from marketing sites to complex web platforms and e-commerce stores.',
				'tags' => ['Responsive Design', 'E-commerce', 'Performance'],
				'tagline' => 'Modern Web Solutions That Drive Results',
				'subheading' => 'We build responsive, scalable, and high-performance websites tailored to your business needs.',
				'intro' => "Whether you need a polished corporate site, a high-converting landing page, or a full e-commerce platform, we build for speed, security, and search visibility from day one — websites that look sharp everywhere and keep working long after launch.",
				'features' => [
					['title' => 'Corporate Websites', 'desc' => 'Professional business sites that establish brand identity and credibility.'],
					['title' => 'E-commerce Platforms', 'desc' => 'Online stores with secure payments, inventory, and a smooth checkout experience.'],
					['title' => 'Landing Pages', 'desc' => 'High-converting pages purpose-built for lead generation and campaigns.'],
					['title' => 'Responsive Design', 'desc' => 'Mobile-first layouts that look and function great on every device.'],
					['title' => 'Performance Optimization', 'desc' => 'Faster load times through code improvements and CDN delivery.'],
					['title' => 'Security & Maintenance', 'desc' => 'Ongoing updates, patches, and support to keep your site running smoothly.'],
				],
			],
			[
				'slug' => 'mobile-app-development',
				'title' => 'Mobile App Development',
				'icon' => 'ri-smartphone-line',
				'accent' => '#1f9d63',
				'short' => "Native and cross-platform app experiences with smooth performance and clean UX. We turn ideas into high-performing mobile apps tailored to your users' needs.",
				'tags' => ['iOS & Android', 'Cross-Platform', 'App Maintenance'],
				'tagline' => 'Native & Cross-Platform Mobile Apps',
				'subheading' => 'Create stunning iOS and Android applications with seamless performance, intuitive design, and features that engage users.',
				'intro' => "From native Swift and Kotlin builds to cross-platform apps in React Native and Flutter, we design and engineer mobile products that feel fast and intuitive — with the backend and integrations to match.",
				'features' => [
					['title' => 'iOS Development', 'desc' => 'Native Swift and SwiftUI applications optimized for iPhone and iPad.'],
					['title' => 'Android Development', 'desc' => 'Kotlin and Java-based Android apps that work flawlessly across devices.'],
					['title' => 'Cross-Platform Apps', 'desc' => 'React Native and Flutter apps that run on iOS and Android from one codebase.'],
					['title' => 'Mobile UI/UX Design', 'desc' => 'Beautiful, intuitive interfaces designed with engagement in mind.'],
					['title' => 'Backend Integration', 'desc' => 'Robust API development and third-party service integration.'],
					['title' => 'App Maintenance', 'desc' => 'Regular updates, bug fixes, and performance improvements post-launch.'],
				],
			],
			[
				'slug' => 'ui-ux-design',
				'title' => 'UI/UX Design',
				'icon' => 'ri-palette-line',
				'accent' => '#3b6fe0',
				'short' => 'Deliver seamless and enjoyable digital experiences. Our designs prioritize clarity, ease of use, and attractive interfaces for both web and mobile platforms.',
				'tags' => ['User Research', 'Design Systems', 'Prototyping'],
				'tagline' => 'Design That Feels Effortless',
				'subheading' => 'We craft intuitive, visually compelling interfaces that turn first-time visitors into loyal users.',
				'intro' => "Great design is invisible — it just works. We research how your users actually think, then design interfaces that are clear, consistent, and a pleasure to use across web and mobile, backed by systems that keep every screen on-brand as your product grows.",
				'features' => [
					['title' => 'User Research', 'desc' => 'Interviews and journey mapping that ground every decision in real user behavior.'],
					['title' => 'Wireframing & Prototyping', 'desc' => 'Prototypes that let you test flows before a line of code is written.'],
					['title' => 'UI Design', 'desc' => 'Polished, on-brand interfaces with clear hierarchy and thoughtful detail.'],
					['title' => 'Design Systems', 'desc' => 'Reusable component libraries that keep your product consistent as it scales.'],
					['title' => 'Usability Testing', 'desc' => 'Structured testing sessions that surface friction before it reaches production.'],
					['title' => 'Design Handoff & QA', 'desc' => 'Developer-ready specs and hands-on QA so the build matches the design.'],
				],
			],
			[
				'slug' => 'graphics-design',
				'title' => 'Graphics Design',
				'icon' => 'ri-brush-4-line',
				'accent' => '#e0507a',
				'short' => 'Eye-catching visuals and marketing assets that communicate your brand message clearly across every platform.',
				'tags' => ['Logo Design', 'Social Media', 'Illustrations'],
				'tagline' => 'Creative Visuals That Captivate',
				'subheading' => 'From logos to marketing materials, we create stunning graphics that engage your audience effectively.',
				'intro' => "Good design does more than look good — it communicates. We create logos, marketing collateral, social content, and packaging that stay consistent with your brand and grab attention wherever they show up.",
				'features' => [
					['title' => 'Logo Design', 'desc' => 'Unique, memorable logos that represent your brand identity.'],
					['title' => 'Marketing Materials', 'desc' => 'Brochures, flyers, posters, and banners that drive engagement.'],
					['title' => 'Social Media Graphics', 'desc' => 'Eye-catching posts and ads optimized for every platform.'],
					['title' => 'Business Cards', 'desc' => 'Professional cards that make a lasting first impression.'],
					['title' => 'Illustrations', 'desc' => 'Custom illustrations and iconography for digital and print.'],
					['title' => 'Packaging Design', 'desc' => 'Product packaging that stands out on shelves and online.'],
				],
			],
			[
				'slug' => 'branding',
				'title' => 'Branding',
				'icon' => 'ri-price-tag-3-line',
				'accent' => '#6366f1',
				'short' => 'Cohesive brand identities — strategy, visual systems, and messaging — that make your business memorable and distinct from competitors.',
				'tags' => ['Brand Strategy', 'Visual Identity', 'Guidelines'],
				'tagline' => 'Build a Brand That Stands Out',
				'subheading' => 'We create cohesive brand identities that resonate with your audience through strategic design and messaging.',
				'intro' => "Your brand is more than a logo — it's how people recognize, remember, and trust you. We build brand identities from the ground up: research-led strategy, a visual system that scales, and a voice that stays consistent everywhere your business shows up.",
				'features' => [
					['title' => 'Brand Strategy', 'desc' => 'Research-driven positioning and messaging that connects with your market.'],
					['title' => 'Visual Identity', 'desc' => 'Logos, color palettes, typography, and design systems that define your brand.'],
					['title' => 'Brand Guidelines', 'desc' => 'Comprehensive style guides that ensure consistent brand application.'],
					['title' => 'Brand Messaging', 'desc' => 'A compelling voice, tone, and messaging framework.'],
					['title' => 'Brand Collateral', 'desc' => 'Business cards, letterheads, and other branded materials.'],
					['title' => 'Rebranding', 'desc' => 'Refresh and modernize an existing brand for new markets.'],
				],
			],
			[
				'slug' => 'seo-marketing',
				'title' => 'SEO & Marketing',
				'icon' => 'ri-line-chart-line',
				'accent' => '#d1483f',
				'short' => 'Search visibility, content strategy, and growth campaigns that drive quality traffic and turn visitors into customers.',
				'tags' => ['SEO', 'PPC Ads', 'Analytics'],
				'tagline' => 'Drive Traffic & Grow Your Business',
				'subheading' => 'Boost your online visibility with data-driven SEO strategies and campaigns that deliver measurable ROI.',
				'intro' => "We combine technical SEO, paid campaigns, and content strategy into one plan built around measurable growth — more qualified traffic, better rankings, and campaigns you can tie directly back to revenue.",
				'features' => [
					['title' => 'SEO Optimization', 'desc' => 'On-page and off-page SEO to improve search engine rankings.'],
					['title' => 'PPC Advertising', 'desc' => 'Google Ads and social media campaigns that convert.'],
					['title' => 'Social Media Marketing', 'desc' => 'Engage your audience across all major social platforms.'],
					['title' => 'Email Marketing', 'desc' => 'Targeted campaigns that nurture leads and drive sales.'],
					['title' => 'Analytics & Reporting', 'desc' => 'Data-driven insights to optimize marketing performance.'],
					['title' => 'Content Marketing', 'desc' => 'Valuable content that attracts and converts your ideal customers.'],
				],
			],
			[
				'slug' => 'content-writing',
				'title' => 'Content Writing',
				'icon' => 'ri-quill-pen-line',
				'accent' => '#0ea5e9',
				'short' => 'SEO-optimized blog posts, website copy, and content that tells your story clearly and turns readers into customers.',
				'tags' => ['Blog Writing', 'Website Copy', 'SEO Content'],
				'tagline' => 'Compelling Content That Converts',
				'subheading' => 'Engage your audience with high-quality, SEO-optimized content that tells your story and builds trust.',
				'intro' => "Words carry the weight of your brand online. We write website copy, blog content, and product descriptions that are clear, on-brand, and built to rank — content that reads well and works hard.",
				'features' => [
					['title' => 'Blog Writing', 'desc' => 'Engaging posts that drive traffic and establish thought leadership.'],
					['title' => 'Website Copy', 'desc' => 'Persuasive content that converts visitors into customers.'],
					['title' => 'Article Writing', 'desc' => 'Research-based pieces for publications and online platforms.'],
					['title' => 'Product Descriptions', 'desc' => 'Compelling copy that highlights features and benefits.'],
					['title' => 'SEO Content', 'desc' => 'Keyword-optimized content that ranks well in search engines.'],
					['title' => 'Social Media Content', 'desc' => 'Creative posts and captions that boost engagement.'],
				],
			],
			[
				'slug' => 'ai-ml',
				'title' => 'AI/ML',
				'icon' => 'ri-robot-2-line',
				'accent' => '#7b4fd1',
				'short' => 'We build intelligent features — from automation and predictive models to AI-powered integrations — that give your product a competitive edge.',
				'tags' => ['Predictive Models', 'Automation', 'MLOps'],
				'tagline' => "AI That Works For Your Business",
				'subheading' => 'Practical, production-ready AI and machine learning — from predictive models to intelligent automation.',
				'intro' => "We help businesses move past the AI hype and ship features that actually work — predictive models, intelligent automation, and integrations built to be measurable and maintainable in production.",
				'features' => [
					['title' => 'Predictive Models', 'desc' => 'Machine learning models that forecast trends, churn, and demand.'],
					['title' => 'Intelligent Automation', 'desc' => 'Automate repetitive workflows with AI-driven decisioning.'],
					['title' => 'AI Integrations', 'desc' => 'Add AI-powered chatbots, recommendations, and search to your product.'],
					['title' => 'Natural Language Processing', 'desc' => 'Text classification, summarization, and sentiment analysis.'],
					['title' => 'Computer Vision', 'desc' => 'Image recognition and analysis for automation and quality control.'],
					['title' => 'MLOps & Deployment', 'desc' => 'Reliable pipelines for training, monitoring, and deploying models.'],
				],
			],
		];
	}

	public function servicesForSitemap(): array
	{
		return $this->services();
	}

	public function blogDetail()
	{
		return view('frontend.blog-detail');
	}

}
