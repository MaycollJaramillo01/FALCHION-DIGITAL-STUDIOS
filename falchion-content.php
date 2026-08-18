<?php
if (defined('FALCHION_CONTENT_BOOTSTRAPPED')) {
    return;
}

define('FALCHION_CONTENT_BOOTSTRAPPED', true);

require_once __DIR__ . '/i18n.php';
i18n_start_buffer();

function falchion_current_page(): string
{
    return basename((string) ($_SERVER['PHP_SELF'] ?? 'index.php'));
}

function falchion_url(string $path): string
{
    $relative = i18n_localized_url($path);

    // If already absolute (http/https or starts with //) return as-is
    if (preg_match('#^https?://#i', $relative) || str_starts_with($relative, '//')) {
        return $relative;
    }

    // Prepend BaseURL so links work from any subdirectory (e.g. service/)
    $base = rtrim(falchion_base_url(), '/');
    $relative = ltrim($relative, '/');
    return $base . '/' . $relative;
}

function falchion_is_active(string $path): bool
{
    $current = falchion_current_page();
    $currentNoExt = preg_replace('/\.php$/', '', $current);
    $target = basename($path);
    $targetNoExt = preg_replace('/\.php$/', '', $target);
    return $current === $target || $currentNoExt === $target || $current === $targetNoExt || $currentNoExt === $targetNoExt;
}

function falchion_base_url(): string
{
    $isVercel = !empty($_SERVER['VERCEL']) || !empty($_ENV['VERCEL']);
    $proto    = $_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '';
    $scheme   = ($isVercel || $proto === 'https' || (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')) ? 'https' : 'http';
    $host   = (string) ($_SERVER['HTTP_HOST'] ?? 'localhost');

    // Resolve the project root via filesystem: this file lives at <root>/falchion-content.php
    $projectRoot = str_replace('\\', '/', __DIR__);          // e.g. /xampp/htdocs/PROYECTO
    $docRoot     = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT'] ?? '');

    if ($docRoot !== '' && strpos($projectRoot, $docRoot) === 0) {
        $prefix = substr($projectRoot, strlen(rtrim($docRoot, '/')));
        $prefix = rtrim($prefix, '/');
    } else {
        $prefix = '';
    }

    return $scheme . '://' . $host . $prefix . '/';
}

$Company = 'Falchion Digital Studios';
$SiteTagline = 'Creative Digital Studio for Brands, Businesses & Content Creators';
$SiteDescription = 'We design, produce and develop powerful visual content, websites and digital experiences that elevate brands and connect with audiences.';
$BaseURL = falchion_base_url();
$Domain = 'https://falchionstudios.co.uk/';
$Mail = 'contact@falchionstudios.co.uk';
$MailRef = 'mailto:' . $Mail;
$Phone = '+44 020 3996 2449';
$PhoneRef = 'tel:+442039962449';
$PhoneUS = '+1 951-374-8233';
$PhoneUSRef = 'tel:+19513748233';
$WhatsApp = '+44 7915 631536';
$WhatsAppRef = 'https://wa.me/447915631536';
$Address = "Falchion Digital Studios\nc/o DoES Liverpool\n1st Floor, The Tapestry\n68-76 Kempston Street\nLiverpool, L3 8HL";
$LocationShort = 'Liverpool, United Kingdom';
$BusinessHours = 'Monday - Friday: 8:00 AM - 8:00 PM (UK time)';
$CoverageLabel = 'Video Production: Liverpool & North West | Other Services: Worldwide';
$LogoPath = 'assets/img/logo.jpeg';
$FaviconPath = 'assets/img/logo.png';

$NavItems = [
    ['label' => 'Home', 'path' => 'index.php'],
    ['label' => 'About Us', 'path' => 'about.php'],
    ['label' => 'Services', 'path' => 'services.php', 'has_submenu' => true],
    ['label' => 'Portfolio', 'path' => 'portfolio.php'],
    ['label' => 'Blogs', 'path' => 'blog.php'],
    ['label' => 'Contact Us', 'path' => 'contact.php'],
];

$SocialLinks = [
    ['label' => 'YouTube', 'url' => 'https://www.youtube.com/@FalchionDS'],
    ['label' => 'Instagram', 'url' => 'https://www.instagram.com/falchionds'],
    ['label' => 'Facebook', 'url' => 'https://www.facebook.com/falchionds'],
];

$WhyChooseUs = [
    '10+ Years of Industry Experience',
    'Multidisciplinary Creative Team',
    'End-to-End Production',
    'International Clients',
    'High Quality Visual Production',
];

$HomeStats = [
    ['value' => '10+', 'label' => 'Years across video, design and animation'],
    ['value' => '2', 'label' => 'Core regions served: UK and the Americas'],
    ['value' => '5', 'label' => 'Integrated service lines under one studio'],
];

$Services = [
    [
        'slug' => 'graphic-design',
        'title' => 'Graphic Design',
        'icon' => '<i class="fa-solid fa-pen-ruler"></i>',
        'short' => 'Brand identity systems, campaign graphics and print-ready assets built for consistency.',
        'description' => 'We provide full creative solutions for businesses and individuals, from establishing a brand identity from scratch to developing marketing materials and social media visuals that strengthen your brand presence.',
        'headline' => 'Design That Builds Brands',
        'overview_text' => 'From your first logo to a full brand identity system, we create visuals that make your business look credible, consistent and memorable across every touchpoint — print, digital and beyond.',
        'badge_label' => 'Brand Studio',
        'badge_sub' => 'Liverpool & Worldwide',
        'cta' => 'See Portfolio',
        'image' => 'assets/img/projects/logo-redesign/case-01.jpg',
        'video' => 'assets/video/placeholder/Graphic Design.mp4',
        'items' => [
            'Brand Creation & Strategy',
            'Logo Design & Corporate Branding',
            'Brand Application to Merchandise',
            'Design for Print Media',
            'Social Media Graphics & Banners',
            'Visual Campaign Development',
        ],
        'process' => [
            ['step' => 'Discovery', 'title' => 'Brand Discovery', 'text' => 'We start by learning about your business, audience, competitors and goals to build a strategic creative foundation.'],
            ['step' => 'Concept', 'title' => 'Design Concept', 'text' => 'Our designers develop visual concepts, mood boards and style directions aligned with your brand personality.'],
            ['step' => 'Design', 'title' => 'Production & Refinement', 'text' => 'We produce all assets — logos, typography, colour palettes, templates — and refine them through feedback rounds.'],
            ['step' => 'Delivery', 'title' => 'Final Delivery', 'text' => 'You receive all files in ready-to-use formats (print, digital, web) along with brand usage guidelines.'],
        ],
        'faq' => [
            ['q' => 'How long does a branding project take?', 'a' => 'A full brand identity typically takes 2–4 weeks depending on complexity and feedback rounds. Logo-only projects can be delivered faster.'],
            ['q' => 'What do I receive at the end?', 'a' => 'You receive all source files (AI, EPS, SVG, PNG, PDF), a brand guidelines document, and ready-to-use assets for print and digital use.'],
            ['q' => 'Can you redesign an existing brand?', 'a' => 'Yes. We work on both new brand creation and redesigns. We analyse your current identity and evolve it while keeping what works.'],
            ['q' => 'Do you work with businesses outside the UK?', 'a' => 'Absolutely. We serve clients across Europe and the Americas. All communication and delivery is handled remotely.'],
        ],
    ],
    [
        'slug' => 'web-design',
        'title' => 'Web Design & Development',
        'icon' => '<i class="fa-solid fa-code"></i>',
        'short' => 'Modern, responsive websites aligned with your brand and built for business clarity.',
        'description' => 'We design and develop modern, responsive, and fully functional websites to help businesses build an effective online presence, fully aligned with their brand identity.',
        'headline' => 'Websites Built to Perform',
        'overview_text' => 'We design and develop fast, responsive websites that reflect your brand and convert visitors into clients — whether you need a landing page, a full corporate site or a custom web application.',
        'badge_label' => 'Full-Stack Studio',
        'badge_sub' => 'Design + Development',
        'cta' => 'Book a Call',
        'image' => 'assets/img/projects/website-creation/case-01.jpg',
        'video' => 'assets/video/placeholder/Web Design.mp4',
        'items' => [
            'Discovery & Project Planning',
            'UI/UX Design & Visual Concept',
            'Responsive Web Development',
            'Content Integration & SEO Basics',
            'Hosting Management & Annual Maintenance',
            'Contact Systems Integration',
        ],
        'process' => [
            ['step' => 'Discovery', 'title' => 'Strategy & Scope', 'text' => 'We define your goals, target audience, site structure and technical requirements before any design begins.'],
            ['step' => 'Design', 'title' => 'UI/UX Design', 'text' => 'We create wireframes and full visual designs aligned with your brand — desktop and mobile — before a single line of code is written.'],
            ['step' => 'Build', 'title' => 'Development', 'text' => 'We build your site with clean, fast and responsive code, integrate your content, forms and any third-party tools required.'],
            ['step' => 'Launch', 'title' => 'Launch & Handover', 'text' => 'We test thoroughly, launch your site and hand over full documentation, logins and a maintenance plan.'],
        ],
        'faq' => [
            ['q' => 'How long does a website project take?', 'a' => 'Most websites are delivered in 3–6 weeks depending on scope, content availability and the number of feedback rounds.'],
            ['q' => 'Do you build on WordPress or custom?', 'a' => 'We work with both. We build custom PHP/HTML sites and also WordPress sites — we recommend based on your needs and budget.'],
            ['q' => 'Is hosting included?', 'a' => 'We can manage hosting on your behalf as part of our annual maintenance plan, or we can deploy to your existing hosting environment.'],
            ['q' => 'Will my site work on mobile?', 'a' => 'Yes — every site we build is fully responsive and tested across devices and browsers before delivery.'],
        ],
    ],
    [
        'slug' => 'video-production',
        'title' => 'Video Production',
        'icon' => '<i class="fa-solid fa-clapperboard"></i>',
        'short' => 'From concept to post-production, we create polished video assets for brands and creators.',
        'description' => 'Professional video production services for businesses, brands, and content creators, covering the entire process from concept to post-production.',
        'headline' => 'Video That Tells Your Story',
        'overview_text' => 'From scripting and storyboarding to filming and post-production, we handle the full production process — delivering polished, brand-aligned videos for social media, advertising and corporate use.',
        'badge_label' => 'Liverpool & North West',
        'badge_sub' => 'On-location filming',
        'cta' => 'Book a Call',
        'image' => 'assets/video/9.jpg',
        'video' => 'assets/video/placeholder/Video Production.mp4',
        'items' => [
            'YouTube Content Planning',
            'Scriptwriting & Storyboarding',
            'Production & Filming',
            'Post-Production & Editing',
        ],
        'process' => [
            ['step' => 'Brief', 'title' => 'Creative Brief', 'text' => 'We align on objectives, tone, format and audience — then develop a creative brief that drives every production decision.'],
            ['step' => 'Pre-Production', 'title' => 'Script & Storyboard', 'text' => 'We write the script, plan the visual structure and prepare all logistics — locations, talent, schedule and equipment.'],
            ['step' => 'Production', 'title' => 'Filming', 'text' => 'Our team handles all filming with professional-grade equipment. We capture every shot needed to tell your story effectively.'],
            ['step' => 'Post', 'title' => 'Editing & Delivery', 'text' => 'We edit, colour-grade, add music and deliver your final video in all formats needed — social, broadcast or web.'],
        ],
        'faq' => [
            ['q' => 'Do you film on location?', 'a' => 'Yes. We cover Liverpool and the North West for on-location filming. For other regions, we can coordinate travel or work with local crews.'],
            ['q' => 'What video formats do you deliver?', 'a' => 'We deliver in MP4, MOV and any format required — optimised for YouTube, Instagram, websites or broadcast depending on your needs.'],
            ['q' => 'Can you handle the full process end-to-end?', 'a' => 'Yes — from scriptwriting and storyboarding through to post-production, colour grading, sound design and final delivery.'],
            ['q' => 'How many revision rounds are included?', 'a' => 'We typically include two rounds of revisions in the editing phase. Additional rounds can be arranged if needed.'],
        ],
    ],
    [
        'slug' => 'motion-graphics',
        'title' => 'Motion Graphics & Animation',
        'icon' => '<i class="fa-solid fa-wand-magic-sparkles"></i>',
        'short' => '2D and 3D animation for logos, intros, explainers and social-first visual storytelling.',
        'description' => 'We bring brands to life through animation, providing engaging 2D and 3D visuals for advertising, corporate communications, and social media.',
        'headline' => 'Animation That Moves People',
        'overview_text' => 'We craft 2D and 3D animations that elevate your brand — from logo reveals and motion intros to explainer videos and social-first content that stops the scroll and leaves a lasting impression.',
        'badge_label' => '2D & 3D Animation',
        'badge_sub' => 'Frame-by-frame craft',
        'cta' => 'See Portfolio',
        'image' => 'assets/img/projects/digital-presence-setup/case-01.jpg',
        'video' => 'assets/video/placeholder/Motion Graphics.mp4',
        'items' => [
            'Logo Animations',
            '2D Animation',
            '3D Animation',
            'Intros, Openings & Endings',
            'Bumpers & Digital Vignettes',
            'Social Media Animations',
        ],
        'process' => [
            ['step' => 'Brief', 'title' => 'Animation Brief', 'text' => 'We define the animation style, duration, tone and purpose — and align on references and visual direction before any work starts.'],
            ['step' => 'Design', 'title' => 'Style Frames & Assets', 'text' => 'We design static frames, characters or graphic elements that define the look of your animation before it moves.'],
            ['step' => 'Animation', 'title' => 'Animation & Motion', 'text' => 'Our animators bring your assets to life — applying motion, timing, transitions and sound to create a polished result.'],
            ['step' => 'Delivery', 'title' => 'Export & Delivery', 'text' => 'We export in all formats you need — MP4, GIF, WebM or broadcast-ready — ready to publish anywhere.'],
        ],
        'faq' => [
            ['q' => 'What animation styles do you work with?', 'a' => 'We work with 2D flat design, motion graphics, logo animation, character animation and basic 3D. We recommend the best style based on your goals.'],
            ['q' => 'Can you animate my existing logo?', 'a' => 'Yes. Logo animation is one of our most requested services. We need your logo in vector format (AI or SVG) to begin.'],
            ['q' => 'How long does an animation take to produce?', 'a' => 'A short logo animation takes 3–5 days. Longer explainers or branded intros typically take 1–3 weeks depending on complexity.'],
            ['q' => 'Do you add music or voiceover?', 'a' => 'We can add licensed music tracks. For voiceover, we work with professional voice artists and can coordinate recording if needed.'],
        ],
    ],
    [
        'slug' => 'digital-marketing',
        'title' => 'Digital Marketing',
        'icon' => '<i class="fa-solid fa-chart-line"></i>',
        'short' => 'Campaign management, audience growth and performance tracking across key channels.',
        'description' => 'We manage social media, design campaigns, and implement advertising strategies to increase brand visibility, engagement, and performance.',
        'headline' => 'Social Media That Converts',
        'overview_text' => 'We manage your social presence, run paid ad campaigns and track performance across Meta, Google and beyond — so you can focus on running your business while we grow your audience.',
        'badge_label' => 'Meta + Google Ads',
        'badge_sub' => 'Paid & Organic Growth',
        'cta' => 'Book a Call',
        'image' => 'assets/img/projects/landing-pages/case-02.jpg',
        'video' => 'assets/video/placeholder/Digital Marketing.mp4',
        'items' => [
            'Social Media Management & Content Posting',
            'Visual Content & Campaign Design',
            'Meta Ads & Google Ads Campaign Management',
            'Performance Tracking & Analytics',
            'Audience Growth & Engagement Strategies',
        ],
        'process' => [
            ['step' => 'Audit', 'title' => 'Brand & Channel Audit', 'text' => 'We review your current digital presence, competitors and audience to identify gaps and opportunities across all channels.'],
            ['step' => 'Strategy', 'title' => 'Campaign Strategy', 'text' => 'We build a tailored content and paid media strategy aligned with your business goals, budget and target market.'],
            ['step' => 'Execute', 'title' => 'Content & Campaign Execution', 'text' => 'We create, schedule and publish content, launch paid campaigns and manage all community interactions on your behalf.'],
            ['step' => 'Report', 'title' => 'Performance Reporting', 'text' => 'We track KPIs, analyse results and deliver clear monthly reports — then optimise based on what the data tells us.'],
        ],
        'faq' => [
            ['q' => 'Which platforms do you manage?', 'a' => 'We manage Instagram, Facebook, LinkedIn, TikTok and YouTube. We also run Meta Ads and Google Ads campaigns.'],
            ['q' => 'Do you create the content too?', 'a' => 'Yes — content creation is part of the service. We design graphics, write captions and produce short-form video content for your channels.'],
            ['q' => 'How do you measure success?', 'a' => 'We track reach, engagement, follower growth, leads generated and ad performance. Monthly reports keep you informed at every step.'],
            ['q' => 'Is there a minimum contract period?', 'a' => 'We work on monthly retainers with a minimum of 3 months to allow enough time to build momentum and see measurable results.'],
        ],
    ],
];

$PortfolioFilters = [
    'all' => 'All',
    'graphic-design' => 'Graphic Design',
    'web-design' => 'Web Design',
    'video-production' => 'Video Production',
    'motion-graphics' => 'Animation',
    'digital-marketing' => 'Marketing',
];

$PortfolioItems = [
    [
        'category' => 'digital-marketing',
        'title'    => 'Shopify Redesign & Marketing Strategy',
        'client'   => 'E-commerce Brand (Confidential)',
        'summary'  => 'Led the Shopify redesign and supported the marketing strategy to improve brand presentation, user experience and conversions.',
        'services' => ['Shopify Redesign', 'Marketing Strategy', 'E-commerce'],
        'url'      => 'https://shop.celavista.com',
        'image'    => 'assets/img/portfolio/celavista.png',
    ],
    [
        'category' => 'web-design',
        'title'    => 'Construction Company Website — Built from Scratch',
        'client'   => 'Construction Client',
        'summary'  => 'Designed and developed a construction company website from scratch with a custom structure focused on credibility and lead generation.',
        'services' => ['Web Design', 'Custom Development', 'Lead Generation'],
        'url'      => 'https://vdcontractors.com',
        'image'    => 'assets/img/portfolio/vd-contractors.png',
    ],
    [
        'category' => 'web-design',
        'title'    => 'Shopify E-commerce Experience',
        'client'   => 'Fashion & Beauty Brand (Confidential)',
        'summary'  => 'Built and optimised Shopify landing pages, product sections and conversion-focused user flows for campaigns and sales.',
        'services' => ['Shopify Development', 'Web Design', 'UI/UX'],
        'url'      => 'https://www.luxoboutique.com',
        'image'    => 'assets/img/portfolio/luxo-boutique.png',
    ],
    [
        'category' => 'web-design',
        'title'    => 'Education Platform Website Optimisation',
        'client'   => 'Education Client (Confidential)',
        'summary'  => 'Improved site structure, fixed technical issues and optimised UX and performance for a better user experience.',
        'services' => ['Web Maintenance', 'UX Optimisation', 'Technical Audit'],
        'url'      => 'https://cmreducate.com',
        'image'    => 'assets/img/portfolio/cmr-educate.png',
    ],
    [
        'category' => 'digital-marketing',
        'title'    => 'Technical Audit & Performance Review',
        'client'   => 'Hospitality Client (Confidential)',
        'summary'  => 'Performed a technical audit to identify performance, security and WordPress configuration issues affecting the site.',
        'services' => ['Technical SEO', 'Performance Optimisation', 'Website Audit'],
        'url'      => 'https://resortager.com',
        'image'    => 'assets/img/portfolio/resortager.png',
    ],
    [
        'category' => 'digital-marketing',
        'title'    => 'Real Estate Lead Generation Website',
        'client'   => 'Real Estate Client (Confidential)',
        'summary'  => 'Supported lead generation strategy by integrating valuation tools and improving the website for seller acquisition.',
        'services' => ['Lead Generation', 'Funnel Strategy', 'Website Integration'],
        'url'      => 'https://www.vallcuerba.com',
        'image'    => 'assets/img/portfolio/vallcuerba.png',
    ],
    [
        'category' => 'digital-marketing',
        'title'    => 'SEO Reporting & Optimisation — Therapy Practice',
        'client'   => 'Therapy Practice Client (Confidential)',
        'summary'  => 'Prepared SEO reporting and optimisation insights to improve organic visibility and overall website performance.',
        'services' => ['SEO Reporting', 'Technical SEO', 'On-Page SEO'],
        'url'      => 'https://nataliatrejospsicoterapia.com',
        'image'    => 'assets/img/portfolio/natalia-trejos.png',
    ],
    [
        'category' => 'digital-marketing',
        'title'    => 'Monthly SEO Reporting — Law Firm',
        'client'   => 'Legal Services Client (Confidential)',
        'summary'  => 'Delivered structured monthly SEO reporting and analysis to track growth opportunities and search performance.',
        'services' => ['SEO Reporting', 'Technical SEO', 'Content Optimisation'],
        'url'      => 'https://gyg-legal.com',
        'image'    => 'assets/img/portfolio/gyg-legal.png',
    ],
    [
        'category' => 'digital-marketing',
        'title'    => 'SEO Performance Tracking — Local Business',
        'client'   => 'Local Business Client (Confidential)',
        'summary'  => 'Monitored SEO performance and analysed visibility trends to support ongoing optimisation efforts.',
        'services' => ['SEO Analysis', 'Local SEO', 'Performance Tracking'],
        'url'      => 'https://sistemacuinabcn.com',
        'image'    => 'assets/img/portfolio/sistema-cuina.png',
    ],

    // ── Creative work delivered as files (motion, video, design, campaign pieces) ──
    [
        'category'   => 'motion-graphics',
        'title'      => 'AMILI — Animated Product Promo',
        'client'     => 'AMILI (The Black Sesame)',
        'summary'    => 'Vertical promo for a toasted black sesame product, combining product footage with 3D animation for social channels.',
        'services'   => ['Motion Graphics', '3D Animation', 'Product Promo'],
        'media'      => 'assets/img/reel/amili-promo.mp4',
        'media_type' => 'video',
        'image'      => 'assets/img/reel/amili-promo.webp',
    ],
    [
        'category'   => 'motion-graphics',
        'title'      => 'Hipótesis — 3D Broadcast Bumpers',
        'client'     => 'Hipótesis',
        'summary'    => 'Animated 3D typography bumpers used to open and close programme segments, keeping the show identity consistent episode to episode.',
        'services'   => ['3D Animation', 'Broadcast Design', 'Title Design'],
        'media'      => 'assets/img/reel/bumpers-3d.mp4',
        'media_type' => 'video',
        'image'      => 'assets/img/reel/bumpers-3d.webp',
    ],
    [
        'category'   => 'motion-graphics',
        'title'      => 'Rocha Construction Group — Opening Sequence',
        'client'     => 'Rocha Construction Group',
        'summary'    => 'Animated opening sequence built around a clean logo reveal for use at the head of the company’s video content.',
        'services'   => ['Motion Graphics', 'Logo Animation', 'Title Sequence'],
        'media'      => 'assets/img/reel/rocha-opening.mp4',
        'media_type' => 'video',
        'image'      => 'assets/img/reel/rocha-opening.webp',
    ],
    [
        'category'   => 'motion-graphics',
        'title'      => 'Animated Logo Sting',
        'client'     => 'Brand Identity Project',
        'summary'    => 'Short logo animation designed as a reusable opener and closer across a brand’s video content.',
        'services'   => ['Logo Animation', 'Motion Graphics', 'Brand Identity'],
        'media'      => 'assets/img/reel/logo-animated.mp4',
        'media_type' => 'video',
        'image'      => 'assets/img/reel/logo-animated.webp',
    ],
    [
        'category'   => 'motion-graphics',
        'title'      => 'Fashion Brand — Animated Social Content',
        'client'     => 'Fashion Brand',
        'summary'    => 'Animated social piece turning a static fashion campaign layout into moving content built for feeds and stories.',
        'services'   => ['Motion Graphics', 'Social Content', 'Brand Animation'],
        'media'      => 'assets/img/reel/social-media-animated.mp4',
        'media_type' => 'video',
        'image'      => 'assets/img/reel/social-media-animated.webp',
    ],
    [
        'category'   => 'motion-graphics',
        'title'      => 'Animated Character Sequence',
        'client'     => 'Confidential',
        'summary'    => 'Character-led animation sequence combining effects, atmosphere and typography into a short narrative piece.',
        'services'   => ['2D Animation', 'VFX', 'Motion Graphics'],
        'media'      => 'assets/img/reel/animated-chinese.mp4',
        'media_type' => 'video',
        'image'      => 'assets/img/reel/animated-chinese.webp',
    ],
    [
        'category'   => 'video-production',
        'title'      => 'MIZAR — Fragrance Film, Miss Nicaragua',
        'client'     => 'Miss Nicaragua',
        'summary'    => 'Product film for a fragrance launch tied to the national pageant, shot and edited for broadcast and social delivery.',
        'services'   => ['Video Production', 'Product Film', 'Colour Grading'],
        'media'      => 'assets/img/reel/la-fragancia.mp4',
        'media_type' => 'video',
        'image'      => 'assets/img/reel/la-fragancia.webp',
    ],
    [
        'category'   => 'video-production',
        'title'      => 'Miss Mundo — Event Coverage',
        'client'     => 'Miss Mundo',
        'summary'    => 'Event coverage cut into a highlight film that captures the scale, locations and atmosphere of the production.',
        'services'   => ['Video Production', 'Event Coverage', 'Post-production'],
        'media'      => 'assets/img/reel/miss-mundo.mp4',
        'media_type' => 'video',
        'image'      => 'assets/img/reel/miss-mundo.webp',
    ],
    [
        'category'   => 'video-production',
        'title'      => 'On-location Interview Film',
        'client'     => 'Editorial Client',
        'summary'    => 'Outdoor interview production with controlled framing and sound, edited around a single clear narrative thread.',
        'services'   => ['Video Production', 'Interview', 'Editing'],
        'media'      => 'assets/img/reel/interview.mp4',
        'media_type' => 'video',
        'image'      => 'assets/img/reel/interview.webp',
    ],
    [
        'category'   => 'video-production',
        'title'      => 'Evolution of Videogames — Editorial Film',
        'client'     => 'Editorial Piece',
        'summary'    => 'Long-form editorial video combining gameplay archive, graphics and narration to trace a subject across decades.',
        'services'   => ['Video Editing', 'Editorial', 'Archive Research'],
        'media'      => 'assets/img/reel/evolution-videogames.mp4',
        'media_type' => 'video',
        'image'      => 'assets/img/reel/evolution-videogames.webp',
    ],
    [
        'category'   => 'video-production',
        'title'      => 'DJI Mini 3 — Instructional Video',
        'client'     => 'Instructional Series',
        'summary'    => 'Step-by-step video walking the viewer through setting up and flying the drone safely.',
        'services'   => ['Video Production', 'Instructional', 'Editing'],
        'media'      => 'assets/img/reel/dji-mini-3.mp4',
        'media_type' => 'video',
        'image'      => 'assets/img/reel/dji-mini-3.webp',
    ],
    [
        'category'   => 'video-production',
        'title'      => 'Instructional Training Video',
        'client'     => 'Instructional Series',
        'summary'    => 'Training video structured into clear chapters with on-screen guidance to support learning and retention.',
        'services'   => ['Video Production', 'Training Content', 'Editing'],
        'media'      => 'assets/img/reel/instructional-video.mp4',
        'media_type' => 'video',
        'image'      => 'assets/img/reel/instructional-video.webp',
    ],
    [
        'category'   => 'digital-marketing',
        'title'      => 'Animated Campaign Flyer',
        'client'     => 'Campaign',
        'summary'    => 'Vertical animated version of a print flyer, adapted for paid social and messaging channels.',
        'services'   => ['Animated Ads', 'Social Campaign', 'Motion Graphics'],
        'media'      => 'assets/img/reel/flyer-animado.mp4',
        'media_type' => 'video',
        'image'      => 'assets/img/reel/flyer-animado.webp',
    ],
    [
        'category'   => 'digital-marketing',
        'title'      => 'Fashion Class — Social Ad',
        'client'     => 'Fashion Educator',
        'summary'    => 'Short-form ad creative promoting a class launch, built around a strong hook in the opening seconds.',
        'services'   => ['Social Ads', 'Paid Media Creative', 'Video Editing'],
        'media'      => 'assets/img/reel/clase-fashion.mp4',
        'media_type' => 'video',
        'image'      => 'assets/img/reel/clase-fashion.webp',
    ],
    [
        'category'   => 'digital-marketing',
        'title'      => 'Modern Woman — Social Ad',
        'client'     => 'Fashion Brand',
        'summary'    => 'Campaign ad creative adapted for Facebook and Instagram placements with brand-consistent pacing and typography.',
        'services'   => ['Social Ads', 'Paid Media Creative', 'Video Editing'],
        'media'      => 'assets/img/reel/modern-woman.mp4',
        'media_type' => 'video',
        'image'      => 'assets/img/reel/modern-woman.webp',
    ],
    [
        'category'   => 'digital-marketing',
        'title'      => 'ELUR — “Marketing de Otro Mundo” Key Visual',
        'client'     => 'ELUR',
        'summary'    => 'Agency key visual built on an astronaut concept to carry the “marketing from another world” positioning across social.',
        'services'   => ['Key Visual', 'Social Graphics', 'Art Direction'],
        'media'      => 'assets/img/reel/elur.webp',
        'media_type' => 'image',
        'image'      => 'assets/img/reel/elur.webp',
    ],
    [
        'category'   => 'digital-marketing',
        'title'      => 'Rocha — Painting Service Ad',
        'client'     => 'Rocha (Residential & Commercial)',
        'summary'    => 'Service ad pairing a clear offer with a phone number for direct response, part of a templated campaign set.',
        'services'   => ['Campaign Design', 'Social Graphics', 'Lead Generation'],
        'media'      => 'assets/img/reel/rocha-1.webp',
        'media_type' => 'image',
        'image'      => 'assets/img/reel/rocha-1.webp',
    ],
    [
        'category'   => 'digital-marketing',
        'title'      => 'Rocha — Vinyl Flooring Ad',
        'client'     => 'Rocha (Residential & Commercial)',
        'summary'    => 'Flooring service ad built on the same campaign template so the whole set reads as one brand.',
        'services'   => ['Campaign Design', 'Social Graphics', 'Brand Consistency'],
        'media'      => 'assets/img/reel/rocha-2.webp',
        'media_type' => 'image',
        'image'      => 'assets/img/reel/rocha-2.webp',
    ],
    [
        'category'   => 'digital-marketing',
        'title'      => 'Rocha — Plumbing Service Ad',
        'client'     => 'Rocha (Residential & Commercial)',
        'summary'    => 'Plumbing service promotion designed to stand out in the feed while matching the wider campaign.',
        'services'   => ['Campaign Design', 'Social Graphics', 'Lead Generation'],
        'media'      => 'assets/img/reel/rocha-3.webp',
        'media_type' => 'image',
        'image'      => 'assets/img/reel/rocha-3.webp',
    ],
    [
        'category'   => 'digital-marketing',
        'title'      => 'Taller Durán — Truck Diagnostics Banner',
        'client'     => 'Taller Durán',
        'summary'    => 'Wide-format banner for a heavy-vehicle workshop, built for web and social headers with a single clear message.',
        'services'   => ['Banner Design', 'Campaign Design', 'Digital Advertising'],
        'media'      => 'assets/img/reel/taller-duran.webp',
        'media_type' => 'image',
        'image'      => 'assets/img/reel/taller-duran.webp',
    ],
    [
        'category'   => 'digital-marketing',
        'title'      => '“Frase del Día” — Daily Quote Post',
        'client'     => 'Media Ministry',
        'summary'    => 'Recurring quote-of-the-day post template designed so new content can be dropped in without redesigning the layout.',
        'services'   => ['Social Graphics', 'Template System', 'Content Design'],
        'media'      => 'assets/img/reel/campaign-piece-1.webp',
        'media_type' => 'image',
        'image'      => 'assets/img/reel/campaign-piece-1.webp',
    ],
    [
        'category'   => 'digital-marketing',
        'title'      => 'Verano Sobre Ruedas — Mitsubishi L200',
        'client'     => 'Car Rental Campaign',
        'summary'    => 'Vehicle rental campaign piece combining the model, destination imagery and booking contact in one layout.',
        'services'   => ['Campaign Design', 'Social Graphics', 'Automotive'],
        'media'      => 'assets/img/reel/brand-piece-1.webp',
        'media_type' => 'image',
        'image'      => 'assets/img/reel/brand-piece-1.webp',
    ],
    [
        'category'   => 'digital-marketing',
        'title'      => 'Verano Sobre Ruedas — Toyota Corolla',
        'client'     => 'Car Rental Campaign',
        'summary'    => 'Second vehicle in the same campaign set, built on a shared template so the range stays visually consistent.',
        'services'   => ['Campaign Design', 'Social Graphics', 'Automotive'],
        'media'      => 'assets/img/reel/brand-piece-2.webp',
        'media_type' => 'image',
        'image'      => 'assets/img/reel/brand-piece-2.webp',
    ],
    [
        'category'   => 'digital-marketing',
        'title'      => 'Verano Sobre Ruedas — 25% Off Promotion',
        'client'     => 'Car Rental Campaign',
        'summary'    => 'Promotional variant leading with the discount and a WhatsApp call to action for direct bookings.',
        'services'   => ['Promotional Design', 'Social Graphics', 'Lead Generation'],
        'media'      => 'assets/img/reel/brand-piece-3.webp',
        'media_type' => 'image',
        'image'      => 'assets/img/reel/brand-piece-3.webp',
    ],
    [
        'category'   => 'digital-marketing',
        'title'      => 'Verano Sobre Ruedas — SUV Promotion',
        'client'     => 'Car Rental Campaign',
        'summary'    => 'SUV variant of the seasonal promotion, adapted for story placement with the same offer structure.',
        'services'   => ['Promotional Design', 'Social Graphics', 'Automotive'],
        'media'      => 'assets/img/reel/brand-piece-4.webp',
        'media_type' => 'image',
        'image'      => 'assets/img/reel/brand-piece-4.webp',
    ],
    [
        'category'   => 'graphic-design',
        'title'      => 'American Social — Cocktail Post',
        'client'     => 'American Social',
        'summary'    => 'Food-and-drink social post pairing cocktail photography with editorial typography for a bar and restaurant brand.',
        'services'   => ['Social Graphics', 'Food & Drink', 'Typography'],
        'media'      => 'assets/img/reel/amso-2.webp',
        'media_type' => 'image',
        'image'      => 'assets/img/reel/amso-2.webp',
    ],
    [
        'category'   => 'graphic-design',
        'title'      => 'American Social — Burger Promotion',
        'client'     => 'American Social',
        'summary'    => 'Promotional layout built around product photography, with the offer and opening days set into the type treatment.',
        'services'   => ['Social Graphics', 'Food & Drink', 'Promotional Design'],
        'media'      => 'assets/img/reel/amso-3.webp',
        'media_type' => 'image',
        'image'      => 'assets/img/reel/amso-3.webp',
    ],
    [
        'category'   => 'graphic-design',
        'title'      => 'Grupo Amtra — Multimodal Freight Ad',
        'client'     => 'Grupo Amtra Logística',
        'summary'    => 'Logistics advert combining 3D cargo imagery with the service message and contact details for a freight operator.',
        'services'   => ['Advertising Design', '3D Composition', 'Corporate Graphics'],
        'media'      => 'assets/img/reel/amtra.webp',
        'media_type' => 'image',
        'image'      => 'assets/img/reel/amtra.webp',
    ],
    [
        'category'   => 'graphic-design',
        'title'      => 'CNEA — Institutional Logo',
        'client'     => 'CNEA Nicaragua',
        'summary'    => 'Institutional logo and lockup for a national accreditation council, delivered in vector for print and digital use.',
        'services'   => ['Logo Design', 'Brand Identity', 'Vector Artwork'],
        'media'      => 'assets/img/reel/cnea.webp',
        'media_type' => 'image',
        'image'      => 'assets/img/reel/cnea.webp',
    ],
    [
        'category'   => 'graphic-design',
        'title'      => 'Exell Rocha Painting — Services Card',
        'client'     => 'Exell Rocha Painting Inc',
        'summary'    => 'Services and contact card laying out what the company offers with iconography, built for social and print handouts.',
        'services'   => ['Graphic Design', 'Iconography', 'Corporate Collateral'],
        'media'      => 'assets/img/reel/exell-rocha.webp',
        'media_type' => 'image',
        'image'      => 'assets/img/reel/exell-rocha.webp',
    ],
    [
        'category'   => 'graphic-design',
        'title'      => '“All You Need Is Love and Wine” — Wine Promotion',
        'client'     => 'Wine Retailer',
        'summary'    => 'Product-led promotional design using low-key photography and restrained typography for a premium wine listing.',
        'services'   => ['Promotional Design', 'Product Layout', 'Art Direction'],
        'media'      => 'assets/img/reel/gr.webp',
        'media_type' => 'image',
        'image'      => 'assets/img/reel/gr.webp',
    ],
    [
        'category'   => 'graphic-design',
        'title'      => 'Argentina vs Nicaragua — Matchday Graphic',
        'client'     => 'Canal 6 Nicaragua',
        'summary'    => 'Broadcast matchday graphic built to a repeatable template so every fixture keeps the same visual language.',
        'services'   => ['Sports Design', 'Broadcast Graphics', 'Template System'],
        'media'      => 'assets/img/reel/nicaragua-argentina.webp',
        'media_type' => 'image',
        'image'      => 'assets/img/reel/nicaragua-argentina.webp',
    ],
    [
        'category'   => 'graphic-design',
        'title'      => 'Low-poly Animal Illustration',
        'client'     => 'POFI',
        'summary'    => 'Custom low-poly illustration produced as a brand asset, built to hold up at both icon and poster scale.',
        'services'   => ['Illustration', 'Vector Artwork', 'Brand Asset'],
        'media'      => 'assets/img/reel/pofi.webp',
        'media_type' => 'image',
        'image'      => 'assets/img/reel/pofi.webp',
    ],
    [
        'category'   => 'graphic-design',
        'title'      => 'TÓMAME — Magazine Cover, Florida Edition',
        'client'     => 'TÓMAME Magazine',
        'summary'    => 'Cover design for the first Florida edition of an entrepreneurs’ magazine, combining skyline photography with script typography.',
        'services'   => ['Editorial Design', 'Cover Design', 'Print Design'],
        'media'      => 'assets/img/reel/tomame.webp',
        'media_type' => 'image',
        'image'      => 'assets/img/reel/tomame.webp',
    ],
    [
        'category'   => 'graphic-design',
        'title'      => 'Tex Mex — Drinks Menu Graphic',
        'client'     => 'Tex Mex (Miami)',
        'summary'    => 'Menu graphic for the drinks range, built on the restaurant’s brush-and-colour system with product photography.',
        'services'   => ['Menu Design', 'Food Photography Layout', 'Brand System'],
        'media'      => 'assets/img/reel/tex-mex-1.webp',
        'media_type' => 'image',
        'image'      => 'assets/img/reel/tex-mex-1.webp',
    ],
    [
        'category'   => 'graphic-design',
        'title'      => 'Tex Mex — Burritos Graphic',
        'client'     => 'Tex Mex (Miami)',
        'summary'    => 'Product graphic for the burrito line, following the same template so the whole menu set stays consistent.',
        'services'   => ['Menu Design', 'Social Graphics', 'Brand System'],
        'media'      => 'assets/img/reel/tex-mex-2.webp',
        'media_type' => 'image',
        'image'      => 'assets/img/reel/tex-mex-2.webp',
    ],
    [
        'category'   => 'graphic-design',
        'title'      => 'Tex Mex — Guacamole Graphic',
        'client'     => 'Tex Mex (Miami)',
        'summary'    => 'Single-product feature graphic designed for appetite appeal while carrying the brand palette and contact details.',
        'services'   => ['Menu Design', 'Social Graphics', 'Brand System'],
        'media'      => 'assets/img/reel/tex-mex-3.webp',
        'media_type' => 'image',
        'image'      => 'assets/img/reel/tex-mex-3.webp',
    ],
    [
        'category'   => 'graphic-design',
        'title'      => 'Tex Mex — Fast Food Graphic',
        'client'     => 'Tex Mex (Miami)',
        'summary'    => 'Category graphic for the fast-food range, using the same layout grid as the rest of the menu set.',
        'services'   => ['Menu Design', 'Social Graphics', 'Template System'],
        'media'      => 'assets/img/reel/tex-mex-4.webp',
        'media_type' => 'image',
        'image'      => 'assets/img/reel/tex-mex-4.webp',
    ],
    [
        'category'   => 'graphic-design',
        'title'      => 'Tex Mex — Bowl Feature Graphic',
        'client'     => 'Tex Mex (Miami)',
        'summary'    => 'Feature graphic for a bowl dish, built to sit alongside the rest of the campaign without repeating it.',
        'services'   => ['Menu Design', 'Food Photography Layout', 'Brand System'],
        'media'      => 'assets/img/reel/tex-mex-5.webp',
        'media_type' => 'image',
        'image'      => 'assets/img/reel/tex-mex-5.webp',
    ],
    [
        'category'   => 'graphic-design',
        'title'      => 'Tex Mex — “The Best Flavor” Promotion',
        'client'     => 'Tex Mex (Miami)',
        'summary'    => 'Promotional post in the brand’s secondary colourway, leading with an order-now call to action.',
        'services'   => ['Promotional Design', 'Social Graphics', 'Brand System'],
        'media'      => 'assets/img/reel/tex-mex-6.webp',
        'media_type' => 'image',
        'image'      => 'assets/img/reel/tex-mex-6.webp',
    ],
];

$AboutContent = [
    'who_we_are' => 'Falchion Digital Studios is a multidisciplinary creative studio based in Liverpool, United Kingdom, made up of a team passionate about digital arts with over 10 years of experience in television, video production, design, and commercial animation. Our company provides professional solutions to clients across Europe and the Americas.',
    'mission' => 'Our mission is to offer a centralized service that combines diverse skills to meet the various needs of a company, a growing entrepreneur, or a content creator. We are committed to integrating each project as if it were our own, ensuring quality, dedication, and effective results.',
    'vision' => 'Our vision is to establish ourselves as a creative studio in continuous growth, driving the development of our clients through comprehensive and innovative solutions in video, design, and animation, while continuously expanding our service catalog to cover new disciplines in the digital industry.',
    'values_intro' => 'Our brand is inspired by the noble values of medieval knights. We believe in trust and loyalty as the foundation of every relationship, discipline and leadership as drivers of growth, and passion and creativity as the essence of every project.',
    'history' => 'Falchion draws inspiration from a historical legacy, from the medieval warriors who wielded the sword that gives our brand its name. The falchion symbolized courage, strength, and loyalty. Today, those same values guide us in defending and enhancing our clients ideas with the same determination those knights used to protect what they valued most.',
    'cta' => 'Whether you are a growing entrepreneur, an established company, or a content creator, we are here to help you reach your full potential. Write to us and book a call to discover how we can elevate your brand.',
];

$Values = [
    ['title' => 'Trust & Loyalty', 'text' => 'We build long-term relationships based on honesty, consistency and accountability.'],
    ['title' => 'Discipline & Leadership', 'text' => 'We bring structure, clear direction and professional standards to every stage of production.'],
    ['title' => 'Passion & Creativity', 'text' => 'We combine craft and imagination to create work that feels distinctive and purposeful.'],
];

$BlogPosts = require __DIR__ . '/data/blog-posts.php';

$FooterServices = array_map(
    static function (array $service): array {
        return ['label' => $service['title'], 'path' => 'service/' . $service['slug'] . '.php'];
    },
    $Services
);
