-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 17, 2026 at 08:08 AM
-- Server version: 8.4.3
-- PHP Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `avrio`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_read` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `content`, `category`, `image`, `tags`, `min_read`, `visibility`, `created_at`, `updated_at`) VALUES
(2, '10 Best Taxi Clone App Ideas to Start a Taxi Business in 2026', '10-best-taxi-clone-app-ideas-to-start-a-taxi-business-in-2026', '<p>In today&rsquo;s world, booking a cab is as simple as tapping a few buttons on your smartphone. Taxi apps have gained widespread popularity in the US, offering convenient and affordable transportation options.</p>\r\n\r\n<p><strong>Market Insights:</strong></p>\r\n\r\n<p>The global taxi app market is projected to reach $283 billion by 2028, growing at a compound annual growth rate (CAGR) of 4.2% from 2023 to 2028. As the demand for taxi booking services surges worldwide, the competition within this sector has intensified. Consequently, many businesses and startups are now channeling their resources into developing taxi booking clone apps that offer distinctive ride-hailing services.</p>\r\n\r\n<p><strong>Understanding On-Demand Taxi Booking App Development:</strong></p>\r\n\r\n<p>A taxi booking clone app replicates the core functionalities of leading taxi services like Uber and Lyft. These apps are designed to provide similar user experiences, enabling features such as ride booking, driver tracking, secure payments, and feedback options.</p>\r\n\r\n<p>These clone apps streamline the process of hiring cabs by connecting passengers with nearby drivers, offering GPS tracking, and providing secure payment methods. With intuitive interfaces, users can easily request rides, choose vehicle types, and access driver ratings for a personalized experience.</p>\r\n\r\n<p>Developing a taxi booking clone app offers significant benefits for businesses by expanding their customer base, enhancing service efficiency, and maintaining a competitive edge in the transportation industry.</p>\r\n\r\n<p><strong>Why Invest in Taxi App Clone Development:</strong></p>\r\n\r\n<p>The competition in the ride-hailing industry, especially in the USA, is continuously intensifying, with established players leading the charge. For new cab startups, selecting the right taxi clone app to develop can be challenging. To help you make an informed decision, we&rsquo;ve compiled a list of the top 10 taxi clone apps along with unique features, allowing you to offer superior services to your customers or even inspire you to launch your own taxi booking clone app.</p>\r\n\r\n<p><strong>Top 10 Taxi Booking Clone App Ideas for Startups in 2024:</strong></p>\r\n\r\n<ol>\r\n	<li><strong>Uber:</strong>&nbsp;Founded in 2009, Uber is the most successful taxi app to clone. It generated $37.2 billion in revenue in 2023, with features like trip sharing, scheduled rides, and fare splitting.</li>\r\n	<li><strong>Lyft:</strong>&nbsp;Established in 2012, Lyft is known for its regular and premium ride options. The app generated $4 billion in revenue in 2022, with an average revenue per rider of $57.72.</li>\r\n	<li><strong>Wingz:</strong>&nbsp;This app, founded in 2011, allows users to see fare prices upfront and personalize their driver list.</li>\r\n	<li><strong>Curb:</strong>&nbsp;Curb, which evolved from TaxiTronic, offers immediate ride requests and the ability to schedule rides up to 48 hours in advance.</li>\r\n	<li><strong>Gett:</strong>&nbsp;A B2B platform that organizes corporate fleets and ride-hailing services, Gett offers spacious and wheelchair-accessible black cabs.</li>\r\n	<li><strong>Via:</strong>&nbsp;Via&rsquo;s ride-sharing services are known for their affordability, with rides priced similarly to public transit fares.</li>\r\n	<li><strong>Bolt:</strong>&nbsp;Originally launched as Taxify in 2013, Bolt has grown to serve over 25 million customers across 100 cities.</li>\r\n	<li><strong>Ride Austin:</strong>&nbsp;A popular ride-share app in Austin, Texas, known for its user-friendly interface and affordable fares.</li>\r\n	<li><strong>Flywheel:</strong>&nbsp;This app is known for its simplicity, allowing users to hail cabs with just two taps and pay via the app.</li>\r\n	<li><strong>Blacklane:</strong>&nbsp;Recognized for its high-end service, Blacklane allows users to book drivers by the hour, with flexible cancellation options.</li>\r\n</ol>\r\n\r\n<p><strong>Essential Features for a Taxi Booking App:</strong></p>\r\n\r\n<p>When developing a taxi booking app, ensure it includes these key features:</p>\r\n\r\n<ul>\r\n	<li><strong>For Passengers:</strong></li>\r\n	<li>User-friendly interface for easy ride booking</li>\r\n	<li>Real-time GPS tracking</li>\r\n	<li>Multiple payment options</li>\r\n	<li>Rating and review system</li>\r\n	<li>Push notifications</li>\r\n	<li><strong>For Drivers:</strong></li>\r\n	<li>Comprehensive dashboard</li>\r\n	<li>Integrated navigation</li>\r\n	<li>Availability settings</li>\r\n	<li>Earnings report</li>\r\n	<li>In-app communication</li>\r\n</ul>\r\n\r\n<p><strong>The Future of Taxi Booking Apps in the USA:</strong></p>\r\n\r\n<p>The future of taxi booking apps in the USA looks bright, driven by advancements in technology and increasing demand for convenient and eco-friendly transportation options. With the global market expected to reach $283 billion by 2028, there&rsquo;s never been a better time to invest in or develop a taxi booking app.</p>\r\n\r\n<p><strong>Conclusion:</strong></p>\r\n\r\n<p>This overview of the top taxi booking clone apps in the USA provides insights into the best options for starting your ride-hailing service. With innovation at the forefront, now is the perfect time to collaborate with a leading taxi app development company like AvrioGlobal to create a reliable and secure taxi booking app. Whether you&rsquo;re launching a new venture or scaling an existing business, the opportunities in this market are immense.</p>\r\n\r\n<p><strong>Build Your Taxi Booking App with AvrioGlobal:</strong></p>\r\n\r\n<p>AvrioGlobal Technology is a premier taxi booking app development company, with a proven track record of delivering high-quality software solutions. With over 2000 completed projects, our team is ready to help you launch a successful taxi booking app in the USA. Contact us today to hire dedicated developers and start your journey in the ride-hailing industry.</p>\r\n\r\n<p><strong>FAQs:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>How much does it cost to develop a taxi booking app in the USA?</strong></li>\r\n	<li>Costs range from $10,000 to over $50,000, depending on the app&rsquo;s complexity.</li>\r\n	<li><strong>How long does it take to build a ride-sharing app?</strong></li>\r\n	<li>Development time can range from 3-7 months for a basic app to over a year for a complex one.</li>\r\n</ul>', 'Mobile App', 'uploads/upfreaFzFg7apdBBE2N5rgNmixCELYn3YXSngDYI.webp', 'app, Business, Development, Startup', '10 min read', 1, '2026-08-07 06:58:58', '2026-08-07 07:00:10'),
(3, 'How To Hire Dedicated Developers for Startups: A Step-by-Step Guide (2026)', 'how-to-hire-dedicated-developers-for-startups-a-step-by-step-guide-2026', '<p>Developing a website or mobile app from scratch is both exciting and at the same time challenging also. Even with a fantastic idea, business success depends on finding the right team.</p>\r\n\r\n<p>The key to the success of a project lies in hiring dedicated developers. But the question is how to hire developers for a startup? Well, many innovators and industry leaders in the USA have opted to hire developers for startups as they bring specific expertise and work exclusively on your project. And why not? After all, it allows them to focus on developing custom solutions tailored to your business requirements.</p>\r\n\r\n<p>However, finding and hiring developers for a startup or small business is not a simple task. Therefore, as a leading mobile and web app development company in the USA, we have prepared this comprehensive post, where we will explain how to hire developers for a startup, what to consider, and how hiring these developers can be beneficial for your startup.</p>\r\n\r\n<p>Let&rsquo;s begin by understanding more about dedicated developers.</p>\r\n\r\n<h3>Who are Dedicated Developers?</h3>\r\n\r\n<p>Dedicated developers are specialized professionals who are hired to work on specific projects for a client. These experts, often sourced through IT firms, focus solely on the client&rsquo;s tasks, ensuring high-quality and efficient results.</p>\r\n\r\n<p>Hiring a developer for a startup allows businesses to access top-tier talent, maintain better project control, and achieve faster time-to-market. They are ideal for long-term projects, bringing deep expertise, commitment, and the flexibility to adapt to the unique needs of the client, ultimately driving successful and innovative outcomes.</p>\r\n\r\n<h3>Dedicated Developers: Exciting Facts and Statistics</h3>\r\n\r\n<p>As per the report of Statista:</p>\r\n\r\n<ul>\r\n	<li>The global developer population is expected to reach 28.7 million people by 2024, an increase of 3.2 million from the number seen in 2020.</li>\r\n</ul>\r\n\r\n<p>As per another report:</p>\r\n\r\n<ul>\r\n	<li>The developer population leans young, with the largest portion (33%) falling between 25 and 34 years old.</li>\r\n	<li>A significant number of developers are also young adults aged 18-24 (27%), making up nearly a third of the workforce. The presence of developers below 18 is encouraging, while those aged 45-54 account for roughly 11%.</li>\r\n</ul>\r\n\r\n<h3>When Should Startups and Small Businesses Hire Dedicated Developers?</h3>\r\n\r\n<p>Before we look into the process of how to hire a developer for a startup, it is essential to understand when you actually need them. Being aware of the right time and reasons to hire can save you time and contribute to the success of your projects.</p>\r\n\r\n<p>Let&rsquo;s look at instances when it makes sense to hire developers for startups:</p>\r\n\r\n<ol>\r\n	<li><strong>You Work on Long-Term Projects</strong>&nbsp;Hiring a developer for a startup makes sense when you are working on a lengthy project, such as building an e-commerce platform that will take 18 months. A team of dedicated developers can provide a stable resource, allowing you to manage your budget with fixed monthly costs.</li>\r\n	<li><strong>There is Unclear Project Scope</strong>&nbsp;If you are launching a startup and anticipate that your product will change based on user feedback, then a dedicated team can easily adapt to these changes, ensuring that your project remains on track.</li>\r\n	<li><strong>Your In-house Team is Overburdened</strong>&nbsp;If your existing team is already occupied with other projects and a significant new project emerges from a major client, dedicated developers can take on this new project and make sure that it is completed on time without burdening your existing team.</li>\r\n	<li><strong>Looking For Scalability</strong>&nbsp;When a new project requires additional developers in a short span of time, hiring developers for a startup allows you to swiftly expand your team to meet the requirements of a project.</li>\r\n	<li><strong>Want to Utilize Agile Development Approach</strong>&nbsp;If you are shifting to the Agile framework for improved project management, then hiring dedicated developers, known for their flexibility and incremental approach, is well-suited for this methodology.</li>\r\n	<li><strong>You Have a Limited Budget</strong>&nbsp;Despite budget constraints, impending deadlines must be met. Having a set price with dedicated developers facilitates better financial planning without compromising on quality.</li>\r\n</ol>\r\n\r\n<h3>Hire Dedicated Developers for Startups &ndash; A Quick and Simple Process</h3>\r\n\r\n<p>Startups and small businesses often require skilled developers to build and scale their products quickly and efficiently.</p>\r\n\r\n<p>Hiring dedicated developers can provide numerous advantages, so your search for how to hire a developer for a startup ends here. Below, we have shared some proven and effective tips for hiring a software developer at a startup:</p>\r\n\r\n<ol>\r\n	<li><strong>Clearly Describe Your Project Requirements</strong>&nbsp;It is important to clearly define the skills and expertise you need before hiring developers for a startup. Specify the required technologies and programming languages for your project and focus on the roles and responsibilities of the developers. Remember, a well-defined job description can help you find suitable candidates.</li>\r\n	<li><strong>Select The Right Hiring Model</strong>&nbsp;Choosing a hiring model that suits your startup&rsquo;s needs is essential when you look for how to hire software developers for a startup. Some of the options include hiring full-time, part-time, or freelance developers. Consider remote developers to access a global talent pool. Evaluate the pros and cons of each model to determine the best fit for your project timeline and budget. Moreover, choosing the right contract method or engagement model is necessary for businesses that are looking to develop a solution. Currently, there are three models, so if you are interested to know about these models, then check out our comprehensive post on the right fit: fixed price, time and materials, or dedicated team.</li>\r\n	<li><strong>Search and Utilize the Best Online Platforms</strong>&nbsp;To find and connect with potential developers, it is important to use online platforms like LinkedIn, Upwork, and GitHub. These platforms allow you to view portfolios and client reviews, which helps you make better hiring decisions. Participating in developer communities and forums can also yield valuable connections.</li>\r\n	<li><strong>Conduct Thorough Interview and Screening</strong>&nbsp;Focus on developing a comprehensive interview process that includes technical assessments and problem-solving task evaluations when you hire a developer for a startup. This ensures that the developers not only have the required skills but also align with the values and work culture of your business or startup. Use tools like coding tests and pair programming sessions to evaluate their technical proficiency.</li>\r\n	<li><strong>Check Past Work and References</strong>&nbsp;It is important to check the references and past projects when you hire developers for startups. Contact previous employers or clients to verify the developer&rsquo;s reliability and performance. Examining their portfolio can give you insights into their coding style, problem-solving abilities, and experience with similar projects.</li>\r\n	<li><strong>Set Clear Communication Channels</strong>&nbsp;Establish effective communication channels and tools to facilitate seamless collaboration when you opt to hire a developer for a startup. Regular updates, progress meetings, and feedback loops are essential to ensure that the project stays on track. Tools like Trello and Zoom can help maintain clear and consistent communication.</li>\r\n	<li><strong>Provide Competitive Benefits and Compensation</strong>&nbsp;Hire developers for a startup by offering competitive compensation packages and benefits. Understand the market rates for developers with your required skill set and offer a package that reflects their expertise and value to your project. Additional benefits like flexible working hours and a positive work environment can also make your offer more attractive.</li>\r\n</ol>\r\n\r\n<h3>Key Benefits of Hiring Software Developers For Startups and Enterprises</h3>\r\n\r\n<p>There are several benefits to hiring software developers for startups and small businesses. Below we have highlighted some of the most important ones:</p>\r\n\r\n<ol>\r\n	<li><strong>Availability of Huge Tech Talent</strong>&nbsp;When you are hiring software developers for a startup as an outsourced team, you are no longer limited to the local pool of talent, which can be quite limited. Instead, you&rsquo;ll have the luxury of choosing the best IT developers from around the globe. For example, a country like Pakistan has a large pool of talented developers to choose from. Outsourcing not only brings you the best talents but also spares you from the long-term commitment of a permanent hire. With the risks faced by an early-stage startup, it&rsquo;s reasonable to hire developers on a project basis.</li>\r\n	<li><strong>Quick and Fast Recruitment</strong>&nbsp;Hiring for full-time positions requires more consideration than deciding to hire remote developers for a startup. With the former, you&rsquo;ll need to consider if the candidate has both the hard and soft skills to fit in the startup for years to come. However, outsourcing to a remote developer is much simpler. All you need to consider is whether the particular developer has the required skill set to take on the current project. You don&rsquo;t have to worry about whether he/she will fit into the company&rsquo;s long-term plan.</li>\r\n	<li><strong>Flexibility and Transparency</strong>&nbsp;In order to create a functional software solution, expertise in various areas is required. For instance, you&rsquo;ll need an Android and iOS developer for building a native mobile app, as well as a backend developer for the backend software. Through remote outsourcing, you can select developers with the necessary skills to complete the job. There is no need to worry about long-term financial commitment, as the contract is only for the project. Moreover, you can bring in more developers when the workload increases.</li>\r\n	<li><strong>Cost Efficiency</strong>&nbsp;Being economical is crucial for a startup owner. You&rsquo;ll want to ensure that every expense counts, and outsourcing IT development helps in this regard. Unlike with full-time hires, you are not obligated to pay fixed salaries, allowances, equipment, software, and training. Outsourcing is also cost-effective, especially if you are based in a country like the US or UK. Hiring local IT experts can be expensive compared to outsourcing to developers in other countries. For instance, you can hire developers in Pakistan for $18 to $40. If you want to know about the advantages, structure, and cost of employing a dedicated team, check out this exciting post on hiring a dedicated development team: benefits, challenges &amp; cost.</li>\r\n</ol>', 'IT Industry', 'uploads/iDibcXFJsQ0MIdRWwlplycCpphq5YO5EjtAgxCrL.jpg', 'Business', '15 min read', 1, '2026-08-07 07:02:46', '2026-08-07 07:13:00'),
(4, '50+ Software Development Statistics Market Trends and Insights', '50-software-development-statistics-market-trends-and-insights', '<p>Businesses that are prospecting on building software often face difficulties due to a lack of data. While finding a reliable software development company can help them achieve their goal, having a data-driven insight into the industry can be useful. Currently, Software development is one of the leading economic drivers in the global marketplace.&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>Most businesses are&nbsp;<a href=\"https://www.vrinsofts.com/hire-software-developers.html\">hiring software developers</a>&nbsp;to streamline their workflow and simplify the process. However, there are many factors that affect software development, and businesses should understand how they can effectively navigate this issue. In this post, we have provided the latest statistics, insights, and market trends for software development.&nbsp;&nbsp;</p>\r\n\r\n<p>Our goal is to offer an ample amount of data for brands to make the right choice. Which technology is more popular in the market, what are the costs of developing software, which region has the top talent, or how can outsourcing take the burden of making choices? Statistics can answer many questions, which allows you to leverage this information to choose the right software development partner.</p>\r\n\r\n<h2>Software Development Statistics 2024</h2>\r\n\r\n<p>To understand the scale of software development needs and benefits,&nbsp;let&rsquo;s&nbsp;go through some of the important statistics. We have added benchmarks and developers&rsquo; statistics, which can help you choose the right software development company and streamline the process at your business.</p>\r\n\r\n<h3>Global Software Development Market Overview</h3>\r\n\r\n<p>We are seeing an exponential rise in software development worldwide. From e-commerce to healthcare and manufacturing, companies have developed custom software for their needs. Here are some of the statistics to give you an overview of the demand for software development,&nbsp;&nbsp;</p>\r\n\r\n<p><strong>1.</strong>&nbsp;The global software market is expected to reach $1605.89 billion by the end of 2024, growing steadily with the increased adoption of digital transformation across industries. (8)</p>\r\n\r\n<p><strong>2.</strong>&nbsp;Global spending on software development is projected to grow by 11.3% in 2024 as organizations continue to invest heavily in custom software solutions to meet unique business needs. (1)</p>\r\n\r\n<p><strong>3.</strong>&nbsp;Enterprise software spending is forecasted to surpass $850 billion in 2024, driven by investments in CRM, ERP, and cloud applications. (2)</p>\r\n\r\n<p><strong>4.</strong>&nbsp;The global AI-driven software market is anticipated to grow at a CAGR of 40% between 2023 and 2028, reaching a market size of $126 billion by 2028. (2)</p>\r\n\r\n<p><strong>5.</strong>&nbsp;The global cloud software market is expected to exceed $700 billion by 2025, with businesses increasingly moving their operations to cloud-based platforms. (2)</p>\r\n\r\n<p><strong>6.</strong>&nbsp;Mobile apps are also considered as part of software. According to the latest statistics on&nbsp;<a href=\"https://www.vrinsofts.com/mobile-app-development.html\">mobile app development</a>, The global mobile app development market reached a value of USD 206.85 billion in 2022. It is expected to grow at an annual rate of 12.1% from 2024 to 2032, reaching USD 666.1 billion.</p>\r\n\r\n<p><strong>7.</strong>&nbsp;DevOps adoption is expected to increase by 18% in 2024, with more companies integrating DevOps practices to enhance their software delivery and operational efficiency. (2)</p>\r\n\r\n<p><strong>8.</strong>&nbsp;Global spending on software security is forecasted to grow by 14.5% in 2024, reflecting the rising importance of secure software development practices. (2)</p>\r\n\r\n<p><strong>9.</strong>&nbsp;The Asia-Pacific region is expected to see a growth rate of 21.5% in software development spending by 2024, driven by the expansion of digital economies in countries like China and India. (2)</p>\r\n\r\n<p><strong>10.</strong>&nbsp;The market for low-code development platforms is set to grow at a CAGR of 27.9% through 2024 as businesses seek to accelerate application development with minimal coding. (3)</p>\r\n\r\n<h3>Software Developer Statistics by Demographics&nbsp;&nbsp;</h3>\r\n\r\n<p>Learning about software developers statistics can help businesses identify the demographics and regions where the top 1% of developers reside. This will help with recruiting the right talent pools when hiring software developers. Also, the average age of software developers and their salary range can help businesses make data-driven decisions when hiring software development agencies.</p>\r\n\r\n<p><strong>11.</strong>&nbsp;Women make up about 25.1% of the software engineering workforce in the US, with men holding the majority of positions in the field. (4)</p>\r\n\r\n<p><strong>12.</strong>&nbsp;The global average age of employed software developers is between 25 and 34 years old. Developers aged 18-24 make up 25.47%, while those between 35-44 years old account for 18.42%. Only 6.64% are aged 45-54, and less than 1% are over 65. (5)</p>\r\n\r\n<p><strong>13.</strong>&nbsp;In the U.S., White developers constitute 52.3% of the workforce, followed by Asian developers, who represent up to 33%. Black and Hispanic developers make up smaller portions of the industry. (4)</p>\r\n\r\n<p><strong>14.</strong>&nbsp;A significant portion of developers hold a bachelor&rsquo;s degree, with many others having completed boot camps or other specialized training programs. The rise of alternative education paths continues to diversify the educational background of software developers globally. (5)</p>\r\n\r\n<p><strong>15.</strong>&nbsp;A large segment of the software development workforce has under ten years of experience, reflecting the relatively young age of the profession. The demand for upskilling and continuous learning is high to keep up with technological advancements. (5)</p>\r\n\r\n<p><strong>16.</strong>&nbsp;The US and India are home to the largest populations of software developers, accounting for 18.33% and 12.61% of the global developer workforce, respectively. Other significant contributors include Germany and the UK. (5)</p>\r\n\r\n<p><strong>17.</strong>&nbsp;The pandemic has accelerated the trend of remote work, with a majority of software developers now working remotely either full-time or part-time. This shift has opened up opportunities for developers across different regions, promoting a more global workforce. (5)</p>\r\n\r\n<p><strong>18.</strong>&nbsp;On average, women in software engineering roles earn about 93 cents for every dollar earned by their male counterparts. This gender pay gap, while narrower than in some other fields, still persists. (4)</p>\r\n\r\n<p><strong>19.</strong>&nbsp;Women hold around 20% of senior software engineering positions, indicating a continuing challenge in achieving gender balance at higher levels of the profession. (4)</p>\r\n\r\n<p><strong>20.</strong>&nbsp;Only one in four software engineers are women, and the percentage of women pursuing computer science degrees has declined recently. Despite growth opportunities, this trend may affect gender diversity in the field moving forward. (4)</p>\r\n\r\n<h3>Most Used Software Development Programming Languages in 2024</h3>\r\n\r\n<p>While this is a bit technical, this information may help you in the future. Learning about software development statistics in programming language helps the clients understand the availability and feasibility of the project development cost. Also, Popular languages often have larger talent pools, which can impact project timelines and budgets. Here are the top programming languages of 2024 for software development,</p>\r\n\r\n<p><strong>21.</strong>&nbsp;JavaScript is the most commonly used language for web development, maintaining a 62.2% market share in 2024. (6)</p>\r\n\r\n<p><strong>22.</strong>&nbsp;HTML/CSS is the second most popular programming language in 2024, holding a 52.9% market share. (6)</p>\r\n\r\n<p><strong>23.</strong>&nbsp;Python is ranked third in popularity, with a 51% market share, as it is one of the oldest programming languages in usage. (6)</p>\r\n\r\n<p><strong>24.</strong>&nbsp;SQL continues to be a top choice for high-performance applications, holding a 51% market share in 2024. (6)</p>\r\n\r\n<p><strong>25.</strong>&nbsp;Typescript ranks fifth with a 38.5% market share. (6)</p>\r\n\r\n<h3>Top Software Development Tools Used in 2024</h3>\r\n\r\n<p>By staying updated on the best software development tools, potential clients can make better decisions, improve project results, and choose the right software development partners to bring their ideas to life. Understanding popular tools can help clients avoid vendor lock-in and ensure flexibility. Here are some of the popular software development tools in 2024,</p>\r\n\r\n<p><strong>26.</strong>&nbsp;As of 2024, GitHub continues to be the most widely used code repository platform, with over 100 million developers worldwide actively using it for version control and collaborative software development. This platform&rsquo;s popularity is boosted by its seamless integration with various CI/CD tools. (8)</p>\r\n\r\n<p><strong>27.</strong>&nbsp;77% of Agile teams globally rely on Jira for project management and issue tracking, particularly in larger organizations where detailed sprint planning and backlog management are critical. (9)</p>\r\n\r\n<p><strong>28.</strong>&nbsp;In 2024, Visual Studio Code remains the most popular text editor, used by 60% of developers due to its rich ecosystem of extensions, ease of customization, and strong support for multiple programming languages. (10)</p>\r\n\r\n<p><strong>29.</strong>&nbsp;Docker&rsquo;s containerization platform is utilized by 70% of software developers to streamline the development and deployment of applications, ensuring consistency across different environments. (11)</p>\r\n\r\n<p><strong>30.</strong>&nbsp;As a cloud-based development environment, AWS Cloud9 is employed by 40% of cloud-native development teams, enabling collaborative real-time coding, debugging, and serverless application development. (12)</p>\r\n\r\n<h3>Software Developer Productivity and Tools Statistics&nbsp;&nbsp;</h3>\r\n\r\n<p>To understand the software development performance benchmarking, go with a software development company that utilizes these tools. It will help developers collaborate and streamline the development process, which can reduce the timeline and cost-effectively. Here are some of the productivity tools for software development in 2024.</p>\r\n\r\n<p><strong>31.</strong>&nbsp;The adoption of Continuous Integration and Continuous Delivery (CI/CD) tools like Jenkins and GitLab has risen significantly, with 77% of organizations now using these tools to streamline development and deployment processes, leading to faster release cycles and improved team productivity. (13)</p>\r\n\r\n<p><strong>32.</strong>&nbsp;Slack remains a leading tool for developer collaboration, integrated with over 2,200 apps, including GitHub and Jira, which has led to a 30% increase in team productivity by reducing the need for context switching. (14)</p>\r\n\r\n<p><strong>33.</strong>&nbsp;Integrated Development Environments (IDEs) like Visual Studio Code and JetBrains have seen a 20% increase in usage due to features like in-IDE code review and real-time collaboration, helping developers reduce time spent on context switching. (13)</p>\r\n\r\n<p><strong>34.</strong>&nbsp;Tools like Salt, which automate configuration management and orchestrate complex SaaS infrastructures, have contributed to a 40% increase in efficiency for managing large-scale systems with thousands of servers. (14)</p>\r\n\r\n<p><strong>35.</strong>&nbsp;Postman, widely used for API development, has contributed to a 35% reduction in debugging time for developers by streamlining API testing and documentation. (14)</p>\r\n\r\n<h3>Software Development Lifecycle Statistics 2024&nbsp;</h3>\r\n\r\n<p>These are some of the most important software development statistics for businesses that want to develop one. By learning about defect detection and the cost, they can plan early and mitigate the risk. This will effectively reduce the development cost of software and prevent delays and additional expenses. With these statistics, they can plan ahead and go with a software development company that puts emphasis on quality assurance and testing.</p>\r\n\r\n<p><strong>36.</strong>&nbsp;56% of defects in software development are introduced during the requirements and design stages, highlighting the importance of thorough planning and early-stage testing within the SDLC. (15)</p>\r\n\r\n<p><strong>37.</strong>&nbsp;Fixing defects detected in the design phase is ten times cheaper than fixing them during the implementation phase and 100 times cheaper than fixing them after the product release. (15)</p>\r\n\r\n<p><strong>38.</strong>&nbsp;80% of software development teams implement agile methodologies as part of their SDLC, integrating continuous testing and development to streamline the process. (15)</p>\r\n\r\n<p><strong>39.</strong>&nbsp;Only 60% of projects strictly follow all SDLC phases, which can lead to inefficiencies and potential pitfalls in software development. (15)</p>\r\n\r\n<p><strong>40.</strong>&nbsp;22% of software projects fail due to poorly defined requirements during the Requirement Analysis phase, underscoring the critical need for clear and precise initial planning. (15)</p>\r\n\r\n<h3>Custom Software Development vs. Off-the-Shelf Solutions Statistics</h3>\r\n\r\n<p>Most startups and small businesses choose to go with readymade software because it&rsquo;s a cheaper alternative. However, investing in custom software development can help your business scale with only one time of investment. Here are some of the states which help you decide which one to go for,</p>\r\n\r\n<p><strong>41.</strong>&nbsp;Businesses that invest in custom software development experience up to 29% higher returns over five years compared to those using off-the-shelf solutions due to tailored features that better meet specific needs. (16)</p>\r\n\r\n<p><strong>42.</strong>&nbsp;89% of companies using custom software report higher satisfaction with customization options, as the software can adapt precisely to their workflows, unlike off-the-shelf software, which often forces compromises. (16)</p>\r\n\r\n<p><strong>43.</strong>&nbsp;While custom software has higher upfront costs, 63% of businesses find that they save significantly on licensing fees and updates over time, unlike off-the-shelf solutions, which often require ongoing subscription fees. (16)</p>\r\n\r\n<p><strong>44.</strong>&nbsp;78% of businesses using custom software report better scalability and easier adaptation to growing needs, as custom solutions can be expanded and modified as the business evolves. (16)</p>\r\n\r\n<p><strong>45.</strong>&nbsp;74% of companies prefer custom software for its enhanced security features, as it can be tailored to meet specific regulatory compliance requirements, reducing vulnerability to breaches compared to generic off-the-shelf software. (16)</p>\r\n\r\n<h3>Key Software Development Skills and Qualifications Sought by Employers</h3>\r\n\r\n<p>To help you make the right decision when you start to look for software developers, here are some of the most important skills everyone looks for. As technology advances, most software developers have basic skills, but they also need to have advanced skills. It will help your business with security and streamline the workflow with the latest technology.</p>\r\n\r\n<p><strong>46.</strong>&nbsp;In 2024, 80% of organizations prioritize cybersecurity skills in their software development teams due to increasing threats and the need for robust security measures. (17)</p>\r\n\r\n<p><strong>47.</strong>&nbsp;72% of employers are focusing on cloud computing skills, specifically in platforms like AWS, Azure, and Google Cloud, as businesses continue to migrate to cloud-based infrastructures. (17)</p>\r\n\r\n<p><strong>48.</strong>&nbsp;67% of companies seek developers with strong data management and analysis capabilities, which is crucial for leveraging big data to inform business decisions. (18)</p>\r\n\r\n<p><strong>49.</strong>&nbsp;55% of businesses are planning to increase their RPA workforce in 2024, reflecting the growing reliance on automation technologies to improve operational efficiency. (19)</p>\r\n\r\n<p><strong>50.</strong>&nbsp;60% of employers emphasize the importance of communication and collaboration skills for developers, recognizing the need for effective teamwork and stakeholder engagement. (19)</p>\r\n\r\n<h3>Time and Cost of Software Development 2024</h3>\r\n\r\n<p>It&rsquo;s important for potential clients to understand the time and cost involved in software development so they can budget accurately and allocate resources wisely. Providing statistics on average development times for different project complexities can help clients plan their timelines effectively. Additionally, sharing data on cost breakdowns, including factors such as team size, technology stack, and project scope, can help clients build realistic budgets.</p>\r\n\r\n<p><strong>51.</strong>&nbsp;The average time to develop custom software typically ranges from 4 to 12 months. This varies based on project complexity, team size, and other factors. (20)</p>\r\n\r\n<p><strong>52.</strong>&nbsp;The cost of developing software can vary widely. Simple applications may cost between $3,000 to $20,000, while complex enterprise solutions can exceed $150,000. (21)</p>\r\n\r\n<p><strong>53.</strong>&nbsp;Companies allocate approximately 63% of their software development budgets to design and new development efforts. Maintenance typically consumes around 15-20% of the total development cost. (22)</p>\r\n\r\n<p><strong>54.</strong>&nbsp;Developing a Customer Relationship Management (CRM) system costs about $100,000, while e-commerce platforms can range from $50,000 to hundreds of thousands, depending on complexity. (22)</p>\r\n\r\n<p><strong>55.</strong>&nbsp;Projects using Agile methodologies are typically 20% faster than those using traditional Waterfall models. Agile methods also contribute to a 64% success rate in projects compared to 49% for Waterfall. (20)</p>\r\n\r\n<p><strong>56.</strong>&nbsp;QA and testing processes make up about 26% of software development budgets. Around 56% of software defects are identified during the design stage, which highlights the importance of thorough testing early in the process. (20)</p>\r\n\r\n<p><strong>57.</strong>&nbsp;Approximately 24% of businesses globally outsource their software development. This outsourcing is often driven by the need for cost savings and access to specialized skills. (21)</p>\r\n\r\n<p><strong>58.</strong>&nbsp;On average, software developers in the US have a median hourly wage of $59.71. However, costs can vary significantly based on location, expertise, and project scope. (22)</p>\r\n\r\n<p><strong>59.</strong>&nbsp;About 22% of software projects fail due to poorly defined requirements. Additionally, the choice of the wrong programming language or toolset contributes to 34% of project failures. (20)</p>\r\n\r\n<p><strong>60.</strong>&nbsp;JavaScript remains the most widely used programming language, with over 63.6% of developers globally utilizing it. Python is also highly popular, especially in startups, where 72% use it for data science and web development. (20)</p>\r\n\r\n<h3>Software Development Industry Trends Statistics</h3>\r\n\r\n<p>Keeping up with trends in the software development industry is crucial for clients to make well-informed decisions and stay ahead.&nbsp;It&rsquo;s&nbsp;important to understand the fast pace of technological advancements, such as the increasing use of AI and cloud computing. By keeping an eye on emerging technologies and their potential impact on business operations, clients can&nbsp;identify&nbsp;opportunities for innovation and competitive advantage.</p>\r\n\r\n<p><strong>Healthcare</strong></p>\r\n\r\n<p><strong>61.</strong>&nbsp;Remote Patient Monitoring: 65% of healthcare organizations have invested in or plan to invest in remote patient monitoring software by the end of 2024. This market is expected to grow at a CAGR of 14.1% from 2023 to 2028. (23)</p>\r\n\r\n<p><strong>62.</strong>&nbsp;Interoperability Solutions: 80% of healthcare providers are focusing on interoperability to integrate various health information systems, with a projected increase in interoperability-related software spending by 22% in 2024. (24)</p>\r\n\r\n<p><strong>Finance</strong></p>\r\n\r\n<p><strong>63.</strong>&nbsp;AI-Powered Risk Management: 55% of financial institutions are using AI for risk management, with AI in finance projected to grow from $7.9 billion in 2023 to $16.7 billion by 2027. (25)</p>\r\n\r\n<p><strong>64.</strong>&nbsp;Blockchain for Secure Transactions: The adoption of blockchain technology in finance is growing, with 30% of financial firms expected to implement blockchain-based software by 2024. (26)</p>\r\n\r\n<p><strong>Manufacturing</strong></p>\r\n\r\n<p><strong>65.</strong>&nbsp;Automation and Robotics: The global market for manufacturing software related to automation and robotics is expected to reach $6.2 billion by 2024, with 45% of manufacturers planning to increase their investment in these technologies. (27)</p>\r\n\r\n<p><strong>66.</strong>&nbsp;Hyper-Personalization: 53% of manufacturing firms are investing in hyper-personalization software, driven by a need to improve customer engagement. (28)</p>\r\n\r\n<p><strong>Retail</strong></p>\r\n\r\n<p><strong>67.</strong>&nbsp;E-commerce Platforms: 62% of retailers have prioritized the development of AI-driven e-commerce platforms, with e-commerce software expected to generate revenues of $4.9 trillion globally by 2024. (29)</p>\r\n\r\n<p><strong>68.</strong>&nbsp;Supply Chain Management: 48% of retail companies are investing in supply chain management software, with the market projected to grow by 11.3% CAGR over the next five years. (30)</p>\r\n\r\n<p><strong>Education</strong></p>\r\n\r\n<p><strong>69.</strong>&nbsp;<a href=\"https://www.vrinsofts.com/e-learning-app-development.html\">E-learning Platforms</a>: 74% of educational institutions are utilizing or planning to implement AI-driven e-learning platforms by 2024, with the e-learning market expected to be valued at $325 billion by 2025. (31)</p>\r\n\r\n<p><strong>70.</strong>&nbsp;Student Data Analytics: 67% of educators are adopting student data analytics software, aiming to improve personalized learning and student outcomes. (32)</p>\r\n\r\n<h2>Conclusion&nbsp;&nbsp;</h2>\r\n\r\n<p>The quote number doesn&rsquo;t explicitly apply to software development statistics. Most businesses often choose a development company based on their reputation and number of projects; however, when we dig deeper, we find more issues with them. Our goal here is to inform brands about the demand for software, which technology is the best suited, and where to hire the best software developers for your project.&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>In this blog, we have added statistics on a wide range of subjects, but all of them have a universal theme. All of these software development statistics can help brands make the right decision when they choose to develop software. As a leading&nbsp;<a href=\"https://www.vrinsofts.com/software-development.html\">software development company</a>, we have often seen clients trusting misinformation on how development works and what they should expect from the team. While we offer complete transparency and collaboration, most companies don&rsquo;t follow this approach. From software demands to software engineers&rsquo; qualifications, we have added all the necessary and important software development statistics for 2024.</p>\r\n\r\n<h2>Why Choose&nbsp;Vrinsoft&nbsp;for Software Development?&nbsp;&nbsp;</h2>\r\n\r\n<p>With over a decade of experience in this field, we have a proven&nbsp;track record&nbsp;of offering full life cycle software development. We adhere to industry standards and&nbsp;comply with&nbsp;security measures in all countries, including 28 of those for whom we have already delivered projects. With over 100+ certified software developers, we are a leading software development company in India and USA.&nbsp;</p>', 'IT Industry', 'uploads/p2FOuBK7Ni6JHuSKSijCqUT68rKPxq9V3xoMC2AL.jpg', 'Business, Growth', '20 min read', 1, '2026-08-07 07:17:17', '2026-08-07 07:17:17');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(4, 'IT Industry', '2026-08-07 07:12:57', '2026-08-07 07:12:57'),
(6, 'dsf', '2026-08-07 07:16:28', '2026-08-07 07:16:28');

-- --------------------------------------------------------

--
-- Table structure for table `company_settings`
--

CREATE TABLE `company_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint UNSIGNED DEFAULT NULL,
  `dark_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `light_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_submissions`
--

CREATE TABLE `contact_submissions` (
  `id` bigint UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_submissions`
--

INSERT INTO `contact_submissions` (`id`, `fullname`, `phone`, `email`, `subject`, `message`, `ip_address`, `country`, `created_at`, `updated_at`) VALUES
(2, 'Rhonda Hogan', '+1 (702) 563-8903', 'poxuz@mailinator.com', 'Web App Development', 'Consequatur Nostrum', NULL, 'Pakistan', '2026-08-07 08:06:52', '2026-08-07 08:06:52'),
(3, 'Iola Banks', '+1 (511) 174-4553', 'zedovi@mailinator.com', 'AI/ML Development', 'Rerum et et voluptat', NULL, 'United States', '2026-08-07 08:12:02', '2026-08-07 08:12:02'),
(4, 'Suki York', '+1 (154) 282-2561', 'wymu@mailinator.com', 'Web App Development', 'Obcaecati et ut volu', NULL, 'Denmark', '2026-08-07 08:43:47', '2026-08-07 08:43:47'),
(6, 'Iola Banks', '+1 (511) 174-4553', 'zedovi@mailinator.com', 'AI/ML Development', 'Rerum et et voluptat', NULL, 'Denmark', '2026-08-07 08:12:02', '2026-08-07 08:12:02'),
(7, 'Lois Mcclure', '+1 (478) 104-3943', 'kygi@mailinator.com', 'Mobile App Development', 'Non odio ducimus ul', '::1', 'Unknown', '2026-08-13 09:05:55', '2026-08-13 09:05:55'),
(9, 'Kaseem Carver', '+1 (681) 657-9905', 'tirul@mailinator.com', 'AI/ML Development', 'Magni sit ipsum quo', '::1', 'Unknown', '2026-08-13 09:06:09', '2026-08-13 09:06:09'),
(10, 'Nolan Callahan', '+1 (381) 773-5485', 'Syedsabeer.office@gmail.com', 'Mobile App Development', 'Qui autem et aut dol', '::1', 'Unknown', '2026-08-13 09:10:02', '2026-08-13 09:10:02'),
(11, 'Sierra Burns', '+1 (894) 204-2064', 'syedsabeer6198@gmail.com', 'Mobile App Development', 'Omnis incididunt nul', '::1', 'Unknown', '2026-08-13 09:13:34', '2026-08-13 09:13:34'),
(12, 'Jelani Edwards', '+1 (493) 181-1164', 'syedsabeer6198@gmail.com', 'Web App Development', 'Officia similique as', '::1', 'Unknown', '2026-08-13 09:14:12', '2026-08-13 09:14:12'),
(13, 'Nayda Howard', '+1 (832) 936-8588', 'syedsabeer6198@gmail.com', 'Mobile App Development', 'Consectetur id quis', '::1', 'Unknown', '2026-08-13 09:15:25', '2026-08-13 09:15:25'),
(14, 'Callum Cantrell', '+1 (309) 802-9598', 'syedsabeer6198@gmail.com', 'Mobile App Development', 'Doloribus deserunt m', '::1', 'Unknown', '2026-08-13 09:16:30', '2026-08-13 09:16:30'),
(15, 'Jocelyn Mullen', '+1 (407) 294-7647', 'syedsabeer6198@gmail.com', 'AI/ML Development', 'Quis alias aliqua R', '::1', 'Unknown', '2026-08-13 09:17:50', '2026-08-13 09:17:50'),
(16, 'Hilary Collins', '+1 (434) 173-9409', 'syedsabeer6198@gmail.com', 'AI/ML Development', 'Sed recusandae Qui', '::1', 'Unknown', '2026-08-13 09:18:54', '2026-08-13 09:18:54'),
(17, 'Genevieve Bray', '+1 (909) 626-4604', 'info@avrioglobal.io', 'Mobile App Development', 'Hello Sir', '::1', 'Unknown', '2026-08-13 09:20:37', '2026-08-13 09:20:37'),
(18, 'Ulric Castaneda', '+1 (798) 417-8051', 'info@avrioglobal.io', 'AI/ML Development', 'Aspernatur rerum in', '::1', 'Unknown', '2026-08-13 09:24:32', '2026-08-13 09:24:32');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number_limit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `phone_code`, `phone_number_limit`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Afghanistan', 'AF', '+93', '9', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(2, 'Åland Islands', 'AX', '+358', '10', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(3, 'Albania', 'AL', '+355', '9', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(4, 'Algeria', 'DZ', '+213', '9', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(5, 'American Samoa', 'AS', '+1684', '7', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(6, 'Andorra', 'AD', '+376', '9', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(7, 'Angola', 'AO', '+244', '9', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(8, 'Anguilla', 'AI', '+1264', '7', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(9, 'Antarctica', 'AQ', '+672', '6', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(10, 'Antigua and Barbuda', 'AG', '+1268', '7', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(11, 'Argentina', 'AR', '+54', '10', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(12, 'Armenia', 'AM', '+374', '8', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(13, 'Aruba', 'AW', '+297', '7', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(14, 'Australia', 'AU', '+61', '9', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(15, 'Austria', 'AT', '+43', '10', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(16, 'Azerbaijan', 'AZ', '+994', '9', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(17, 'Bahamas', 'BS', '+1242', '7', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(18, 'Bahrain', 'BH', '+973', '8', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(19, 'Bangladesh', 'BD', '+880', '10', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(20, 'Barbados', 'BB', '+1246', '7', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(21, 'Belarus', 'BY', '+375', '9', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(22, 'Belgium', 'BE', '+32', '9', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(23, 'Belize', 'BZ', '+501', '7', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(24, 'Benin', 'BJ', '+229', '8', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(25, 'Bermuda', 'BM', '+1441', '7', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(26, 'Bhutan', 'BT', '+975', '8', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(27, 'Bolivia, Plurinational State of', 'BO', '+591', '8', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(28, 'Bonaire, Sint Eustatius and Saba', 'BQ', '+599', '7', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(29, 'Bosnia and Herzegovina', 'BA', '+387', '8', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(30, 'Botswana', 'BW', '+267', '8', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(31, 'Bouvet Island', 'BV', '+55', '10', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(32, 'Brazil', 'BR', '+55', '10', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(33, 'British Indian Ocean Territory', 'IO', '+246', '7', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(34, 'Brunei Darussalam', 'BN', '+673', '7', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(35, 'Bulgaria', 'BG', '+359', '9', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(36, 'Burkina Faso', 'BF', '+226', '8', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(37, 'Burundi', 'BI', '+257', '8', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(38, 'Cambodia', 'KH', '+855', '8', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(39, 'Cameroon', 'CM', '+237', '9', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(40, 'Canada', 'CA', '+1', '10', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(41, 'Cape Verde', 'CV', '+238', '7', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(42, 'Cayman Islands', 'KY', '+1345', '7', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(43, 'Central African Republic', 'CF', '+236', '9', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(44, 'Chad', 'TD', '+235', '9', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(45, 'Chile', 'CL', '+56', '9', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(46, 'China', 'CN', '+86', '11', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(47, 'Christmas Island', 'CX', '+61', '9', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(48, 'Cocos (Keeling) Islands', 'CC', '+61', '9', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(49, 'Colombia', 'CO', '+57', '10', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(50, 'Comoros', 'KM', '+269', '7', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(51, 'Congo', 'CG', '+242', '9', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(52, 'Congo, the Democratic Republic of the', 'CD', '+243', '9', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(53, 'Cook Islands', 'CK', '+682', '5', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(54, 'Costa Rica', 'CR', '+506', '8', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(55, 'Côte d\'Ivoire', 'CI', '+225', '8', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(56, 'Croatia', 'HR', '+385', '9', 'active', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(57, 'Cuba', 'CU', '+53', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(58, 'Curaçao', 'CW', '+599', '7', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(59, 'Cyprus', 'CY', '+357', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(60, 'Czech Republic', 'CZ', '+420', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(61, 'Denmark', 'DK', '+45', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(62, 'Djibouti', 'DJ', '+253', '6', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(63, 'Dominica', 'DM', '+1767', '7', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(64, 'Dominican Republic', 'DO', '+1809', '10', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(65, 'Ecuador', 'EC', '+593', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(66, 'Egypt', 'EG', '+20', '10', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(67, 'El Salvador', 'SV', '+503', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(68, 'Equatorial Guinea', 'GQ', '+240', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(69, 'Eritrea', 'ER', '+291', '7', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(70, 'Estonia', 'EE', '+372', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(71, 'Eswatini', 'SZ', '+268', '7', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(72, 'Ethiopia', 'ET', '+251', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(73, 'Falkland Islands (Malvinas)', 'FK', '+500', '5', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(74, 'Faroe Islands', 'FO', '+298', '6', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(75, 'Fiji', 'FJ', '+679', '7', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(76, 'Finland', 'FI', '+358', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(77, 'France', 'FR', '+33', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(78, 'French Guiana', 'GF', '+594', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(79, 'French Polynesia', 'PF', '+689', '6', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(80, 'French Southern Territories', 'TF', '+262', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(81, 'Gabon', 'GA', '+241', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(82, 'Gambia', 'GM', '+220', '7', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(83, 'Georgia', 'GE', '+995', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(84, 'Germany', 'DE', '+49', '10', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(85, 'Ghana', 'GH', '+233', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(86, 'Gibraltar', 'GI', '+350', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(87, 'Greece', 'GR', '+30', '10', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(88, 'Greenland', 'GL', '+299', '6', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(89, 'Grenada', 'GD', '+1473', '7', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(90, 'Guadeloupe', 'GP', '+590', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(91, 'Guam', 'GU', '+1671', '7', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(92, 'Guatemala', 'GT', '+502', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(93, 'Guernsey', 'GG', '+44', '10', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(94, 'Guinea', 'GN', '+224', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(95, 'Guinea-Bissau', 'GW', '+245', '7', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(96, 'Guyana', 'GY', '+592', '7', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(97, 'Haiti', 'HT', '+509', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(98, 'Heard Island and McDonald Islands', 'HM', '+672', '6', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(99, 'Holy See (Vatican City State)', 'VA', '+39', '10', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(100, 'Honduras', 'HN', '+504', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(101, 'Hong Kong', 'HK', '+852', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(102, 'Hungary', 'HU', '+36', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(103, 'Iceland', 'IS', '+354', '7', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(104, 'India', 'IN', '+91', '10', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(105, 'Indonesia', 'ID', '+62', '11', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(106, 'Iran', 'IR', '+98', '10', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(107, 'Iraq', 'IQ', '+964', '10', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(108, 'Ireland', 'IE', '+353', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(109, 'Isle of Man', 'IM', '+44', '10', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(110, 'Israel', 'IL', '+972', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(111, 'Italy', 'IT', '+39', '10', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(112, 'Jamaica', 'JM', '+1876', '7', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(113, 'Japan', 'JP', '+81', '10', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(114, 'Jersey', 'JE', '+44', '10', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(115, 'Jordan', 'JO', '+962', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(116, 'Kazakhstan', 'KZ', '+7', '10', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(117, 'Kenya', 'KE', '+254', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(118, 'Kiribati', 'KI', '+686', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(119, 'North Korea', 'KP', '+850', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(120, 'South Korea', 'KR', '+82', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(121, 'Kuwait', 'KW', '+965', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(122, 'Kyrgyzstan', 'KG', '+996', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(123, 'Lao People\'s Democratic Republic', 'LA', '+856', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(124, 'Latvia', 'LV', '+371', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(125, 'Lebanon', 'LB', '+961', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(126, 'Lesotho', 'LS', '+266', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(127, 'Liberia', 'LR', '+231', '7', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(128, 'Libya', 'LY', '+218', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(129, 'Liechtenstein', 'LI', '+423', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(130, 'Lithuania', 'LT', '+370', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(131, 'Luxembourg', 'LU', '+352', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(132, 'Macao', 'MO', '+853', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(133, 'Macedonia, the Former Yugoslav Republic of', 'MK', '+389', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(134, 'Madagascar', 'MG', '+261', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(135, 'Malawi', 'MW', '+265', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(136, 'Malaysia', 'MY', '+60', '10', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(137, 'Maldives', 'MV', '+960', '7', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(138, 'Mali', 'ML', '+223', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(139, 'Malta', 'MT', '+356', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(140, 'Marshall Islands', 'MH', '+692', '7', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(141, 'Martinique', 'MQ', '+596', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(142, 'Mauritania', 'MR', '+222', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(143, 'Mauritius', 'MU', '+230', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(144, 'Mayotte', 'YT', '+262', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(145, 'Mexico', 'MX', '+52', '10', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(146, 'Micronesia', 'FM', '+691', '7', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(147, 'Moldova, Republic of', 'MD', '+373', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(148, 'Monaco', 'MC', '+377', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(149, 'Mongolia', 'MN', '+976', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(150, 'Montenegro', 'ME', '+382', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(151, 'Montserrat', 'MS', '+1664', '7', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(152, 'Morocco', 'MA', '+212', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(153, 'Mozambique', 'MZ', '+258', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(154, 'Myanmar', 'MM', '+95', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(155, 'Namibia', 'NA', '+264', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(156, 'Nauru', 'NR', '+674', '7', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(157, 'Nepal', 'NP', '+977', '10', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(158, 'Netherlands', 'NL', '+31', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(159, 'New Caledonia', 'NC', '+687', '6', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(160, 'New Zealand', 'NZ', '+64', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(161, 'Nicaragua', 'NI', '+505', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(162, 'Niger', 'NE', '+227', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(163, 'Nigeria', 'NG', '+234', '10', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(164, 'Niue', 'NU', '+683', '4', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(165, 'Norfolk Island', 'NF', '+672', '6', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(166, 'Northern Mariana Islands', 'MP', '+1670', '7', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(167, 'Norway', 'NO', '+47', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(168, 'Oman', 'OM', '+968', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(169, 'Pakistan', 'PK', '+92', '10', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(170, 'Palau', 'PW', '+680', '7', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(171, 'Palestine, State of', 'PS', '+970', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(172, 'Panama', 'PA', '+507', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(173, 'Papua New Guinea', 'PG', '+675', '7', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(174, 'Paraguay', 'PY', '+595', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(175, 'Peru', 'PE', '+51', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(176, 'Philippines', 'PH', '+63', '10', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(177, 'Pitcairn', 'PN', '+64', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(178, 'Poland', 'PL', '+48', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(179, 'Portugal', 'PT', '+351', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(180, 'Puerto Rico', 'PR', '+1939', '7', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(181, 'Qatar', 'QA', '+974', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(182, 'Réunion', 'RE', '+262', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(183, 'Romania', 'RO', '+40', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(184, 'Russian Federation', 'RU', '+7', '10', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(185, 'Rwanda', 'RW', '+250', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(186, 'Saint Barthélemy', 'BL', '+590', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(187, 'Saint Helena', 'SH', '+290', '4', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(188, 'Saint Kitts and Nevis', 'KN', '+1869', '7', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(189, 'Saint Lucia', 'LC', '+1758', '7', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(190, 'Saint Martin (French part)', 'MF', '+590', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(191, 'Saint Pierre and Miquelon', 'PM', '+508', '6', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(192, 'Saint Vincent and the Grenadines', 'VC', '+1784', '7', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(193, 'Samoa', 'WS', '+685', '6', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(194, 'San Marino', 'SM', '+378', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(195, 'Sao Tome and Principe', 'ST', '+239', '7', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(196, 'Saudi Arabia', 'SA', '+966', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(197, 'Senegal', 'SN', '+221', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(198, 'Serbia', 'RS', '+381', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(199, 'Seychelles', 'SC', '+248', '7', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(200, 'Sierra Leone', 'SL', '+232', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(201, 'Singapore', 'SG', '+65', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(202, 'Sint Maarten (Dutch part)', 'SX', '+1721', '7', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(203, 'Slovakia', 'SK', '+421', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(204, 'Slovenia', 'SI', '+386', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(205, 'Solomon Islands', 'SB', '+677', '7', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(206, 'Somalia', 'SO', '+252', '7', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(207, 'South Africa', 'ZA', '+27', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(208, 'South Georgia and the South Sandwich Islands', 'GS', '+500', '5', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(209, 'South Sudan', 'SS', '+211', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(210, 'Spain', 'ES', '+34', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(211, 'Sri Lanka', 'LK', '+94', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(212, 'Sudan', 'SD', '+249', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(213, 'Suriname', 'SR', '+597', '6', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(214, 'Svalbard and Jan Mayen', 'SJ', '+47', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(215, 'Sweden', 'SE', '+46', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(216, 'Switzerland', 'CH', '+41', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(217, 'Syrian Arab Republic', 'SY', '+963', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(218, 'Taiwan, Province of China', 'TW', '+886', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(219, 'Tajikistan', 'TJ', '+992', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(220, 'Tanzania, United Republic of', 'TZ', '+255', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(221, 'Thailand', 'TH', '+66', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(222, 'Timor-Leste', 'TL', '+670', '7', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(223, 'Togo', 'TG', '+228', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(224, 'Tokelau', 'TK', '+690', '4', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(225, 'Tonga', 'TO', '+676', '5', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(226, 'Trinidad and Tobago', 'TT', '+1868', '7', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(227, 'Tunisia', 'TN', '+216', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(228, 'Turkey', 'TR', '+90', '10', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(229, 'Turkmenistan', 'TM', '+993', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(230, 'Tuvalu', 'TV', '+688', '5', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(231, 'Uganda', 'UG', '+256', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(232, 'Ukraine', 'UA', '+380', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(233, 'United Arab Emirates', 'AE', '+971', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(234, 'United Kingdom', 'GB', '+44', '10', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(235, 'United States', 'US', '+1', '10', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(236, 'Uruguay', 'UY', '+598', '8', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(237, 'Uzbekistan', 'UZ', '+998', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(238, 'Vanuatu', 'VU', '+678', '7', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(239, 'Venezuela', 'VE', '+58', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(240, 'Viet Nam', 'VN', '+84', '10', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(241, 'Wallis and Futuna', 'WF', '+681', '6', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(242, 'Western Sahara', 'EH', '+212', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(243, 'Yemen', 'YE', '+967', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(244, 'Zambia', 'ZM', '+260', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(245, 'Zimbabwe', 'ZW', '+263', '9', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Chief Executive Officer (CEO)', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(2, 'Chief Operating Officer (COO)', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(3, 'Chief Financial Officer (CFO)', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(4, 'Chief Technology Officer (CTO)', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(5, 'Chief Marketing Officer (CMO)', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(6, 'Managing Director', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(7, 'General Manager', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(8, 'Operations Manager', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(9, 'Project Manager', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(10, 'Product Manager', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(11, 'Human Resources Manager', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(12, 'Finance Manager', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(13, 'Software Engineer', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(14, 'Senior Software Engineer', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(15, 'Frontend Developer', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(16, 'Backend Developer', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(17, 'Full Stack Developer', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(18, 'UI/UX Designer', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(19, 'Quality Assurance Engineer', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(20, 'Data Analyst', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(21, 'Data Scientist', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(22, 'Network Administrator', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(23, 'Marketing Manager', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(24, 'Sales Manager', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(25, 'Customer Support Representative', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(26, 'Accountant', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(27, 'Business Analyst', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(28, 'Legal Advisor', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(29, 'Consultant', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(30, 'Research Analyst', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(31, 'Content Writer', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(32, 'Digital Marketing Specialist', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(33, 'Social Media Manager', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(34, 'Administrative Assistant', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(35, 'Receptionist', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(36, 'Security Officer', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(37, 'Office Assistant', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Male', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(2, 'Female', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(3, 'Non-Binary', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(4, 'Transgender Male', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(5, 'Transgender Female', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(6, 'Genderfluid', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(7, 'Agender', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(8, 'Bigender', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(9, 'Two-Spirit', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(10, 'Androgynous', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(11, 'Demiboy', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(12, 'Demigirl', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(13, 'Genderqueer', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(14, 'Intersex', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(15, 'Pangender', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(16, 'Neutrois', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(17, 'Questioning', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(18, 'Other', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(19, 'Prefer Not to Say', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `native_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `iso_code`, `native_name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', 'English', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(2, 'Spanish', 'es', 'Español', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(3, 'French', 'fr', 'Français', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(4, 'Chinese', 'zh', '中文', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(5, 'Arabic', 'ar', 'العربية', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(6, 'Hindi', 'hi', 'हिन्दी', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(7, 'Russian', 'ru', 'Русский', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(8, 'Portuguese', 'pt', 'Português', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(9, 'Bengali', 'bn', 'বাংলা', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(10, 'Urdu', 'ur', 'اردو', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(11, 'Japanese', 'ja', '日本語', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(12, 'German', 'de', 'Deutsch', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(13, 'Korean', 'ko', '한국어', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(14, 'Turkish', 'tr', 'Türkçe', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(15, 'Italian', 'it', 'Italiano', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(16, 'Persian', 'fa', 'فارسی', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(17, 'Dutch', 'nl', 'Nederlands', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(18, 'Swedish', 'sv', 'Svenska', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(19, 'Greek', 'el', 'Ελληνικά', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(20, 'Hebrew', 'he', 'עברית', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(21, 'Thai', 'th', 'ไทย', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(22, 'Vietnamese', 'vi', 'Tiếng Việt', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(23, 'Polish', 'pl', 'Polski', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(24, 'Romanian', 'ro', 'Română', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(25, 'Hungarian', 'hu', 'Magyar', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(26, 'Czech', 'cs', 'Čeština', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(27, 'Finnish', 'fi', 'Suomi', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(28, 'Malay', 'ms', 'Bahasa Melayu', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(29, 'Indonesian', 'id', 'Bahasa Indonesia', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(30, 'Norwegian', 'no', 'Norsk', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(31, 'Danish', 'da', 'Dansk', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(32, 'Slovak', 'sk', 'Slovenčina', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(33, 'Serbian', 'sr', 'Српски', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(34, 'Bulgarian', 'bg', 'Български', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(35, 'Lithuanian', 'lt', 'Lietuvių', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(36, 'Latvian', 'lv', 'Latviešu', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(37, 'Estonian', 'et', 'Eesti', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(38, 'Croatian', 'hr', 'Hrvatski', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(39, 'Slovenian', 'sl', 'Slovenščina', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(40, 'Swahili', 'sw', 'Kiswahili', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(41, 'Afrikaans', 'af', 'Afrikaans', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(42, 'Albanian', 'sq', 'Shqip', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(43, 'Armenian', 'hy', 'Հայերեն', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(44, 'Georgian', 'ka', 'ქართული', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(45, 'Pashto', 'ps', 'پښتو', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(46, 'Kurdish', 'ku', 'Kurdî', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(47, 'Sindhi', 'sd', 'سنڌي', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(48, 'Tamil', 'ta', 'தமிழ்', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(49, 'Telugu', 'te', 'తెలుగు', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(50, 'Marathi', 'mr', 'मराठी', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(51, 'Gujarati', 'gu', 'ગુજરાતી', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58');

-- --------------------------------------------------------

--
-- Table structure for table `marital_statuses`
--

CREATE TABLE `marital_statuses` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marital_statuses`
--

INSERT INTO `marital_statuses` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Single', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(2, 'Married', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(3, 'Divorced', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(4, 'Widowed', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(5, 'Separated', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(6, 'Engaged', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(7, 'In a Relationship', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(8, 'It\'s Complicated', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(9, 'Domestic Partnership', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(10, 'Civil Union', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58'),
(11, 'Prefer Not to Say', 'active', '2026-08-07 05:06:58', '2026-08-07 05:06:58');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(26, '2014_10_12_000000_create_users_table', 1),
(27, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(28, '2019_08_19_000000_create_failed_jobs_table', 1),
(29, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(30, '2025_01_20_000000_create_live_videos_table', 1),
(31, '2025_01_20_000001_create_partners_table', 1),
(32, '2025_05_21_203520_create_permission_tables', 1),
(33, '2025_05_22_202511_create_countries_table', 1),
(34, '2025_05_22_202520_create_languages_table', 1),
(35, '2025_05_22_202529_create_genders_table', 1),
(36, '2025_05_22_202546_create_marital_statuses_table', 1),
(37, '2025_05_22_202636_create_designations_table', 1),
(38, '2025_05_22_202637_create_timezones_table', 1),
(39, '2025_05_22_202638_create_company_settings_table', 1),
(40, '2025_05_22_202645_create_profiles_table', 1),
(41, '2025_05_22_203629_create_system_settings_table', 1),
(42, '2025_05_22_210323_create_notifications_table', 1),
(43, '2026_08_07_000000_add_blog_category_column', 2),
(44, '2026_08_06_000000_create_blogs_and_comments_tables', 3),
(45, '2026_08_07_120000_create_blog_categories_table', 4),
(46, '2026_08_07_130000_create_contact_submissions_table', 5),
(47, '2026_08_13_130000_add_ip_and_country_analytics_columns', 6);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dance_style` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dance_video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(2, 'individual', 'web', '2026-08-07 05:06:57', '2026-08-07 05:06:57'),
(3, 'company', 'web', '2026-08-07 05:06:57', '2026-08-07 05:06:57');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `max_upload_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_symbol_position` enum('prefix','postfix') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'prefix',
  `language_id` bigint UNSIGNED DEFAULT NULL,
  `timezone_id` bigint UNSIGNED DEFAULT NULL,
  `footer_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `timezones`
--

CREATE TABLE `timezones` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offset` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `is_active`, `provider`, `provider_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', NULL, '$2y$10$AS5H1/ARk6b/Nv21R/Nxi.B/pmQzF6UGIHDESY2Jha93U2Rwwpoay', NULL, 'active', NULL, NULL, '2026-08-07 05:06:57', '2026-08-07 05:06:57', NULL),
(2, 'John Doe', 'individual@example.com', 'john_individual', NULL, '$2y$10$HbaqHSX3/5ezKKruf8yXMOJjPSabG9.ZnsjDIaJJgUjxC1B5aK6YO', NULL, 'active', NULL, NULL, '2026-08-07 05:06:57', '2026-08-07 05:06:57', NULL),
(3, 'ACME Corp', 'company@example.com', 'acme_company', NULL, '$2y$10$JP9W1pwO.paa.JMz26.kpOFgp6sIPr/FEYyHyeNUbYOqQ5IBbRjJ6', NULL, 'active', NULL, NULL, '2026-08-07 05:06:57', '2026-08-07 05:06:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `visit_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip_address`, `country`, `visit_date`, `created_at`, `updated_at`) VALUES
(1, '::1', 'Pakistan', '2026-08-13', '2026-08-13 02:58:03', '2026-08-13 02:58:03'),
(2, '::1', 'Pakistan', '2026-08-13', '2026-08-13 02:58:03', '2026-08-13 02:58:03'),
(3, '::1', 'Pakistan', '2026-08-13', '2026-08-13 02:58:03', '2026-08-13 02:58:03'),
(4, '::1', 'United States', '2026-08-13', '2026-08-13 02:58:03', '2026-08-13 02:58:03'),
(5, '::1', 'Denmark\r\n', '2026-08-13', '2026-08-13 02:58:03', '2026-08-13 02:58:03'),
(6, '::1', 'Denmark\r\n', '2026-08-13', '2026-08-13 02:58:03', '2026-08-13 02:58:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`),
  ADD KEY `blogs_category_index` (`category`),
  ADD KEY `blogs_visibility_index` (`visibility`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_categories_name_unique` (`name`);

--
-- Indexes for table `company_settings`
--
ALTER TABLE `company_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_settings_country_id_foreign` (`country_id`);

--
-- Indexes for table `contact_submissions`
--
ALTER TABLE `contact_submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_submissions_email_index` (`email`),
  ADD KEY `contact_submissions_ip_address_index` (`ip_address`),
  ADD KEY `contact_submissions_country_index` (`country`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marital_statuses`
--
ALTER TABLE `marital_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `system_settings_language_id_foreign` (`language_id`),
  ADD KEY `system_settings_timezone_id_foreign` (`timezone_id`);

--
-- Indexes for table `timezones`
--
ALTER TABLE `timezones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `timezones_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visitors_country_index` (`country`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `company_settings`
--
ALTER TABLE `company_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_submissions`
--
ALTER TABLE `contact_submissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `marital_statuses`
--
ALTER TABLE `marital_statuses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timezones`
--
ALTER TABLE `timezones`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company_settings`
--
ALTER TABLE `company_settings`
  ADD CONSTRAINT `company_settings_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD CONSTRAINT `system_settings_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `system_settings_timezone_id_foreign` FOREIGN KEY (`timezone_id`) REFERENCES `timezones` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
