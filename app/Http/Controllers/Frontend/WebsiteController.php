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

	public function privacyPolicy()
	{
		return $this->legalDocument('privacy-policy');
	}

	public function termsConditions()
	{
		return $this->legalDocument('terms-conditions');
	}

	public function legal()
	{
		return $this->legalDocument('legal');
	}

	/**
	 * Renders one of the three legal documents through a single shared view, so
	 * the layout, typography and contents rail stay identical across all three.
	 */
	private function legalDocument(string $key)
	{
		$documents = $this->legalDocuments();
		abort_unless(isset($documents[$key]), 404);

		$document = $documents[$key];
		$others = [];
		foreach ($documents as $slug => $doc) {
			if ($slug !== $key) {
				$others[] = $doc;
			}
		}

		return view('frontend.legal', compact('document', 'others'));
	}

	public function legalDocumentsForSitemap(): array
	{
		return $this->legalDocuments();
	}

	/**
	 * The three legal documents. Company details appear in the body copy; if an
	 * address, phone number or governing jurisdiction changes, update it here
	 * and on the contact page.
	 */
	private function legalDocuments(): array
	{
		$updated = '29 August 2026';

		$documents = [
			'privacy-policy' => [
				'slug'    => 'privacy-policy',
				'route'   => 'privacy',
				'eyebrow' => 'Privacy',
				'title'   => 'Privacy Policy',
				'icon'    => 'ri-shield-check-line',
				'accent'  => '#b8eb00',
				'lead'    => 'How Deveon Inc collects, uses, shares and protects personal information across our website and client engagements.',
				'sections' => [
					['id' => 'who-we-are', 'heading' => 'Who we are', 'body' => '
						<p>Deveon Inc (&ldquo;Deveon&rdquo;, &ldquo;we&rdquo;, &ldquo;us&rdquo; or &ldquo;our&rdquo;) is a software development company. Our headquarters is at Suite 391 &ndash; 1505 Laperriere Avenue, Ottawa, Ontario K1Z 7T1, Canada, and we operate an additional office at 71A Street 3, Sindhi Muslim Cooperative Housing Society, Block A (SMCHS), Karachi, 75400, Pakistan.</p>
						<p>This policy explains what personal information we handle when you visit deveoninc.com, contact us, subscribe to updates, apply for a role, or engage us for professional services. It applies to our website and business operations. It does not apply to third-party websites we link to, or to systems we build and operate on behalf of a client under that client&rsquo;s own privacy policy.</p>
					'],
					['id' => 'information-we-collect', 'heading' => 'Information we collect', 'body' => '
						<p>We collect only what we need to respond to you and run our business.</p>
						<ul>
							<li><b>Information you give us.</b> Your name, email address, telephone number, company, and the content of any message you submit through our contact form, newsletter sign-up, or career application, including a CV or portfolio link where you choose to provide one.</li>
							<li><b>Engagement information.</b> Where you become a client, the contact, billing and project details necessary to deliver and administer the work.</li>
							<li><b>Technical information.</b> Standard server and analytics data such as IP address, browser and device type, referring page, pages viewed, and approximate region. This is used in aggregate to understand and improve site performance.</li>
							<li><b>Correspondence.</b> Records of communications between us, so we have context for your enquiry and an accurate account of what was agreed.</li>
						</ul>
						<p>We do not knowingly collect sensitive categories of personal information through this website, and we ask that you do not send them to us through the contact form.</p>
					'],
					['id' => 'how-we-use-it', 'heading' => 'How we use your information', 'body' => '
						<ul>
							<li>To answer your enquiry and provide the information or proposal you asked for.</li>
							<li>To deliver, support and invoice professional services under an agreed engagement.</li>
							<li>To consider your application for a role with us.</li>
							<li>To send updates you have subscribed to, each of which includes an unsubscribe link.</li>
							<li>To operate, secure, troubleshoot and improve our website.</li>
							<li>To meet our legal, accounting and regulatory obligations.</li>
						</ul>
						<p>We do not sell personal information. We do not share it with third parties for their own marketing purposes.</p>
					'],
					['id' => 'legal-bases', 'heading' => 'Our basis for processing', 'body' => '
						<p>Where Canadian privacy law applies, we rely on your consent, which may be express or implied by the circumstances, and on the exceptions permitted under applicable legislation.</p>
						<p>Where the EU or UK GDPR applies, we rely on one of the following: your <b>consent</b> (for example, marketing emails); the <b>performance of a contract</b> (delivering services you have engaged us for); our <b>legitimate interests</b> in operating, securing and promoting our business, balanced against your rights; and <b>compliance with a legal obligation</b>.</p>
					'],
					['id' => 'cookies', 'heading' => 'Cookies and analytics', 'body' => '
						<p>Our website uses a small number of cookies and similar technologies. Strictly necessary cookies keep the site functioning, maintain your session, and protect form submissions against abuse. Analytics cookies help us understand which pages are useful and where visitors encounter difficulty.</p>
						<p>You can block or delete cookies through your browser settings. Doing so may prevent parts of the site, such as form submission, from working correctly.</p>
					'],
					['id' => 'sharing', 'heading' => 'When we share information', 'body' => '
						<p>We share personal information only where it is necessary, and only with:</p>
						<ul>
							<li><b>Service providers</b> who support our operations &mdash; hosting, email delivery, analytics, scheduling and accounting &mdash; and who are permitted to use the information only to provide those services to us.</li>
							<li><b>Professional advisers</b> such as lawyers, auditors and insurers, where required.</li>
							<li><b>Authorities</b>, where we are legally compelled to disclose, or where disclosure is necessary to establish or defend legal claims or to protect the rights and safety of any person.</li>
							<li><b>A successor entity</b>, in connection with a merger, acquisition or sale of assets, subject to the protections in this policy.</li>
						</ul>
					'],
					['id' => 'transfers', 'heading' => 'International transfers', 'body' => '
						<p>We operate from Canada and Pakistan and use service providers that may process data in other countries, including the United States and the European Union. Where information is transferred across borders it may become subject to the laws of the receiving jurisdiction, including lawful access requests by courts and public authorities there.</p>
						<p>When we transfer personal information outside its country of origin, we take reasonable steps to ensure it remains protected by contractual commitments and appropriate safeguards.</p>
					'],
					['id' => 'retention', 'heading' => 'How long we keep it', 'body' => '
						<p>We keep personal information only as long as it serves the purpose it was collected for, or as long as we are required to keep it.</p>
						<ul>
							<li><b>Enquiries that do not become engagements</b> &mdash; typically up to 24 months, so we have context if you return to us.</li>
							<li><b>Client engagement records</b> &mdash; for the duration of the engagement and afterwards for the period required by contract, tax and limitation rules.</li>
							<li><b>Career applications</b> &mdash; up to 12 months, unless you ask us to remove them sooner or agree to us keeping them for future openings.</li>
							<li><b>Newsletter subscriptions</b> &mdash; until you unsubscribe.</li>
						</ul>
					'],
					['id' => 'security', 'heading' => 'How we protect it', 'body' => '
						<p>We apply administrative, technical and physical safeguards appropriate to the sensitivity of the information we hold. These include encryption in transit, access controls limited to staff who need the information to do their work, credential management, logging, and regular review of the third-party services we rely on.</p>
						<p>No method of transmission or storage is completely secure, and we cannot guarantee absolute security. If a breach affecting your personal information occurs, we will act on it and notify you and the relevant authorities where the law requires.</p>
					'],
					['id' => 'your-rights', 'heading' => 'Your rights and choices', 'body' => '
						<p>Subject to the law that applies to you, you may ask us to:</p>
						<ul>
							<li>confirm whether we hold personal information about you, and provide access to it;</li>
							<li>correct information that is inaccurate or incomplete;</li>
							<li>delete information we no longer have a lawful basis to keep;</li>
							<li>restrict or object to a particular use, including direct marketing;</li>
							<li>provide a portable copy of information you gave us; or</li>
							<li>withdraw a consent you previously gave, without affecting processing already carried out.</li>
						</ul>
						<p>Email us at <a href="mailto:info@deveoninc.com">info@deveoninc.com</a> and we will respond within the timeframe required by applicable law. We may need to verify your identity before acting. If you are not satisfied with our response, you may complain to the Office of the Privacy Commissioner of Canada, or to the supervisory authority in your country of residence.</p>
					'],
					['id' => 'children', 'heading' => 'Children', 'body' => '
						<p>Our website and services are directed at businesses and are not intended for children. We do not knowingly collect personal information from children. If you believe a child has provided us with information, contact us and we will delete it.</p>
					'],
					['id' => 'changes', 'heading' => 'Changes to this policy', 'body' => '
						<p>We may update this policy to reflect changes to our practices, technology or legal obligations. The revision date at the top of this page always shows when it was last changed. Where a change is material, we will take reasonable steps to bring it to your attention.</p>
					'],
				],
			],
			'terms-conditions' => [
				'slug'    => 'terms-conditions',
				'route'   => 'terms',
				'eyebrow' => 'Terms',
				'title'   => 'Terms &amp; Conditions',
				'icon'    => 'ri-file-list-3-line',
				'accent'  => '#4f8cff',
				'lead'    => 'The terms that govern your use of this website and the basis on which Deveon Inc provides professional services.',
				'sections' => [
					['id' => 'agreement', 'heading' => 'Agreement to these terms', 'body' => '
						<p>These Terms and Conditions govern your access to and use of deveoninc.com and any enquiry you submit through it. By using this website you accept these terms. If you do not accept them, please do not use the site.</p>
						<p>Professional services are provided under a separate written agreement &mdash; a proposal, statement of work, or master services agreement signed by both parties. <b>Where that signed agreement conflicts with these terms, the signed agreement prevails</b> for the services it covers.</p>
					'],
					['id' => 'definitions', 'heading' => 'Definitions', 'body' => '
						<ul>
							<li><b>&ldquo;Deveon&rdquo;, &ldquo;we&rdquo;, &ldquo;us&rdquo;</b> means Deveon Inc.</li>
							<li><b>&ldquo;You&rdquo;, &ldquo;Client&rdquo;</b> means the person or entity using this website or engaging our services.</li>
							<li><b>&ldquo;Services&rdquo;</b> means the software development, design, consulting and related work described in a signed proposal or statement of work.</li>
							<li><b>&ldquo;Deliverables&rdquo;</b> means the work product we are contracted to deliver under an engagement.</li>
							<li><b>&ldquo;Client Materials&rdquo;</b> means content, data, credentials, brand assets and systems you provide to us for the engagement.</li>
						</ul>
					'],
					['id' => 'use-of-site', 'heading' => 'Acceptable use of this website', 'body' => '
						<p>You may view, download and print pages from this site for your own business evaluation. You may not:</p>
						<ul>
							<li>copy, republish or redistribute our content for commercial purposes without written permission;</li>
							<li>attempt to gain unauthorised access to the site, its server, or any connected system;</li>
							<li>probe, scan or test the vulnerability of the site except under the responsible disclosure process described in our <a href="{{ route(\'legal\') }}">Legal Notice</a>;</li>
							<li>introduce malicious code, or use automated means to scrape or overload the site;</li>
							<li>submit false information, or another person&rsquo;s personal information without their permission; or</li>
							<li>use the site in a way that breaches any applicable law.</li>
						</ul>
					'],
					['id' => 'enquiries', 'heading' => 'Enquiries, estimates and engagements', 'body' => '
						<p>Information on this site, including service descriptions and any indicative timelines or figures, is provided for general information. <b>It is not an offer capable of acceptance and does not create a binding commitment.</b></p>
						<p>An engagement begins only when both parties sign a proposal or statement of work setting out scope, deliverables, timeline, fees and assumptions. Estimates given before that point are based on the information available at the time and may change once requirements are fully defined.</p>
						<p>Changes to agreed scope are handled through a written change request describing the impact on cost and schedule.</p>
					'],
					['id' => 'fees', 'heading' => 'Fees, invoicing and payment', 'body' => '
						<p>Fees, payment schedule, currency and any expenses are set out in the applicable statement of work. Unless stated otherwise there:</p>
						<ul>
							<li>invoices are payable within 14 days of the invoice date;</li>
							<li>fees are exclusive of taxes, duties and third-party costs such as licences, hosting or app-store fees, which are your responsibility;</li>
							<li>we may suspend work on overdue accounts after giving written notice; and</li>
							<li>deposits and milestone payments made for work already performed are non-refundable.</li>
						</ul>
					'],
					['id' => 'intellectual-property', 'heading' => 'Intellectual property', 'body' => '
						<p><b>Our website.</b> The design, text, graphics, code and arrangement of this site, together with the Deveon name and logo, are owned by us or our licensors and are protected by intellectual property law.</p>
						<p><b>Deliverables.</b> Ownership of custom deliverables transfers to you on full payment of all amounts due for the relevant engagement, as set out in the statement of work.</p>
						<p><b>Pre-existing and general knowledge.</b> We retain ownership of tools, libraries, frameworks, components and methods that existed before the engagement or that we develop generally, and we grant you a perpetual, non-exclusive licence to use them to the extent they are embedded in your deliverables. Nothing prevents us from applying the skills and general knowledge gained in the course of our work.</p>
						<p><b>Third-party components.</b> Open-source and commercially licensed components remain subject to their own licences, which we will identify where they materially affect your use of the deliverables.</p>
					'],
					['id' => 'client-materials', 'heading' => 'Client materials and responsibilities', 'body' => '
						<p>You are responsible for providing accurate Client Materials and for holding the rights necessary for us to use them for the engagement. You confirm that our use of them will not infringe any third party&rsquo;s rights.</p>
						<p>Timely feedback, approvals and access are essential to delivery. Where a project is delayed by a pending decision, missing access or unavailable content, timelines and fees may be adjusted accordingly.</p>
					'],
					['id' => 'confidentiality', 'heading' => 'Confidentiality', 'body' => '
						<p>Each party will keep the other&rsquo;s confidential information in confidence, use it only for the engagement, and protect it with at least the care it applies to its own confidential information. This does not apply to information that is public through no breach, was already lawfully known, is independently developed, or must be disclosed by law &mdash; in which case the disclosing party will be notified where legally permitted.</p>
						<p>Unless you tell us otherwise in writing, we may identify you as a client and describe the general nature of the work in our portfolio and marketing.</p>
					'],
					['id' => 'third-party', 'heading' => 'Third-party services and links', 'body' => '
						<p>Our website and our deliverables may reference or integrate third-party services. We do not control those services, are not responsible for their content, availability, pricing or practices, and a link is not an endorsement. Your use of a third-party service is governed by that provider&rsquo;s own terms.</p>
					'],
					['id' => 'disclaimers', 'heading' => 'Disclaimers', 'body' => '
						<p>This website is provided on an <b>&ldquo;as is&rdquo; and &ldquo;as available&rdquo;</b> basis. We do not warrant that it will be uninterrupted, error-free, or free of harmful components, and we make no warranty as to the accuracy or completeness of its content.</p>
						<p>Services are performed with reasonable skill and care by suitably qualified personnel. Except as expressly stated in a signed agreement, we give no other warranty, and we do not warrant that software will be free of all defects or will meet requirements that were not specified in writing.</p>
						<p>Nothing in these terms excludes liability that cannot lawfully be excluded, including liability for death or personal injury caused by negligence, or for fraud.</p>
					'],
					['id' => 'liability', 'heading' => 'Limitation of liability', 'body' => '
						<p>To the fullest extent permitted by law, neither party is liable for indirect, incidental, special, consequential or punitive damages, or for loss of profit, revenue, goodwill, business opportunity or data, however caused.</p>
						<p>Our total aggregate liability arising out of or in connection with an engagement is limited to the fees actually paid by you to us for that engagement in the twelve months preceding the event giving rise to the claim. Our total aggregate liability in connection with your use of this website, where no engagement exists, is limited to CAD $100.</p>
					'],
					['id' => 'indemnity', 'heading' => 'Indemnity', 'body' => '
						<p>You agree to indemnify us against claims, losses and reasonable costs arising from your breach of these terms, your misuse of the website, or a third-party claim that Client Materials you supplied infringe that party&rsquo;s rights.</p>
					'],
					['id' => 'termination', 'heading' => 'Suspension and termination', 'body' => '
						<p>We may suspend or withdraw access to this website at any time, and may restrict access where use breaches these terms. Termination of an engagement is governed by the applicable statement of work; on termination you remain liable for work performed and costs committed up to the effective date.</p>
					'],
					['id' => 'governing-law', 'heading' => 'Governing law and disputes', 'body' => '
						<p>These terms are governed by the laws of the Province of Ontario and the federal laws of Canada applicable therein, without regard to conflict-of-laws principles. The parties submit to the exclusive jurisdiction of the courts of Ontario.</p>
						<p>Before commencing proceedings, the parties will attempt in good faith to resolve the dispute through discussion between senior representatives.</p>
					'],
					['id' => 'changes-terms', 'heading' => 'Changes to these terms', 'body' => '
						<p>We may revise these terms from time to time. The revision date at the top of this page shows when they were last changed, and the version in force is the one published here when you use the site. Changes do not retroactively alter a signed engagement.</p>
					'],
				],
			],
			'legal' => [
				'slug'    => 'legal',
				'route'   => 'legal',
				'eyebrow' => 'Legal',
				'title'   => 'Legal Notice',
				'icon'    => 'ri-scales-3-line',
				'accent'  => '#a06bff',
				'lead'    => 'Company identification, intellectual property, portfolio disclosures, accessibility and security reporting.',
				'sections' => [
					['id' => 'company-information', 'heading' => 'Company information', 'body' => '
						<div class="legal-facts">
							<div class="legal-facts__row"><span>Legal name</span><b>Deveon Inc</b></div>
							<div class="legal-facts__row"><span>Headquarters</span><b>Suite 391 &ndash; 1505 Laperriere Avenue, Ottawa, Ontario K1Z 7T1, Canada</b></div>
							<div class="legal-facts__row"><span>Additional office</span><b>71A Street 3, SMCHS Block A, Karachi 75400, Pakistan</b></div>
							<div class="legal-facts__row"><span>Email</span><b><a href="mailto:info@deveoninc.com">info@deveoninc.com</a></b></div>
							<div class="legal-facts__row"><span>Telephone</span><b><a href="tel:+19055148474">+1 905 514 8474</a></b></div>
							<div class="legal-facts__row"><span>Website</span><b>deveoninc.com</b></div>
							<div class="legal-facts__row"><span>Nature of business</span><b>Custom software development, mobile applications, AI automation and digital product design</b></div>
						</div>
						<p>This notice sets out information about Deveon Inc and the terms on which this website is made available. It should be read together with our <a href="{{ route(\'privacy\') }}">Privacy Policy</a> and <a href="{{ route(\'terms\') }}">Terms &amp; Conditions</a>.</p>
					'],
					['id' => 'website-content', 'heading' => 'Website content and accuracy', 'body' => '
						<p>We take care to keep the information on this website accurate and current, but it is provided for general information only. It does not constitute professional, technical, financial or legal advice, and it should not be relied upon as the sole basis for a business decision.</p>
						<p>Service descriptions, capabilities and indicative figures may change without notice. Nothing on this site forms part of a contract unless it is incorporated into a signed proposal or statement of work.</p>
					'],
					['id' => 'portfolio-disclosure', 'heading' => 'Portfolio, concept work and demonstration data', 'body' => '
						<p>Our portfolio contains two different kinds of work, and we label them honestly.</p>
						<ul>
							<li><b>Delivered client projects</b> are systems we built and shipped for a named client under a commercial engagement.</li>
							<li><b>Concept and pre-development work</b> comprises product architecture and original UI/UX design produced by Deveon, presented to demonstrate our approach. These are not deployed production services.</li>
						</ul>
						<p>Interface screenshots throughout the portfolio may contain <b>illustrative sample data</b> &mdash; names, companies, figures, metrics, response times and transaction values created for demonstration. Sample data does not represent real individuals, real customer records, or measured production results. Where a performance figure is described as a target, it is a design objective for implementation planning and not a claim of achieved performance.</p>
						<p>Screens shown for a concept product are original design work by Deveon and do not depict a live deployed service.</p>
					'],
					['id' => 'client-references', 'heading' => 'Client names, logos and testimonials', 'body' => '
						<p>Client names and logos appear on this site to identify work we performed, and remain the property of their respective owners. Their use here does not imply that those owners endorse or are affiliated with any other content on this site.</p>
						<p>Testimonials are the genuine opinions of the individuals credited and reflect their own experience of a specific engagement. Individual results vary with scope, budget, timeline and circumstances, and a testimonial is not a guarantee of any particular outcome. Where a review was published on an external platform, we link to the source so you can read it in its original context.</p>
					'],
					['id' => 'intellectual-property-notice', 'heading' => 'Intellectual property', 'body' => '
						<p>Unless otherwise stated, the copyright and other intellectual property rights in this website &mdash; its text, graphics, layout, design system, illustrations, interface designs and source code &mdash; belong to Deveon Inc or its licensors.</p>
						<p>You may view and print pages for your own business evaluation. Systematic copying, republication, redistribution, or use of our designs or written content to train or fine-tune a machine-learning model is not permitted without our prior written consent.</p>
						<p>&ldquo;Deveon&rdquo; and the Deveon mark are used by us as trade marks. Requests to use our name or logo &mdash; for example in a press release or partner listing &mdash; should be sent to <a href="mailto:info@deveoninc.com">info@deveoninc.com</a>.</p>
					'],
					['id' => 'third-party-marks', 'heading' => 'Third-party trademarks', 'body' => '
						<p>Product names, logos and marks of other organisations referenced on this site &mdash; including technology platforms, frameworks and services we work with &mdash; are the property of their respective owners. They are used for identification and descriptive purposes only. Their appearance does not imply endorsement, sponsorship, partnership or certification unless we state that relationship explicitly.</p>
					'],
					['id' => 'external-links', 'heading' => 'Links to other websites', 'body' => '
						<p>This site links to external websites we do not control. We provide those links for convenience and are not responsible for their content, accuracy, availability, security or privacy practices. Following an external link is at your own discretion, and the destination site&rsquo;s own terms and privacy policy will apply.</p>
						<p>You may link to our home page from a site that does not misrepresent your relationship with us or imply an endorsement we have not given. Framing our pages, or presenting our content as your own, is not permitted.</p>
					'],
					['id' => 'accessibility', 'heading' => 'Accessibility', 'body' => '
						<p>We aim to make this website usable by as many people as possible, and we work toward the Web Content Accessibility Guidelines (WCAG) 2.2 Level AA as our reference standard. That includes keyboard navigation, meaningful text alternatives, sufficient colour contrast, respect for reduced-motion preferences, and a structure that works with assistive technology.</p>
						<p>Accessibility is an ongoing effort rather than a finished state, and some areas of the site will meet the standard more fully than others. If you encounter a barrier, tell us at <a href="mailto:info@deveoninc.com">info@deveoninc.com</a> with the page address and a short description, and we will work to fix it and to offer the information you needed in another format in the meantime.</p>
					'],
					['id' => 'responsible-disclosure', 'heading' => 'Reporting a security issue', 'body' => '
						<p>We welcome reports of suspected security vulnerabilities in this website. Please email <a href="mailto:info@deveoninc.com">info@deveoninc.com</a> with enough detail to reproduce the issue, and give us a reasonable opportunity to investigate and remediate before any public disclosure.</p>
						<p>When investigating, please act in good faith: do not access, modify or delete data belonging to others, do not degrade or interrupt our services, and do not use social engineering or physical attacks. We will acknowledge legitimate reports and will not pursue action against researchers who follow this process.</p>
					'],
					['id' => 'related-documents', 'heading' => 'Related documents', 'body' => '
						<p>This notice forms part of a set of three documents that together govern your relationship with Deveon Inc:</p>
						<ul>
							<li><a href="{{ route(\'privacy\') }}">Privacy Policy</a> &mdash; what personal information we handle, why, and the rights you hold over it.</li>
							<li><a href="{{ route(\'terms\') }}">Terms &amp; Conditions</a> &mdash; the terms for using this website and the basis on which we provide services.</li>
							<li>Legal Notice &mdash; this document.</li>
						</ul>
					'],
				],
			],
		];

		foreach ($documents as $slug => $doc) {
			$documents[$slug]['updated'] = $updated;
		}

		return $documents;
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
				'slug' => 'posev-retail-erp-pos-platform',
				'title' => 'POSEV — Connected Retail Operations, from Checkout to Close',
				'category' => 'Retail ERP & POS',
				'accent' => '#ef6b1f',
				'image' => 'FrontendAssets/images/projects/posev/posev-thumbnail.png',
				'short' => 'An integrated retail ERP and Point of Sale platform unifying checkout, sales, purchasing, stock, receivables, payables, accounting, and month-end control in one workspace.',
				'client' => 'POSEV Retail Operations',
				'year' => '2026',
				'timeline' => '5 Months',
				'team' => ['Software Development', 'Enterprise UX', 'UI/UX Design'],
				'overview' => "POSEV is an integrated retail operations platform that manages the complete commercial and financial workflow of a product-based business. It includes a dedicated Point of Sale terminal, but its scope is far broader than a conventional checkout system: POS, sales invoicing, purchase management, inventory control, customer and supplier accounts, cash collection, supplier payments, expenses, journal entries, financial statements, operational reporting, user permissions, monthly closing, and backup utilities all live in one connected application.",
				'challenge' => "Retail and trading businesses need fast front-counter transactions without losing the structure required for stock control and financial accountability. When billing, spreadsheets for stock, manual books for customer credit and separate notes for supplier balances operate as separate tools, teams duplicate work, stock levels become difficult to trust, credit exposure is easy to overlook, and management loses a reliable view of the business.",
				'solution' => "We structured the platform around one connected transaction model. Purchases replenish inventory and establish supplier obligations; sales reduce inventory and create cash or customer balances; receipts and payments settle open positions; expenses and journals complete the ledger; and reports turn the resulting data into operational and financial insight. The POS stays fast and touch-friendly, while back-office screens carry the density inventory and finance users actually need.",
				'highlights' => [
					['title' => 'Sync-Aware POS Terminal', 'desc' => 'Barcode search, live stock, line and transaction discounts, cash, cheque and pay-later settlement, with online and pending-sync state always visible.'],
					['title' => 'Connected Transaction Model', 'desc' => 'Every posting moves stock, party balances and ledger accounts together, so a sale is never an isolated receipt.'],
					['title' => 'Receivables & Payables Control', 'desc' => 'Open customer and supplier positions with partial settlement, receipt and payment vouchers, and a full audit trail.'],
					['title' => 'Stock Ledger & Valuation', 'desc' => 'Quantity in and out, running balance, cost basis, low and negative stock exceptions, and item-level profit or loss.'],
					['title' => 'Financial Statements', 'desc' => 'Trial balance, aged trial balance, income statement and balance-sheet views generated straight from daily activity.'],
					['title' => 'Month-End & Governance', 'desc' => 'Percentage-based monthly earnings closing, role-based user rights, and backup and restore utilities for continuity.'],
				],
				'results' => [
					['value' => '22', 'label' => 'Connected Modules'],
					['value' => '30+', 'label' => 'Operational & Financial Reports'],
					['value' => '8', 'label' => 'Account Types Supported'],
				],
				'gallery' => [
					'FrontendAssets/images/projects/posev/01-program-manager-dashboard.jpg',
					'FrontendAssets/images/projects/posev/02-point-of-sale-terminal.jpg',
					'FrontendAssets/images/projects/posev/03-create-sales-invoice.jpg',
					'FrontendAssets/images/projects/posev/04-create-purchase-invoice.jpg',
					'FrontendAssets/images/projects/posev/05-receivables-receipts.jpg',
					'FrontendAssets/images/projects/posev/06-payables-payments.jpg',
					'FrontendAssets/images/projects/posev/07-inventory-item-master.jpg',
					'FrontendAssets/images/projects/posev/08-stock-ledger-valuation.jpg',
					'FrontendAssets/images/projects/posev/09-account-party-profile.jpg',
					'FrontendAssets/images/projects/posev/10-reports-month-end.jpg',
				],
			],
			[
				'slug' => 'ridebridge-multi-mode-mobility-marketplace',
				'title' => 'RideBridge — A Multi-Mode Mobility Marketplace',
				'category' => 'Mobility Marketplace',
				'accent' => '#8fc41b',
				'image' => 'FrontendAssets/images/projects/ridebridge/ridebridge-thumbnail.png',
				'short' => 'A UK mobility platform unifying shared intercity carpooling, exclusive full-car reservations, licensed private journeys, and accessibility-aware transport in one role-based ecosystem.',
				'client' => 'RideBridge — UK Mobility Platform',
				'year' => '2026',
				'timeline' => '5 Months',
				'team' => ['Product Strategy', 'UI/UX Design', 'Software Architecture'],
				'overview' => "RideBridge connects passengers with two very different kinds of supply in one marketplace: community drivers already travelling between cities who can offer spare seats on a cost-sharing basis, and licensed professional operators who respond to a custom private-ride request with a qualified offer. A passenger can book a single shared seat, reserve every remaining seat to turn a posted journey into an exclusive group trip, or request a completely bespoke licensed journey — all from one discovery layer, with trust, live safety, accessibility matching, and an immutable financial ledger designed in as core system behaviour rather than bolted on.",
				'challenge' => "Intercity travel is fragmented. Public transport can be expensive, indirect, or unsuitable for a passenger's timetable or mobility needs; ride-hail apps are built for short urban trips and become prohibitively expensive over distance; and informal carpooling lacks consistent verification, payment, support, and live-safety controls. Drivers and operators, meanwhile, need structured demand, safe booking controls, and transparent earnings — and families supporting vulnerable passengers have almost no visibility at all.",
				'solution' => "We organised the experience around three legally and operationally distinct ride modes, kept separate by role permissions, verification requirements, pricing rules, and terms — but unified behind a single discovery layer that helps a passenger choose the right mode before committing. Matching is geospatial and, critically, explainable: results surface understandable reasons such as Direct, Best value, Small detour, or Accessible match rather than a mysterious score. Role-aware passenger, community-driver, and professional-driver workflows keep every task focused.",
				'highlights' => [
					['title' => 'Three Modes, One Marketplace', 'desc' => 'Shared seats, exclusive full-car reservations, and licensed private rides — operationally separate, but discovered and booked in one flow.'],
					['title' => 'Explainable Matching', 'desc' => 'Geospatial corridor and detour matching that shows its reasoning: direct, best value, small detour, accessible match, fastest licensed arrival.'],
					['title' => 'Accessibility Passport', 'desc' => 'Travel requirements stored privately and treated as functional matching data — a result only earns an accessible label when every constraint is genuinely satisfied.'],
					['title' => 'Live Ride & Safety Centre', 'desc' => 'Journey tracking, trusted-contact sharing, emergency assistance and incident reporting, kept separate from the tracking view so neither crowds the other.'],
					['title' => 'Permissioned Caregiver View', 'desc' => 'Consent-based, time-limited journey visibility for a family contact, without exposing unrelated profile, payment, or mobility information.'],
					['title' => 'Immutable Wallet Ledger', 'desc' => 'Every movement is a typed, auditable entry — contribution, platform fee, commission, refund, payout — with idempotent processing to prevent duplicate charges.'],
				],
				'results' => [
					['value' => '3', 'label' => 'Distinct Ride Modes'],
					['value' => '30', 'label' => 'Mobile Screens Designed'],
					['value' => '6', 'label' => 'Role-Based Experiences'],
				],
				'gallery' => [
					'FrontendAssets/images/projects/ridebridge/01-passenger-discovery.jpg',
					'FrontendAssets/images/projects/ridebridge/02-journey-and-trust.jpg',
					'FrontendAssets/images/projects/ridebridge/03-booking-and-checkout.jpg',
					'FrontendAssets/images/projects/ridebridge/04-exclusive-journey.jpg',
					'FrontendAssets/images/projects/ridebridge/05-licensed-private-ride.jpg',
					'FrontendAssets/images/projects/ridebridge/06-live-ride-and-safety.jpg',
					'FrontendAssets/images/projects/ridebridge/07-accessible-mobility.jpg',
					'FrontendAssets/images/projects/ridebridge/08-driver-journey-creation.jpg',
					'FrontendAssets/images/projects/ridebridge/09-driver-operations.jpg',
					'FrontendAssets/images/projects/ridebridge/10-profile-trust-support.jpg',
				],
			],
			[
				'slug' => 'voxora-ai-autonomous-revenue-dialer',
				'title' => 'Voxora AI — Autonomous Revenue Dialer',
				'category' => 'AI Voice & Sales Automation',
				'accent' => '#2fbf8f',
				'image' => 'FrontendAssets/images/projects/voxora/voxora-thumbnail.png',
				'short' => 'An AI/ML outbound calling platform that holds natural low-latency conversations, answers from approved knowledge, qualifies real interest, and hands sales-ready leads to humans.',
				'client' => 'Voxora AI — Product Concept',
				'year' => '2026',
				'timeline' => '6 Months',
				'team' => ['Product Strategy', 'AI/ML Engineering', 'Enterprise UX'],
				'overview' => "Voxora AI automates the early outbound-sales lifecycle. A company imports or synchronises leads, builds a compliant campaign, configures an AI voice agent, attaches an approved knowledge base, and defines the qualification logic. The platform then calls eligible leads inside permitted local calling windows. The AI introduces itself per campaign policy, understands the prospect's questions, answers from approved company knowledge, handles objections, and gathers structured qualification evidence — then transfers the live call, books a meeting, or creates a priority CRM task. The result is not simply more calls; it is a controlled system for turning raw lead lists into sales-ready opportunities while keeping humans on the high-value conversations.",
				'challenge' => "Representatives spend most of their time on voicemail, wrong numbers and prospects with no current need, while buying signals get lost in unstructured notes and CRM records are updated late or not at all. Existing voice bots sound rigid, respond too slowly, break when interrupted, and cannot answer detailed questions without leaving an approved script. Uncontrolled automation also creates real legal and reputational risk when consent, do-not-call, recording, calling windows or abandonment rules are handled incorrectly.",
				'solution' => "We designed a controlled lead-to-handoff pipeline where clean lead data and a compliance preflight come before any dial. Naturalness is engineered rather than bought: streaming voice-activity detection and semantic endpointing govern turn-taking, barge-in stops output mid-sentence and reinterprets in context, and responses stream to speech as soon as a safe first fragment exists. Every extracted value keeps its transcript evidence and confidence, so low-confidence information stays unknown rather than being invented.",
				'highlights' => [
					['title' => 'Sub-second Voice Pipeline', 'desc' => 'Ten-stage streaming architecture — telephony, VAD, streaming ASR, endpointing, orchestration, streaming TTS — engineered against a first-audio budget under 700 ms.'],
					['title' => 'Natural Turn-Taking & Barge-In', 'desc' => 'Semantic endpointing avoids cutting into natural pauses; interruption halts speech instantly and resumes in context without repeating the whole answer.'],
					['title' => 'Grounded, Guarded Answers', 'desc' => 'Retrieval over approved sources only, with guardrails preventing invented capabilities, prices, guarantees or contract terms.'],
					['title' => 'Evidence-Backed Qualification', 'desc' => 'Fit, interest and qualification kept as three distinct scores, each traceable to the transcript line that produced it.'],
					['title' => 'Compliance Preflight', 'desc' => 'Consent sources, DNC suppression, local calling windows, caller identity and disclosure scripts are checked before launch; blocking issues stop the campaign.'],
					['title' => 'Complete Sales Handoff', 'desc' => 'Live transfer, CRM record, calendar booking and team notification, each carrying summary, transcript, objections, score and next action.'],
				],
				'results' => [
					['value' => '10', 'label' => 'Product Workspaces'],
					['value' => '15', 'label' => 'Backend Services Designed'],
					['value' => '<700ms', 'label' => 'First-Audio Target'],
				],
				'gallery' => [
					'FrontendAssets/images/projects/voxora/01-executive-revenue-dashboard.jpg',
					'FrontendAssets/images/projects/voxora/02-campaign-creation-workflow.jpg',
					'FrontendAssets/images/projects/voxora/03-lead-intelligence-and-segmentation.jpg',
					'FrontendAssets/images/projects/voxora/04-live-ai-call-command-centre.jpg',
					'FrontendAssets/images/projects/voxora/05-conversation-intelligence.jpg',
					'FrontendAssets/images/projects/voxora/06-ai-agent-and-knowledge-studio.jpg',
					'FrontendAssets/images/projects/voxora/07-interested-lead-sales-pipeline.jpg',
					'FrontendAssets/images/projects/voxora/08-revenue-and-conversation-analytics.jpg',
					'FrontendAssets/images/projects/voxora/09-consent-and-compliance-centre.jpg',
					'FrontendAssets/images/projects/voxora/10-integrations-and-voice-infrastructure.jpg',
				],
			],
			[
				'slug' => 'docuflow-ai-intelligent-document-automation',
				'title' => 'DocuFlow AI — Intelligent Document Automation',
				'category' => 'AI Document Processing',
				'accent' => '#5b5bd6',
				'image' => 'FrontendAssets/images/projects/docuflow/docuflow-thumbnail.png',
				'short' => 'An evidence-based AI platform that turns invoices, purchase orders, receipts and contracts into verified business workflows: extract, validate, match, approve, post.',
				'client' => 'DocuFlow AI — Product Concept',
				'year' => '2026',
				'timeline' => '6 Months',
				'team' => ['Product Strategy', 'AI/ML Engineering', 'Enterprise UX'],
				'overview' => "DocuFlow AI converts incoming business documents into verified, structured, actionable records by combining OCR, document understanding, policy validation, three-way matching, human approval, workflow automation and enterprise integration in one evidence-based workspace. It captures documents from email, uploads, APIs, scanners and cloud storage; identifies each one; extracts structured data; validates it against business rules and master data; routes exceptions to the right person; and synchronises approved records with ERP, CRM and accounting systems. Every AI decision keeps a link to its source evidence, so operators can verify, correct, approve and audit without moving between disconnected tools.",
				'challenge' => "Document-heavy processes are fragmented across shared inboxes, PDF viewers, spreadsheets, procurement systems, approval messages and archives. Manual entry consumes finance capacity, invoice and receiving discrepancies surface too late, duplicate invoices and changed payment details create fraud risk, and contract obligations go unmonitored. Automation that hides confidence and evidence is difficult to trust, and model quality quietly degrades when suppliers change their document layouts.",
				'solution' => "We built the product on a principle of evidence before automation: every extracted field, match result and risk signal links back to the exact page and region that supports it. Confidence guides how much review effort a record needs but never substitutes for policy validation, because a document can be perfectly legible and still be a duplicate with an invalid purchase order. High-confidence, policy-clean records flow through touchlessly; anything questionable reaches a human with the evidence already assembled, an owner, an SLA and a recommended action.",
				'highlights' => [
					['title' => 'Twelve-Stage Document Pipeline', 'desc' => 'Capture, duplicate screening, OCR, classification, extraction, normalisation, validation, matching, risk decision, approval, posting and archive, each traceable by one correlation ID.'],
					['title' => 'Three-Way Matching', 'desc' => 'Invoice, purchase order and goods receipt aligned line by line, with variances judged against versioned percentage-and-absolute tolerance policies.'],
					['title' => 'Evidence-Linked Extraction', 'desc' => 'Every field carries normalised value, raw text, confidence, page coordinates, model version and validation state.'],
					['title' => 'No-Code Approval Workflows', 'desc' => 'Versioned graphs of triggers, conditions, human tasks, timers, escalations and integration calls, simulated against a sample record before publication.'],
					['title' => 'Contract Intelligence', 'desc' => 'Clause classification, key dates, renewal and termination terms, and risk findings converted into monitored obligations with owners and due dates.'],
					['title' => 'MLOps Built Into the Product', 'desc' => 'Draft, evaluation, canary, active and retired processor states with benchmark datasets, drift monitoring and automatic rollback thresholds.'],
				],
				'results' => [
					['value' => '12', 'label' => 'Pipeline Stages'],
					['value' => '10', 'label' => 'Product Modules'],
					['value' => '9', 'label' => 'Operational Roles Served'],
				],
				'gallery' => [
					'FrontendAssets/images/projects/docuflow/01-document-operations-dashboard.jpg',
					'FrontendAssets/images/projects/docuflow/02-unified-document-inbox.jpg',
					'FrontendAssets/images/projects/docuflow/03-ai-invoice-processing-workspace.jpg',
					'FrontendAssets/images/projects/docuflow/04-three-way-invoice-matching.jpg',
					'FrontendAssets/images/projects/docuflow/05-ai-extraction-studio.jpg',
					'FrontendAssets/images/projects/docuflow/06-no-code-approval-workflows.jpg',
					'FrontendAssets/images/projects/docuflow/07-exception-and-anomaly-centre.jpg',
					'FrontendAssets/images/projects/docuflow/08-contract-intelligence.jpg',
					'FrontendAssets/images/projects/docuflow/09-document-intelligence-analytics.jpg',
					'FrontendAssets/images/projects/docuflow/10-integrations-and-model-operations.jpg',
				],
			],
		
		];
	}

	public function blogDetail()
	{
		return view('frontend.blog-detail');
	}

}
