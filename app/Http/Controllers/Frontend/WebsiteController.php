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
		$serviceImages = [
			'mobile-app-development' => 'FrontendAssets/img/services/mobile-app-development.png',
			'website-app-development' => 'FrontendAssets/img/services/website-app-development.png',
			'ai-ml-development' => 'FrontendAssets/img/services/ai-ml-development.png',
			'seo-content-writing' => 'FrontendAssets/img/services/seo-content-writing.png',
			'digital-marketing' => 'FrontendAssets/img/services/digital-marketing.png',
			'website-designing' => 'FrontendAssets/img/services/website-designing.png',
			'it-consulting' => 'FrontendAssets/img/services/it-consulting.png',
			'it-outsourcing' => 'FrontendAssets/img/services/it-outsourcing.png',
			'blockchain-development' => 'FrontendAssets/img/services/blockchain-development.png',
			'digital-commerce' => 'FrontendAssets/img/services/digital-commerce.png',
			'digital-transformation' => 'FrontendAssets/img/services/digital-transformation.png',
			'emerging-technologies' => 'FrontendAssets/img/services/emerging-technologies.png',
			'iot-development' => 'FrontendAssets/img/services/iot-development.png',
			'software-testing' => 'FrontendAssets/img/services/software-testing.png',
			'ui-ux-design' => 'FrontendAssets/img/services/ui-ux-design.png',
			'staff-augmentation' => 'FrontendAssets/img/services/staff-augmentation.png',
			'data-analytics' => 'FrontendAssets/img/services/data-analytics.png',
		];

		$items = [
			['mobile-app-development','MOBILE APP DEVELOPMENT','Your Next Great Idea Deserves the Attention of Our Mobile App Development Team.','We build intuitive, high-performance iOS and Android applications that turn ideas into engaging products.','Mobile App Development Company | iOS & Android Apps | Avrio Global','Custom mobile app development for iOS and Android. Avrio Global designs and builds high-performance, scalable apps that turn your idea into an engaging product.','mobile app development company, iOS app development, android app development, custom mobile apps'],
			['website-app-development','WEB APP DEVELOPMENT','Professional Web Application Development to uplift your ROI','Scalable, secure web applications designed around your workflows, customers, and growth goals.','Web Application Development Company | Avrio Global','Professional web application development services. We build scalable, secure web apps designed around your workflows, customers, and growth goals.','web app development company, custom web application development, web development services'],
			['ui-ux-design','UI/UX DESIGN','Designing user experiences that delight and convert.','We create interfaces that are intuitive, visually appealing, and aligned with your brand identity.','UI/UX Design Services | Avrio Global','UI/UX design services that delight and convert. We craft intuitive, visually compelling interfaces aligned with your brand identity.','ui ux design services, product design company, user experience design'],
			['ai-ml-development','AI/ML DEVELOPMENT SERVICES','Build robust, reliable software that meets your business needs.','From predictive models to intelligent automation, we make AI practical, measurable, and ready for production.','AI & Machine Learning Development Company | Avrio Global','AI/ML development services from predictive models to intelligent automation. We make artificial intelligence practical, measurable, and production-ready.','ai development company, machine learning development, ai ml services'],
			['staff-augmentation','STAFF AUGMENTATION','Empowering your business with expert IT outsourcing solutions.','Extend your team with dependable engineers and specialists who integrate with your process and culture.','IT Staff Augmentation Services | Avrio Global','Staff augmentation services to extend your team with dependable engineers and specialists who integrate with your process and culture.','staff augmentation services, it staff augmentation company, dedicated developers'],
			['data-analytics','DATA ANALYTICS','Turn complex data into clear, actionable business insights.','We transform raw data into meaningful dashboards, reports, and predictive insights that support smarter, faster decisions.','Data Analytics Services | Avrio Global','Data analytics services that turn complex data into meaningful dashboards, reports, and predictive insights for smarter, faster decisions.','data analytics services, business intelligence company, data analytics company'],
			['website-designing','WEBSITE DESIGNING','We merge aesthetics and creativity with business goals.','Brand-led interfaces and responsive websites that look distinctive and make every interaction easier.','Website Designing Company | Avrio Global','Website design services that merge aesthetics and creativity with business goals — brand-led, responsive websites built to convert.','website designing company, website design services, responsive web design'],
			['digital-commerce','E-COMMERCE','Revolutionize your business with seamless digital commerce experiences.','Flexible commerce platforms that simplify buying journeys, payments, inventory, and customer retention.','E-Commerce Development Company | Avrio Global','E-commerce development services with flexible commerce platforms that simplify buying journeys, payments, inventory, and customer retention.','ecommerce development company, ecommerce website development, online store development'],
			['seo-content-writing','SEO & CONTENT WRITING','Take control of the digital world with SEO-optimized content.','Research-led content and technical SEO that improve visibility, authority, and qualified organic traffic.','SEO & Content Writing Services | Avrio Global','SEO and content writing services built on research-led content and technical SEO that improve visibility, authority, and organic traffic.','seo services company, content writing services, seo and content marketing'],
			['digital-marketing','DIGITAL MARKETING','Reach your potential customers through social media and digital campaigns.','Performance marketing, social strategy, and conversion-focused campaigns that connect your brand with the right audience.','Digital Marketing Agency | Avrio Global','Digital marketing services spanning performance marketing, social strategy, and conversion-focused campaigns that reach the right audience.','digital marketing agency, digital marketing company, performance marketing services'],

			['it-outsourcing','IT OUTSOURCING','Empowering your business with expert IT outsourcing solutions.','Extend your team with dependable engineers and specialists who integrate with your process and culture.','IT Outsourcing Company | Avrio Global','IT outsourcing solutions that extend your team with dependable engineers and specialists who integrate with your process and culture.','it outsourcing company, it outsourcing services, offshore software development'],
			['blockchain-development','BLOCKCHAIN DEVELOPMENT','Revolutionizing industries through secure decentralized solutions.','Secure blockchain products, smart contracts, and decentralized platforms built for real-world value.','Blockchain Development Company | Avrio Global','Blockchain development services delivering secure blockchain products, smart contracts, and decentralized platforms built for real-world value.','blockchain development company, smart contract development, blockchain development services'],

			['digital-transformation','DIGITAL TRANSFORMATION','Empowering your business with cutting-edge transformation strategies.','Modernize operations, connect data, and create a digital foundation built for continuous improvement.','Digital Transformation Services | Avrio Global','Digital transformation services that modernize operations, connect data, and build a digital foundation for continuous improvement.','digital transformation services, digital transformation company, business modernization'],
			['emerging-technologies','EMERGING TECHNOLOGIES','Innovating with the latest technology to drive your business forward.','We evaluate and apply emerging technologies where they create useful, sustainable competitive advantage.','Emerging Technology Solutions | Avrio Global','Emerging technology consulting and development, applying new technology where it creates a real, sustainable competitive advantage.','emerging technology solutions, emerging tech development company, innovation consulting'],
			['iot-development','IOT DEVELOPMENT','Empowering your business with smart connected IoT solutions.','Connected devices, dashboards, and intelligent workflows that turn real-world data into timely action.','IoT Development Company | Avrio Global','IoT development services covering connected devices, dashboards, and intelligent workflows that turn real-world data into timely action.','iot development company, iot app development, internet of things development'],
			['software-testing','SOFTWARE TESTING','Ensuring flawless performance with comprehensive testing solutions.','Functional, automation, performance, and security testing that protects quality throughout the product lifecycle.','Software Testing & QA Services | Avrio Global','Software testing and QA services covering functional, automation, performance, and security testing throughout the product lifecycle.','software testing company, qa testing services, software testing services'],
			['it-consulting','IT CONSULTING','Unlock the power of technology to move your business forward.','Clear technology roadmaps, architecture guidance, and practical decisions that reduce risk and accelerate delivery.','IT Consulting Services | Avrio Global','IT consulting services delivering clear technology roadmaps, architecture guidance, and practical decisions that reduce risk and speed delivery.','it consulting services, it consulting company, technology consulting'],

		];
		$icons = [
			'mobile-app-development' => 'mobile-screen-button',
			'website-app-development' => 'laptop-code',
			'ui-ux-design' => 'palette',
			'ai-ml-development' => 'brain',
			'staff-augmentation' => 'people-group',
			'data-analytics' => 'chart-pie',
			'website-designing' => 'wand-magic-sparkles',
			'digital-commerce' => 'cart-shopping',
			'seo-content-writing' => 'pen-nib',
			'digital-marketing' => 'chart-line',
			'it-outsourcing' => 'people-group',
			'blockchain-development' => 'link',
			'digital-transformation' => 'arrows-rotate',
			'emerging-technologies' => 'microchip',
			'iot-development' => 'wifi',
			'software-testing' => 'shield-halved',
			'it-consulting' => 'compass-drafting',
		];
		return collect($items)->values()->map(function ($item, $index) use ($icons, $serviceImages) {
			$slug = $item[0];
			return [
				'slug' => $slug,
				'title' => $item[1],
				'short' => $item[2],
				'description' => $item[3],
				'meta_title' => $item[4] ?? ($item[1].' | '.config('seo.site_name')),
				'meta_description' => $item[5] ?? $item[3],
				'meta_keywords' => $item[6] ?? '',
				'image' => $serviceImages[$slug] ?? 'FrontendAssets/img/services/mobileapp.png',
				'og_image' => file_exists(public_path("FrontendAssets/img/og/{$slug}.jpg")) ? "FrontendAssets/img/og/{$slug}.jpg" : ($serviceImages[$slug] ?? 'FrontendAssets/img/services/mobileapp.png'),
				'number' => str_pad($index+1,2,'0',STR_PAD_LEFT),
				'icon' => $icons[$slug] ?? 'code',
			];
		})->all();
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
