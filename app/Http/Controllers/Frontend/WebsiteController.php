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
		], [
			'country' => $location['country'],
			'state' => $location['state'],
			'city' => $location['city'],
			'area' => $location['area'],
		]);

		$needsLocationDetails = ! $visitor->country || $visitor->country === 'Unknown'
			|| ! $visitor->state || $visitor->state === 'Unknown'
			|| ! $visitor->city || $visitor->city === 'Unknown'
			|| ! $visitor->area || $visitor->area === 'Unknown';

		if ($needsLocationDetails && $location['country'] !== 'Unknown') {
			$visitor->update([
				'country' => $location['country'],
				'state' => $location['state'],
				'city' => $location['city'],
				'area' => $location['area'],
			]);
		}

		$latestBlogs = Blog::where('visibility', 1)->latest()->take(3)->get();
		$portfolios = array_slice($this->portfolios(), 0, 5);
		return view('frontend.index', compact('latestBlogs', 'portfolios'));
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
		return view('frontend.portfolio', ['portfolios' => $this->portfolios()]);
	}

	public function portfolioDetail(?string $slug = null)
	{
		$portfolios = $this->portfolios();
		$portfolio = collect($portfolios)->firstWhere('slug', $slug) ?: $portfolios[0];
		return view('frontend.portfolio-detail', compact('portfolio', 'portfolios'));
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
				'intro' => "Words carry the weight of your brand online. We write website copy, blog content, and product descriptions that are clear, on-brand, and built to rank content that reads well and works hard.",
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

	public function portfoliosForSitemap(): array
	{
		return $this->portfolios();
	}

	private function portfolios(): array
	{
		return [
			[
				'slug' => 'mcm-textile-erp-crm-platform',
				'title' => 'Building a Textile ERP & CRM Platform for Metro Cotton Mill',
				'category' => 'Textile ERP & CRM',
				'accent' => '#a51c30',
				'image' => 'FrontendAssets/images/projects/mcm/mcm-thumbnail.png',
				'short' => 'A custom textile ERP and CRM that connects customers, quotations, billing, production orders, procurement, and inventory in one role-based platform.',
				'client' => 'Metro Cotton Mill (Pvt) Ltd.',
				'year' => '2026',
				'timeline' => '4 Months',
				'team' => ['Software Development', 'Business Analysis', 'UI/UX Design'],
				'overview' => "Metro Cotton Mill needed more than a conventional CRM to run a textile manufacturing and export business. We built MCM, a custom ERP and CRM platform that brings customer relationships, quotations, proforma billing, manufacturing job orders, supplier purchasing, material inventory, and team activity into one connected workflow, so an order can be traced from the first customer conversation through quotation, payment, production, procurement, and final settlement.",
				'challenge' => "Sales, production, and procurement each depended on information the others created, but the business ran on disconnected spreadsheets and messages. That meant repeated data entry, missing context between departments, and weak visibility into where any given order actually stood.",
				'solution' => "We designed a centralized operations platform built around how a textile manufacturer and exporter actually works, combining CRM, sales, procurement, inventory, and light manufacturing execution in one system where every record connects: a quote becomes a proforma, a proforma becomes a factory job order, and received materials automatically update inventory and vendor payables.",
				'highlights' => [
					['title' => 'Customer 360° Workspace', 'desc' => 'A single view of every company: contacts, cases, quotes, invoices, files, and communication history in one timeline.'],
					['title' => 'Quote-to-Cash Workflow', 'desc' => 'Quotations convert into proforma invoices, advance receipts, and final invoices without re-entering a single line item.'],
					['title' => 'Manufacturing Job Orders', 'desc' => 'Confirmed orders generate requirement sheets and production job cards, exportable to PDF and CSV for the factory floor.'],
					['title' => 'Procurement & Inventory Sync', 'desc' => 'Vendor purchase orders, goods receipts, and material stock levels stay connected end to end, down to vendor payables.'],
				],
				'results' => [
					['value' => '30', 'label' => 'Connected Modules'],
					['value' => '1000+', 'label' => 'Products Managed'],
					['value' => '8', 'label' => 'Role-Based User Types'],
				],
				'gallery' => [
					'FrontendAssets/images/projects/mcm/01-executive-dashboard.jpg',
					'FrontendAssets/images/projects/mcm/02-customer-360-workspace.jpg',
					'FrontendAssets/images/projects/mcm/03-product-bom-setup.jpg',
					'FrontendAssets/images/projects/mcm/04-case-pipeline-kanban.jpg',
					'FrontendAssets/images/projects/mcm/05-sales-quotation.jpg',
					'FrontendAssets/images/projects/mcm/06-proforma-payment-tracking.jpg',
					'FrontendAssets/images/projects/mcm/07-final-invoice-settlement.jpg',
					'FrontendAssets/images/projects/mcm/08-manufacturing-job-order.jpg',
					'FrontendAssets/images/projects/mcm/09-vendor-purchase-order.jpg',
					'FrontendAssets/images/projects/mcm/10-material-inventory.jpg',
				],
			],
			[
				'slug' => 'saas-platform-scaling',
				'title' => 'Scaling a SaaS Platform for Growth',
				'category' => 'SaaS Platform',
				'accent' => '#3b6fe0',
				'image' => 'FrontendAssets/images/projects/18.png',
				'short' => 'A cloud-native platform re-architected to support 10x user growth without sacrificing speed or reliability.',
				'client' => 'Northwind Analytics',
				'year' => '2026',
				'timeline' => '4 Months',
				'team' => ['Software Development', 'Cloud Architecture'],
				'overview' => "Northwind Analytics came to us with a platform that had outgrown its own foundations — response times were climbing, deploys were risky, and the team was afraid to touch the codebase. We rebuilt the core around a cloud-native, service-oriented architecture so the product could keep growing without breaking.",
				'challenge' => "The existing monolith couldn't handle concurrent load beyond a few thousand users, and every new feature meant weeks of regression testing across a tightly coupled codebase.",
				'solution' => "We split the platform into focused services behind a unified API gateway, introduced horizontal auto-scaling, and rebuilt the data layer around read replicas and caching — all rolled out gradually behind feature flags with zero downtime.",
				'highlights' => [
					['title' => 'Service-Oriented Architecture', 'desc' => 'Decoupled the monolith into independently deployable services.'],
					['title' => 'Auto-Scaling Infrastructure', 'desc' => 'Elastic compute that absorbs traffic spikes without manual intervention.'],
					['title' => 'Zero-Downtime Migration', 'desc' => 'Phased rollout behind feature flags with instant rollback capability.'],
					['title' => 'Observability Built In', 'desc' => 'End-to-end tracing and alerting across every service boundary.'],
				],
				'results' => [
					['value' => '10x', 'label' => 'User Capacity'],
					['value' => '65%', 'label' => 'Faster Response Time'],
					['value' => '99.98%', 'label' => 'Uptime Post-Launch'],
				],
				'gallery' => ['FrontendAssets/images/services/s-2.png', 'FrontendAssets/images/services/s-3.png'],
			],
			[
				'slug' => 'mobile-app-redesign-launch',
				'title' => 'Mobile App Redesign & Launch',
				'category' => 'Mobile App',
				'accent' => '#1f9d63',
				'image' => 'FrontendAssets/images/projects/19.png',
				'short' => 'A ground-up redesign that made everyday tasks faster, clearer, and genuinely enjoyable to use.',
				'client' => 'Fielda Logistics',
				'year' => '2026',
				'timeline' => '3 Months',
				'team' => ['UI/UX Design', 'Mobile App Development'],
				'overview' => "Fielda's field-service app worked, but drivers were abandoning tasks halfway through and support tickets were piling up. We rebuilt the experience around the three things a driver actually needs mid-shift: speed, clarity, and confidence that an action went through.",
				'challenge' => "Task completion rates were dropping and support was fielding the same confusion-driven tickets every week, all pointing back to a cluttered, inconsistent interface.",
				'solution' => "We redesigned the core flows around a single-thumb interaction model, simplified navigation from five tabs to three, and rebuilt the app in React Native for consistent behavior across iOS and Android.",
				'highlights' => [
					['title' => 'Single-Thumb Navigation', 'desc' => 'Every core action reachable without repositioning the hand.'],
					['title' => 'Offline-First Sync', 'desc' => 'Field updates queue locally and sync the moment signal returns.'],
					['title' => 'Cross-Platform Consistency', 'desc' => 'One React Native codebase, identical behavior on iOS and Android.'],
					['title' => 'In-App Guidance', 'desc' => 'Contextual tips that replaced most first-week support tickets.'],
				],
				'results' => [
					['value' => '48%', 'label' => 'Faster Task Completion'],
					['value' => '-62%', 'label' => 'Support Tickets'],
					['value' => '4.8★', 'label' => 'App Store Rating'],
				],
				'gallery' => ['FrontendAssets/images/services/s-2.png', 'FrontendAssets/images/services/s-3.png'],
			],
			[
				'slug' => 'ecommerce-platform-development',
				'title' => 'E-Commerce Platform Development',
				'category' => 'E-Commerce',
				'accent' => '#7b4fd1',
				'image' => 'FrontendAssets/images/projects/20.png',
				'short' => 'A conversion-focused storefront built to handle scale without slowing shoppers down.',
				'client' => 'Aurelle Home Goods',
				'year' => '2025',
				'timeline' => '5 Months',
				'team' => ['Web Development', 'UI/UX Design', 'SEO & Marketing'],
				'overview' => "Aurelle needed a storefront that could handle seasonal traffic spikes without sacrificing the speed and polish their brand is known for. We built a headless commerce platform tuned for both performance and conversion.",
				'challenge' => "The previous store slowed to a crawl during sale events and the checkout flow lost nearly a third of shoppers before payment.",
				'solution' => "We moved to a headless architecture with edge caching, redesigned checkout down to three steps, and instrumented every step of the funnel so the team could keep optimizing after launch.",
				'highlights' => [
					['title' => 'Headless Storefront', 'desc' => 'Decoupled frontend served from the edge for near-instant loads.'],
					['title' => 'Three-Step Checkout', 'desc' => 'Streamlined flow with saved details and one-click reorder.'],
					['title' => 'Inventory-Aware UX', 'desc' => 'Real-time stock signals that reduce cart abandonment.'],
					['title' => 'Funnel Analytics', 'desc' => 'Instrumented checkout so every drop-off point is measurable.'],
				],
				'results' => [
					['value' => '3.1x', 'label' => 'Conversion Rate'],
					['value' => '1.2s', 'label' => 'Avg. Page Load'],
					['value' => '-38%', 'label' => 'Cart Abandonment'],
				],
				'gallery' => ['FrontendAssets/images/services/s-2.png', 'FrontendAssets/images/services/s-3.png'],
			],
			[
				'slug' => 'legacy-enterprise-modernization',
				'title' => 'Modernizing a Legacy Enterprise System',
				'category' => 'Enterprise Software',
				'accent' => '#d1483f',
				'image' => 'FrontendAssets/images/projects/21.png',
				'short' => "Migrating a decade-old monolith into a modular, cloud-ready architecture with zero downtime.",
				'client' => 'Harlow Manufacturing Group',
				'year' => '2025',
				'timeline' => '8 Months',
				'team' => ['Software Development', 'Cloud Architecture', 'Security & Compliance'],
				'overview' => "Harlow's operations ran on a decade-old on-premise system that no one fully trusted to touch. We modernized it in place — module by module — onto a cloud-ready stack without ever pausing daily operations.",
				'challenge' => "The system was too critical to replace outright, too fragile to modify quickly, and increasingly expensive to keep alive on aging infrastructure.",
				'solution' => "We wrapped legacy modules behind clean APIs, migrated data incrementally with continuous validation, and moved workloads to the cloud in stages — each one verified in parallel with the old system before cutover.",
				'highlights' => [
					['title' => 'Incremental Migration', 'desc' => 'Legacy modules replaced in stages, never all at once.'],
					['title' => 'Parallel Verification', 'desc' => 'Every stage validated against the old system before cutover.'],
					['title' => 'Modern API Layer', 'desc' => 'Clean interfaces that decouple new work from legacy internals.'],
					['title' => 'Compliance Preserved', 'desc' => 'Full audit trails maintained throughout the transition.'],
				],
				'results' => [
					['value' => '0', 'label' => 'Hours of Downtime'],
					['value' => '45%', 'label' => 'Lower Infra Cost'],
					['value' => '5x', 'label' => 'Faster Release Cycle'],
				],
				'gallery' => ['FrontendAssets/images/services/s-2.png', 'FrontendAssets/images/services/s-3.png'],
			],
			[
				'slug' => 'fintech-dashboard-real-time-insights',
				'title' => 'Building a Fintech Dashboard for Real-Time Insights',
				'category' => 'FinTech',
				'accent' => '#c98a12',
				'image' => 'FrontendAssets/images/projects/14.png',
				'short' => 'A real-time analytics dashboard that turns raw transaction data into decisions teams can act on.',
				'client' => 'Ledgerly Financial',
				'year' => '2026',
				'timeline' => '4 Months',
				'team' => ['Software Development', 'AI/ML', 'UI/UX Design'],
				'overview' => "Ledgerly's analysts were exporting spreadsheets to answer questions that should have taken seconds. We built a real-time dashboard that streams transaction data straight into the visualizations decision-makers actually use.",
				'challenge' => "Reporting relied on nightly batch exports, so decisions were always working from data that was already a day old.",
				'solution' => "We built a streaming data pipeline with anomaly-detection models running alongside it, surfaced through a dashboard that updates live and lets analysts drill from a trend line straight down to the source transaction.",
				'highlights' => [
					['title' => 'Real-Time Data Pipeline', 'desc' => 'Streaming ingestion replaces overnight batch exports.'],
					['title' => 'Anomaly Detection', 'desc' => 'ML models flag unusual activity as it happens.'],
					['title' => 'Drill-Down Analytics', 'desc' => 'From trend line to source transaction in two clicks.'],
					['title' => 'Role-Based Views', 'desc' => 'Tailored dashboards for analysts, managers, and execs.'],
				],
				'results' => [
					['value' => 'Live', 'label' => 'Data Latency'],
					['value' => '70%', 'label' => 'Faster Reporting'],
					['value' => '3x', 'label' => 'Anomalies Caught'],
				],
				'gallery' => ['FrontendAssets/images/services/s-2.png', 'FrontendAssets/images/services/s-3.png'],
			],
			[
				'slug' => 'product-launch-marketing-website',
				'title' => 'Launching a Marketing Website for a Product Debut',
				'category' => 'Marketing Website',
				'accent' => '#17a2a6',
				'image' => 'FrontendAssets/images/projects/16.png',
				'short' => 'A high-converting launch site built to turn day-one traffic into a waitlist that actually converts.',
				'client' => 'Orbital Devices',
				'year' => '2025',
				'timeline' => '6 Weeks',
				'team' => ['Web Development', 'Content Writing', 'SEO & Marketing'],
				'overview' => "Orbital needed a launch site live before their embargo lifted, with no room to slip the date. We designed, wrote, and shipped a fast, SEO-ready marketing site built to convert cold traffic into waitlist signups from day one.",
				'challenge' => "A hard embargo date left no room for delay, and the site needed to hold up under a sudden traffic spike the moment coverage went live.",
				'solution' => "We built on a static-first stack for near-instant loads, wrote conversion-focused copy around the product's core value prop, and load-tested the signup flow well ahead of launch day.",
				'highlights' => [
					['title' => 'Static-First Build', 'desc' => 'Pre-rendered pages that stay fast under any traffic spike.'],
					['title' => 'Conversion Copywriting', 'desc' => 'Messaging built around the product\'s single strongest hook.'],
					['title' => 'SEO Foundation', 'desc' => 'Technical SEO in place before the first press mention landed.'],
					['title' => 'Launch-Day Load Testing', 'desc' => 'Signup flow verified against a simulated traffic surge.'],
				],
				'results' => [
					['value' => '12K+', 'label' => 'Waitlist Signups (Week 1)'],
					['value' => '0.6s', 'label' => 'Avg. Page Load'],
					['value' => '100%', 'label' => 'Uptime on Launch Day'],
				],
				'gallery' => ['FrontendAssets/images/services/s-2.png', 'FrontendAssets/images/services/s-3.png'],
			],
		];
	}

	public function blogDetail()
	{
		return view('frontend.blog-detail');
	}

}
