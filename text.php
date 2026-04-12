<?php
@session_start();

require_once __DIR__ . '/i18n.php';
i18n_start_buffer();

/*=========================
   PAGE NAME (Routing simple)
   =========================*/
$full_name  = $_SERVER['PHP_SELF'] ?? '';
$name_array = explode('/', $full_name);
$count      = count($name_array);
$page_name  = $name_array[$count - 1] ?? '';

if      ($page_name == 'index.php' || $page_name == 'index')        { $namepage = "Home"; }
elseif ($page_name == 'about.php' || $page_name == 'about')        { $namepage = "About"; }
elseif ($page_name == 'services.php')     { $namepage = "Services"; }
elseif ($page_name == 'testimonials.php') { $namepage = "Reviews"; }
elseif ($page_name == 'reviews.php' || $page_name == 'reviews')      { $namepage = "Reviews"; }
elseif ($page_name == 'projects.php')     { $namepage = "Projects"; }
elseif ($page_name == 'thank-you.php')    { $namepage = "Thank You"; }
elseif ($page_name == '404.php')          { $namepage = "Not Found"; }
elseif ($page_name == 'contact.php' || $page_name == 'contact')      { $namepage = "Contact"; }
else                                      { $namepage = ucfirst(str_replace('.php', '', $page_name)); }

/*=========================
   INFO GENERAL (Actualizada)
   =========================*/
$Company      = "Falchion Digital Studios";
$CustomerName = "";

function detectBaseURL() {
  $isVercel = !empty($_SERVER['VERCEL']) || !empty($_ENV['VERCEL']);
  $proto    = $_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '';
  $scheme   = ($isVercel || $proto === 'https' || (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')) ? 'https' : 'http';
  $host   = $_SERVER['HTTP_HOST'] ?? 'localhost';
  $script = $_SERVER['SCRIPT_NAME'] ?? '';
  $dir    = rtrim(str_replace('\\', '/', dirname($script)), '/.');
  $path   = $dir ? $dir . '/' : '/';
  return $scheme . '://' . $host . $path;
}

$BaseURL   = rtrim(detectBaseURL(), '/') . '/';
$Domain    = "https://falchionstudios.co.uk/";
$ServicesLabel  = "Brand Strategy, Paid Media, SEO & Conversion Systems";
$MAVEN     = "";
$Address   = "Liverpool, UK";
$PhoneName = "";
$Phone2Name = "";

$Phone     = "";
$Phone2    = "";

function telRef($p) {
  $p = trim((string) $p);
  if ($p === '') return '';
  $clean = str_replace(str_split('()-/\\:?"<>|., '), '', $p);
  return "tel:" . $clean;
}
$PhoneRef  = telRef($Phone);
$PhoneRef2 = telRef($Phone2 ?? '');

function slugify($text) {
  $text = strtolower(trim($text));
  $text = preg_replace('/[^a-z0-9]+/i', '-', $text);
  return trim($text, '-') ?: 'service';
}

// WhatsApp link
$whatsapp_num = preg_replace('/\D+/', '', $Phone);
$whatsapp = '';
if ($whatsapp_num !== '') {
  $whatsapp = "https://api.whatsapp.com/send?phone=" . $whatsapp_num . "&text=" . rawurlencode("Hello {$Company}! I'd like to request more information.");
}

$Mail    = "";
$MailRef = $Mail !== '' ? "mailto:" . $Mail : "";
$LogoPath = 'assets/img/logo.jpeg';

/*=========================
   GENERAL MESSAGES
   =========================*/
$ServicesLabel  = "Brand Strategy, Paid Media, SEO & Conversion Systems";
$Estimates      = "Free Growth Audit & Funnel Review";
$Payment        = "";
$Experience     = "Full-Funnel Campaign Thinking";
$Schedule       = "Strategy sessions by appointment";
$Coverage       = "Liverpool HQ with UK and global campaign delivery";
$LicenseNote    = "Strategy-Led Performance Marketing";
$BilingualNote  = "Bilingual Campaign Messaging (EN/ES)";
$TypeOfService  = "Brand, Performance & Content Marketing";

/*=========================
   BRAND COLORS
   =========================*/
$BrandColors = [
  'primary'       => '#1E1A15',
  'primary_rgb'   => '30, 26, 21',
  'secondary'     => '#050505',
  'secondary_rgb' => '5, 5, 5',
  'accent'        => '#E8D24F',
  'accent_rgb'    => '232, 210, 79',
  'neutral'       => '#F4EFE6',
  'white'         => '#FFFFFF'
];

/*=========================
   SERVICE AREAS
   =========================*/
$Areas = [
  "Liverpool, UK",
  "Manchester, UK",
  "London, UK",
  "Remote Worldwide"
];

/*=========================
   MAPA Y REDES SOCIALES
   =========================*/
$GoogleMap = '';
$facebook  = "";
$instagram = "";
$google = "";
$tiktok = "";
$messenger = "";

$DirectoryLinks = [];

$GoogleReviews = '';

$DirectoryReviewItems = [];

$GoogleReviewItems = $DirectoryReviewItems;

$ReviewSourceSummaries = [];

$DetailedReviewItems = [];
/*=========================
   SEO & BRANDING SLOGANS
   =========================*/
$Phrase = [
  "Brand Systems Built to Move Revenue",
  "Paid, SEO and Conversion Strategy in One Team",
  "Creative Direction Backed by Reporting That Matters"
];

/*=========================
   HOME SECTION
   =========================*/
$Home = [
  "Falchion Studios helps ambitious brands turn scattered marketing into a focused growth system across strategy, acquisition, content and conversion.",
  "We build campaigns and digital experiences that make positioning sharper, traffic more qualified and reporting easier to act on."
];

/*=========================
   ABOUT SECTION
   =========================*/
$About = [
  "Based in Liverpool, we operate like an embedded marketing partner for companies that need stronger messaging, cleaner funnels and performance they can actually measure.",
  "Our work connects brand strategy, paid acquisition, SEO, conversion design and analytics into one operating model built to create momentum."
];

/*=========================
    MISSION & VISION
    =========================*/
$Mission = "To turn marketing into a clear growth engine through sharper positioning, stronger campaigns and decisions backed by useful data.";
$Vision  = "To be the agency brands call when they need strategic clarity and execution that moves pipeline, not vanity metrics.";

/*=========================
   SERVICES SECTION
   =========================*/
$SN = $SD = $ExSD = [];

$SN[1] = "Brand Strategy & Positioning";
$SD[1] = "Clarify what your brand stands for, how it should sound and where it should compete so every campaign starts from a sharper strategic brief.";

$SN[2] = "Paid Media Campaigns";
$SD[2] = "Plan, launch and optimize paid search and paid social campaigns around clear commercial goals, not wasted platform spend.";

$SN[3] = "SEO & Content Systems";
$SD[3] = "Build search visibility with technical SEO, content architecture and editorial planning designed to capture demand over time.";

$SN[4] = "Landing Pages & CRO";
$SD[4] = "Turn campaign traffic into qualified action with conversion-focused pages, stronger offers and cleaner user journeys.";

$SN[5] = "Analytics & Attribution";
$SD[5] = "Create reporting systems that show what is driving pipeline, where friction lives and which channels deserve more investment.";

$OtherServices = [
  "Marketing Automation",
  "Campaign Launch Support",
  "Fractional Marketing Leadership"
];

$ServicesByCategory = [
  [
    'label' => 'Core Capabilities',
    'summary_slug' => 'growth-marketing',
    'service_slugs' => [
      'brand-strategy-positioning',
      'paid-media-campaigns',
      'seo-content-systems',
      'landing-pages-cro',
      'analytics-attribution'
    ]
  ]
];

$Badges = [
  $Estimates,
  $Experience,
  $Coverage,
  $LicenseNote,
  $BilingualNote
];

/*=========================
   SEO EXTRACTS
   =========================*/
$ExAbout = substr($About[0], 0, 145) . '...';
$ExHome  = substr($Home[0],  0, 95)  . '...';
for ($i = 1; $i <= count($SN); $i++) {
  if (isset($SD[$i])) {
    $ExSD[$i] = substr($SD[$i], 0, 120) . '...';
  }
}

/*=========================
   SERVICE MAP (slugs + URLs)
   =========================*/
$ServicesList = [];
for ($i = 1; $i <= count($SN); $i++) {
  if (empty($SN[$i])) continue;
  $slug = slugify($SN[$i]);
  $ServicesList[$slug] = [
    'id'          => $i,
    'name'        => $SN[$i],
    'description' => $SD[$i] ?? '',
    'excerpt'     => $ExSD[$i] ?? '',
    'slug'        => $slug,
    'file'        => 'services.php',
    'url'         => 'services.php#' . $slug
  ];
}

// Service groups used for section labels and filtering.
$OtherServicesLandingSlugs = [];

// Only keep the service set requested by client across the full website.
$PrimaryServiceSlugs = [
  'brand-strategy-positioning',
  'paid-media-campaigns',
  'seo-content-systems',
  'landing-pages-cro',
  'analytics-attribution'
];
$AllowedServiceSlugs = array_merge($PrimaryServiceSlugs, $OtherServicesLandingSlugs);
foreach (array_keys($ServicesList) as $serviceSlug) {
  if (!in_array($serviceSlug, $AllowedServiceSlugs, true)) {
    unset($ServicesList[$serviceSlug]);
  }
}

$serviceCategoryMap = [];
if (!empty($ServicesByCategory) && is_array($ServicesByCategory)) {
  foreach ($ServicesByCategory as $category) {
    if (!is_array($category)) continue;

    $categoryLabel = trim((string) ($category['label'] ?? 'General'));
    $categorySlug = trim((string) ($category['summary_slug'] ?? ''));
    if ($categorySlug === '') $categorySlug = slugify($categoryLabel);

    $allSlugs = [];
    if (!empty($category['summary_slug'])) {
      $allSlugs[] = trim((string) $category['summary_slug']);
    }

    if (!empty($category['service_slugs']) && is_array($category['service_slugs'])) {
      foreach ($category['service_slugs'] as $serviceSlug) {
        $serviceSlug = trim((string) $serviceSlug);
        if ($serviceSlug !== '') $allSlugs[] = $serviceSlug;
      }
    }

    foreach (array_unique($allSlugs) as $serviceSlug) {
      if ($serviceSlug === '') continue;
      $serviceCategoryMap[$serviceSlug] = [
        'category_slug' => $categorySlug,
        'category_label' => $categoryLabel
      ];
    }
  }
}

foreach ($ServicesList as $serviceSlug => &$serviceData) {
  if (isset($serviceCategoryMap[$serviceSlug])) {
    $serviceData['category_slug'] = $serviceCategoryMap[$serviceSlug]['category_slug'];
    $serviceData['category_label'] = $serviceCategoryMap[$serviceSlug]['category_label'];
  } else {
    $serviceData['category_slug'] = 'general';
    $serviceData['category_label'] = 'General';
  }
}
unset($serviceData);

/*=========================
   DISPLAY SERVICES
   =========================*/
$ServicesDisplayList = [];
if (!empty($ServicesList) && is_array($ServicesList)) {
  $ServicesDisplayList = array_values($ServicesList);
  usort($ServicesDisplayList, static function ($a, $b) {
    return (int) ($a['id'] ?? 0) <=> (int) ($b['id'] ?? 0);
  });
}

/*=========================
   SERVICE DETAIL CONTENT
   =========================*/
$ServiceDetails = [
  'brand-strategy-positioning' => [
    'kicker'     => 'Strategic Foundation',
    'headline'   => 'Positioning That Gives Every Campaign Direction',
    'paragraphs' => [
      'We define audience, value proposition, messaging hierarchy and market posture so the rest of your marketing stops fighting itself.'
    ],
    'bullets'    => [
      'Messaging architecture',
      'Offer refinement',
      'Audience and channel alignment'
    ]
  ],
  'paid-media-campaigns' => [
    'kicker'     => 'Acquisition Engine',
    'headline'   => 'Paid Media Built Around Revenue Signals',
    'paragraphs' => [
      'From account structure to creative testing, we run paid campaigns with tighter targeting, stronger offers and faster feedback loops.'
    ],
    'bullets'    => [
      'Paid search and social',
      'Creative testing',
      'Budget and CPA control'
    ]
  ],
  'seo-content-systems' => [
    'kicker'     => 'Compounding Demand',
    'headline'   => 'SEO and Content That Build Durable Visibility',
    'paragraphs' => [
      'We connect technical SEO, content planning and page architecture so your brand ranks for the topics that actually support pipeline.'
    ],
    'bullets'    => [
      'Keyword and intent mapping',
      'Content clusters',
      'Technical SEO fixes'
    ]
  ],
  'landing-pages-cro' => [
    'kicker'     => 'Conversion Layer',
    'headline'   => 'Pages and Funnels Designed to Convert Attention',
    'paragraphs' => [
      'Campaigns fail when the landing experience is weak. We redesign journeys, tighten offers and remove friction where drop-off happens.'
    ],
    'bullets'    => [
      'Offer framing',
      'Landing page design',
      'CRO test backlog'
    ]
  ],
  'analytics-attribution' => [
    'kicker'     => 'Decision Layer',
    'headline'   => 'Reporting That Makes Budget Decisions Easier',
    'paragraphs' => [
      'We build dashboards and reporting logic that show performance clearly enough for teams to scale the right channels faster.'
    ],
    'bullets'    => [
      'Channel reporting',
      'Attribution views',
      'Executive dashboards'
    ]
  ]
];

/*=========================
  WHY CHOOSE (Section copy)
  =========================*/
$WhyChoose = [
  'eyebrow' => 'Full-Funnel Marketing',
  'title_pre' => 'Why Choose',
  'intro' => 'Strategy, creative, media and reporting live inside the same system so execution stays aligned to growth.',
  'cards' => [
    [
      'title' => 'Strategy Before Tactics',
      'text'  => 'We start with positioning, priorities and audience truth so channel work does not become expensive guesswork.'
    ],
    [
      'title' => 'Creative With Intent',
      'text'  => 'Campaign assets, landing pages and messaging are built to move the next commercial action, not just look polished.'
    ],
    [
      'title' => 'Reporting Without Fluff',
      'text'  => 'You get clearer visibility into what is working, what is stalling and what should happen next.',
      'btn'   => [
        'href' => 'contact',
        'text' => 'Book Growth Audit'
      ]
    ],
  ],
];

/*=========================
   PAYMENT METHODS
   =========================*/
function paymentList($txt) {
  $txt = trim((string) $txt);
  if ($txt === '') return [];
  $parts = array_map('trim', explode(',', $txt));
  return array_values(array_filter($parts, static function ($part) {
    return $part !== '';
  }));
}
$PaymentMethods = paymentList($Payment);

/*=========================
   EXPERIENCE CALCULATION
   =========================*/
$ExperienceYears = (int) filter_var($Experience, FILTER_SANITIZE_NUMBER_INT);
if ($ExperienceYears < 0) $ExperienceYears = 0;

/*=========================
   COPY / UI TEXT
   =========================*/
$NavCopy = [
  'home' => 'Home',
  'about' => 'About',
  'services' => 'Services',
  'projects' => 'Projects',
  'reviews' => 'Reviews',
  'contact' => 'Contact',
  'other_services' => 'Other Services',
  'cta' => 'Get My Free SEO Audit',
  'cta_mobile' => 'Get My Free SEO Audit',
  'explore_service' => 'Explore Service',
  'view_services' => 'View Services',
  'contact_today' => 'Contact Us Today',
  'leave_review' => 'Leave a Review',
  'read_reviews' => 'Read Reviews'
];

$HeaderCopy = [
  'menu_close' => 'Close Menu',
  'menu_toggle' => 'Toggle Menu',
  'social_titles' => [
    'facebook' => 'Facebook',
    'messenger' => 'Messenger',
    'google' => 'Google Reviews',
    'instagram' => 'Instagram',
    'tiktok' => 'TikTok',
    'whatsapp' => 'WhatsApp'
  ]
];

$FooterCopy = [
  'desc' => $ServicesLabel,
  'titles' => [
    'company' => 'Company',
    'services' => 'Services',
    'contact' => 'Contact Us'
  ],
  'labels' => [
    'location' => 'Location',
    'phone' => 'Phone',
    'hours' => 'Hours'
  ],
  'copyright_suffix' => 'All Rights Reserved.'
];

$PageHeroCopy = [
  'default' => [
    'title' => 'Our Services',
    'desc' => $ServicesLabel,
    'bg' => 'assets/img/hero/hero1.svg'
  ],
  'projects' => [
    'title' => 'Selected Web Projects',
    'desc' => '',
    'bg' => 'assets/img/hero/hero2.svg'
  ],
  'about' => [
    'title' => 'About ' . $Company,
    'desc' => $About[0],
    'bg' => 'assets/img/hero/hero3.svg'
  ],
  'contact' => [
    'title' => 'Get in Touch',
    'desc' => '',
    'bg' => 'assets/img/hero/hero1.svg'
  ],
  'reviews' => [
    'title' => 'Client Feedback',
    'desc' => '',
    'bg' => 'assets/img/hero/hero2.svg'
  ],
  'other' => [
    'title' => 'Other Services',
    'desc' => '',
    'bg' => 'assets/img/hero/hero3.svg'
  ]
];

$HomeHeroCopy = [
  'headline' => 'Creative Digital Studio for Brands, Businesses & Content Creators',
  'title' => 'FALCHION DIGITAL STUDIOS',
  'sub' => "We design, produce and develop powerful visual content, websites and digital experiences that elevate brands and connect with audiences.",
  'cta_primary' => 'Book a Call',
  'cta_secondary' => 'View Our Work',
  'cta_primary_href' => 'contact#contact-form',
  'cta_secondary_href' => 'portfolio',
  'slide_statuses' => [
    'Brand Strategy',
    'Paid Media',
    'SEO Systems',
    'Conversion Design'
  ],
  'slide_descriptions' => [
    'Positioning, messaging and channel planning built to give marketing teams a sharper operating system.',
    'Performance campaigns structured around qualified demand, creative testing and cleaner reporting.',
    'Technical SEO, content direction and site architecture designed for discoverability and compounding growth.',
    'Landing pages and funnel experiences refined to increase action, clarity and measurable commercial outcomes.'
  ],
  'prev_label' => 'Previous slide',
  'next_label' => 'Next slide',
  'slide_alt_prefix' => 'Falchion Signal Slide',
  'thumb_alt_prefix' => 'Falchion Slide Thumbnail'
];

$HomeAboutCopy = [
  'eyebrow' => 'Liverpool-Based Web Design & SEO',
  'title' => 'Built for Search,',
  'title_strong' => 'Designed to Convert.',
  'description' => $About[0],
  'badge_label' => $Experience,
  'images' => [
    'back' => [
      'src' => 'assets/img/about-agency.svg',
      'alt' => 'Falchion Studios strategic growth visual'
    ],
    'front' => [
      'src' => 'assets/img/about-agency.svg',
      'alt' => 'Falchion Studios interface planning visual'
    ]
  ],
  'features' => [
    [
      'icon' => 'fa-magnifying-glass-chart',
      'title' => 'SEO Integrated',
      'text' => $WhyChoose['cards'][0]['text'] ?? ''
    ],
    [
      'icon' => 'fa-shield-halved',
      'title' => 'Performance Focus',
      'text' => $LicenseNote
    ],
    [
      'icon' => 'fa-comments',
      'title' => 'Bilingual Content',
      'text' => $BilingualNote
    ],
    [
      'icon' => 'fa-globe',
      'title' => 'Coverage',
      'text' => $Coverage
    ]
  ],
  'cta' => 'Learn More'
];

$AboutHeroCopy = [
  'eyebrow' => 'About ' . $Company,
  'title' => 'Creative Design Backed by Technical SEO',
  'desc' => $About[0],
  'cta_primary' => 'Our Story',
  'cta_primary_href' => '#story',
  'cta_secondary_prefix' => 'Call',
  'meta' => [
    $ServicesLabel,
    $Estimates,
    $LicenseNote,
    $BilingualNote
  ],
  'list' => [
    [
      'label' => 'Service area',
      'value' => $Coverage
    ],
    [
      'label' => 'Schedule',
      'value' => $Schedule
    ],
    [
      'label' => 'Core services',
      'value' => $TypeOfService
    ],
    [
      'label' => 'Domain',
      'value' => $Domain
    ]
  ]
];

$AboutStoryCopy = [
  'eyebrow' => 'Our Story',
  'title' => 'Where creative direction meets measurable search performance',
  'points' => [
    [
      'title' => 'Performance focus',
      'text' => $LicenseNote
    ],
    [
      'title' => 'Bilingual content',
      'text' => $BilingualNote
    ],
    [
      'title' => 'Free audit',
      'text' => $Estimates
    ]
  ],
  'actions' => [
    'primary_text' => 'Request a strategy',
    'primary_href' => 'contact',
    'secondary_prefix' => 'Email'
  ],
  'stats' => [
    'years_label' => 'Expertise',
    'services_label' => 'Core services',
    'areas_label' => 'Coverage',
    'areas_separator' => ', ',
    'areas_preview_count' => 5
  ]
];

$AboutCredentialsCopy = [
  'eyebrow' => 'Why work with us',
  'title' => 'A tighter link between design, maintenance, and SEO',
  'intro' => '',
  'list' => [
    [
      'label' => 'Domain',
      'value' => $Domain
    ],
    [
      'label' => 'Core services',
      'value' => $TypeOfService
    ],
    [
      'label' => 'Coverage',
      'value' => $Coverage
    ],
    [
      'text' => $Estimates
    ]
  ],
  'cta' => [
    'title' => 'Need a digital strategy?',
    'desc' => '',
    'primary_text' => 'Start a request',
    'primary_href' => 'contact',
    'secondary_prefix' => 'Email'
  ]
];

$AboutServicesSummaryCopy = [
  'eyebrow' => 'Services',
  'title' => 'What we deliver',
  'desc' => $TypeOfService,
  'link_label' => 'Learn more'
];

$ServicesListCopy = [
  'eyebrow' => 'Services',
  'title' => 'Digital solutions we deliver',
  'desc' => $ServicesLabel,
  'link_label' => 'Learn more'
];

$BrandsCopy = [
  'tagline' => $Coverage
];

$HomeServicesCopy = [
  'eyebrow' => 'Web & SEO',
  'title' => 'Design, SEO,',
  'title_strong' => 'and Ongoing Care',
  'desc' => $ServicesLabel,
  'link_label' => 'Explore Service',
  'more_title' => 'Need a Custom Scope?',
  'more_desc' => $Home[1],
  'more_button' => 'Send Strategy Request',
  'more_href' => 'contact'
];
$HomeMaintenanceCopy = [
  'tagline' => 'Performance Lifecycle',
  'title' => 'Optimize, Protect,',
  'title_strong' => 'Scale',
  'desc' => $Home[0],
  'cards' => [
    [
      'icon' => 'fa-object-group',
      'title' => $SN[1],
      'text' => $SD[1],
      'action' => 'See Details'
    ],
    [
      'icon' => 'fa-shield-halved',
      'title' => $SN[2],
      'text' => $SD[2],
      'action' => 'See Details'
    ],
    [
      'icon' => 'fa-chart-line',
      'title' => $SN[3],
      'text' => $SD[3],
      'action' => 'See Details'
    ],
    [
      'icon' => 'fa-pen-ruler',
      'title' => $SN[4],
      'text' => $SD[4],
      'action' => 'See Details'
    ]
  ],
  'foundation' => [
    [
      'icon' => 'fa-file-signature',
      'title' => $Estimates,
      'subtitle' => 'Custom discovery and recommendations'
    ],
    [
      'icon' => 'fa-shield-alt',
      'title' => $LicenseNote,
      'subtitle' => 'Built around measurable performance'
    ],
    [
      'icon' => 'fa-star',
      'title' => $Experience,
      'subtitle' => 'Digital craft and technical SEO'
    ]
  ]
];

$WhyCopy = [
  'badge' => 'SEO-First Agency',
  'title_prefix' => 'Why Brands Choose',
  'description' => $WhyChoose['intro'] ?? '',
  'stats' => [
    [
      'value' => count($ServicesList),
      'label' => 'Core Services'
    ],
    [
      'value' => count($Areas),
      'label' => 'Coverage Zones'
    ],
    [
      'value' => 'SEO',
      'label' => 'Built-In From Day One'
    ]
  ],
  'service_area_label' => 'Coverage and delivery model',
  'features' => [
    [
      'icon' => 'fa-magnifying-glass-chart',
      'title' => 'SEO Integrated',
      'text' => $WhyChoose['cards'][0]['text'] ?? ''
    ],
    [
      'icon' => 'fa-shield-halved',
      'title' => 'Zero Downtime',
      'text' => $WhyChoose['cards'][1]['text'] ?? ''
    ],
    [
      'icon' => 'fa-language',
      'title' => 'Bilingual Content',
      'text' => $BilingualNote
    ],
    [
      'icon' => 'fa-globe',
      'title' => 'Liverpool to Worldwide',
      'text' => $Coverage
    ]
  ],
  'cta_label' => 'Get My Free SEO Audit'
];

$MissionCopy = [
  'mission_title' => 'Our Mission',
  'vision_title' => 'Our Vision'
];

$ProcessCopy = [
  'title' => 'How We Deliver',
  'title_strong' => 'Digital Results',
  'desc' => '',
  'steps' => [
    [
      'icon' => 'fa-clipboard-list',
      'title' => 'Discovery',
      'text' => 'We review your goals, current website, and search visibility to define the right direction.'
    ],
    [
      'icon' => 'fa-pencil-ruler',
      'title' => 'Design & Build',
      'text' => 'We create a tailored website experience shaped around UX, speed, and conversion.'
    ],
    [
      'icon' => 'fa-chart-line',
      'title' => 'SEO Implementation',
      'text' => 'We refine structure, content, and technical signals to improve rankings and usability.'
    ],
    [
      'icon' => 'fa-check-circle',
      'title' => 'Maintenance',
      'text' => 'We monitor, update, and optimize so your site stays secure and performance-ready.'
    ]
  ]
];

$FaqCopy = [
  'title' => 'Frequently Asked Questions',
  'items' => [
    [
      'q' => 'Do you provide a free audit or quote?',
      'a' => $Estimates
    ],
    [
      'q' => 'Do you offer ongoing maintenance?',
      'a' => $SD[2]
    ],
    [
      'q' => 'Is SEO part of the build process?',
      'a' => $WhyChoose['cards'][0]['text'] ?? ''
    ]
  ]
];

$AreasCopy = [
  'title' => 'Serving',
  'title_strong' => 'Liverpool and Worldwide',
  'subtitle' => $Coverage,
  'cta_label' => 'Request Your Web Audit',
  'map_overlay' => 'Digital Delivery Coverage',
  'license_pills' => [
    $LicenseNote,
    $BilingualNote,
    $TypeOfService
  ]
];
$CtaCopy = [
  'badge' => $Experience,
  'title' => 'Ready to Boost',
  'title_strong' => 'Search Visibility?',
  'paragraph' => 'Tell us about your project and we’ll provide a custom web design and SEO strategy.',
  'features' => [
    $ServicesLabel,
    $Coverage,
    $Estimates
  ],
  'button' => 'Send Strategy Request',
  'card_title' => 'Start Your Digital Transformation',
  'card_subtitle' => 'Fast responses for new web and SEO requests',
  'row_call_label' => 'Contact channel',
  'row_license_label' => 'Positioning',
  'row_license_title' => $LicenseNote,
  'row_service_label' => 'Coverage Area',
  'whatsapp_button' => 'WhatsApp',
  'book_button' => 'Start Request',
  'paragraph' => "Tell us about your project and we'll shape a focused strategy across site experience, SEO and conversion."
];

$ContactFormCopy = [
  'eyebrow' => 'Start Your Digital Transformation',
  'title' => 'Boost Your',
  'title_strong' => 'Search Visibility.',
  'desc' => 'Tell us about your project and we’ll provide a custom web design and SEO strategy.',
  'method_labels' => [
    'call' => 'Primary Contact',
    'hours' => 'Availability'
  ],
  'form_labels' => [
    'name' => 'Name',
    'phone' => 'Phone',
    'email' => 'Email',
    'service' => 'Service (Design/Maintenance/SEO)',
    'message' => 'Tell us about your goals'
  ],
  'placeholders' => [
    'service' => 'Select service type',
    'service_other' => 'Other / Custom Request',
    'message' => 'Share your website goals, SEO needs, or maintenance priorities...'
  ],
  'submit' => 'Send Strategy Request',
  'honeypot_label' => 'Leave this field empty',
  'desc' => "Tell us about your goals and we'll map the right mix of strategy, content, SEO and conversion support."
];

$MapCopy = [
  'title' => 'Locate',
  'title_strong' => $Company,
  'labels' => [
    'location' => 'Coverage',
    'call' => 'Contact',
    'hours' => 'Availability'
  ]
];

$TestimonialsCopy = [
  'title' => 'Verified Feedback',
  'title_strong' => 'From Clients',
  'desc' => '',
  'button_label' => 'Read More Reviews',
  'button_href' => 'reviews',
  'fallback_name' => 'Verified Client'
];

$TrustedDirectoriesCopy = [
  'eyebrow' => 'Trusted Feedback Sources',
  'title' => 'Client Satisfaction Highlights',
  'desc' => '',
  'cards' => []
];
$ReviewsPageCopy = [
  'hero_title' => 'Client Reviews',
  'hero_subtitle' => '',
  'hero_image' => 'assets/img/hero/hero3.svg',
  'list_eyebrow' => 'Reviews',
  'list_title' => 'What Our Clients Say',
  'list_desc' => '',
  'list_cta' => 'Leave a Review'
];

$ReviewFormCopy = [
  'title' => 'Share Your Experience',
  'subtitle' => 'We value your feedback and would love to hear about your project.',
  'success_title' => 'Thank You!',
  'success_message' => 'Your review has been submitted successfully.',
  'error_title' => 'Error!',
  'captcha_error' => 'Incorrect security code. Please try again.',
  'labels' => [
    'name' => 'Your Name',
    'city' => 'City / Location',
    'rating' => 'Rating',
    'rating_hint' => '(Select stars)',
    'review' => 'Your Review',
    'security' => 'Security Check',
    'refresh' => 'Refresh',
    'captcha' => 'Enter the code shown above'
  ],
  'captcha_alt' => 'Captcha image',
  'placeholders' => [
    'name' => '',
    'city' => 'e.g. Liverpool, UK',
    'review' => 'Tell us how we did...'
  ],
  'submit' => 'Submit Review'
];

$GalleryHeroCopy = [
  'eyebrow' => 'Our Gallery',
  'title' => 'Selected Digital Work',
  'desc' => '',
  'cta_text' => 'Send Strategy Request',
  'cta_href' => 'contact'
];

$ProjectsIntroCopy = [
  'label' => 'Our Portfolio',
  'title_line1' => 'Digital',
  'title_line2' => 'Performance.',
  'outline_line1' => 'Search',
  'outline_line2' => 'Ready.',
  'desc' => '',
  'stats' => [
    [
      'value' => count($ServicesList),
      'label' => 'Core Services'
    ],
    [
      'value' => count($Areas),
      'label' => 'Coverage Zones'
    ],
    [
      'value' => 'SEO',
      'label' => 'Built In'
    ]
  ]
];

$ProjectsBeforeAfterCopy = [
  'eyebrow' => 'Transformations',
  'title' => 'Before & After',
  'desc' => 'See the difference professional craftsmanship makes.',
  'before_label' => 'Before',
  'after_label' => 'After'
];

$ProjectsStatsCopy = [
  'items' => [
    [
      'icon' => 'fa-hourglass-half',
      'value' => $Experience,
      'label' => 'Operating Model'
    ],
    [
      'icon' => 'fa-chart-line',
      'value' => count($ServicesList),
      'label' => 'Core Services'
    ],
    [
      'icon' => 'fa-map-location-dot',
      'value' => count($Areas),
      'label' => 'Markets'
    ],
    [
      'icon' => 'fa-globe',
      'value' => 'EN/ES',
      'label' => 'Content Support'
    ]
  ]
];

$ProjectsGalleryCopy = [
  'eyebrow' => 'Project Gallery',
  'title' => 'Selected Case Studies &',
  'title_strong' => 'Growth Systems',
  'videos_label' => 'Videos',
  'empty' => 'Case studies coming soon.',
  'image_title' => 'Case Study Visual',
  'video_title' => 'Case Study Video'
];
$ServiceHeroCopy = [
  'badge' => 'Digital Service',
  'cta_primary' => 'Get My Free SEO Audit',
  'cta_secondary' => 'Explore Service'
];

$ServiceIntroCopy = [
  'eyebrow' => 'Our Methodology',
  'title' => 'How We Deliver',
  'title_strong' => 'SEO-Ready Builds',
  'desc' => '',
  'steps' => [
    [
      'icon' => 'fa-comments',
      'title' => 'Consultation',
      'text' => 'We start with your goals, target audience, and the digital gaps you want to solve.'
    ],
    [
      'icon' => 'fa-pencil-ruler',
      'title' => 'Plan & Design',
      'text' => 'We shape the structure, interface, and content direction around SEO and usability.'
    ],
    [
      'icon' => 'fa-chart-line',
      'title' => 'Optimization',
      'text' => 'We refine technical signals, metadata, and performance so your site launches stronger.'
    ]
  ]
];

$ServiceDetailsCopy = [
  'badge_title' => 'Falchion Studios Standard',
  'badge_subtitle' => 'SEO-Driven Delivery',
  'title_prefix' => 'Professional',
  'button' => 'Request Web Audit'
];

$ServiceFaqCopy = [
  'eyebrow' => 'Common Questions',
  'title' => 'Info About Our',
  'title_strong' => 'Digital Process',
  'items' => [
    [
      'icon' => 'fa-file-invoice-dollar',
      'question' => 'Is the audit or quote really free?',
      'answer' => $Estimates
    ],
    [
      'icon' => 'fa-shield-halved',
      'question' => 'Do you provide maintenance after launch?',
      'answer' => $SD[2]
    ],
    [
      'icon' => 'fa-magnifying-glass-chart',
      'question' => 'Is SEO included in the build?',
      'answer' => $WhyChoose['cards'][0]['text'] ?? ''
    ]
  ],
  'footer' => 'Have a different question? Contact our team directly'
];

$ServiceCtaCopy = [
  'tag' => 'Ready to Grow?',
  'title' => "Let's Build Your",
  'title_strong' => 'Next Digital Asset',
  'paragraph' => 'Get a tailored strategy for your %s.',
  'subject_fallback' => 'website',
  'features' => [$ServicesLabel, $Coverage, $Experience],
  'primary' => 'Send Strategy Request',
  'secondary_prefix' => 'Email'
];

$OtherServicesCopy = [
  'label' => 'Additional Services',
  'title' => 'More Ways We Can Help',
  'title_strong' => 'Your Brand',
  'item_note' => 'Tailored digital support.',
  'cta_title' => 'Have a specific request?',
  'cta_text' => 'From landing pages to technical audits, we can tailor the scope.',
  'cta_button' => $Estimates,
  'page_desc' => 'Additional service options tailored to your digital goals.'
];
$FounderCopy = [
  'title' => 'A Note from',
  'title_strong' => $Company,
  'quote' => $About[1],
  'role' => '',
  'image_alt' => $Company
];
$AriaCopy = [
  'call' => 'Click to call',
  'primary_nav' => 'Primary navigation',
  'whatsapp' => 'WhatsApp',
  'messenger' => 'Messenger',
  'facebook' => 'Facebook',
  'instagram' => 'Instagram',
  'google' => 'Google Maps',
  'tiktok' => 'TikTok',
  'email' => 'Email'
];
$TestimonialsPageCopy = [
  'eyebrow' => $NavCopy['reviews'] ?? 'Reviews',
  'title' => 'What Clients Say',
  'desc' => '',
  'card_title' => 'Read Verified Reviews',
  'card_desc' => '',
  'card_button' => $NavCopy['read_reviews'] ?? 'Read Reviews',
  'card_link' => 'reviews'
];
$ThankYouCopy = [
  'title' => 'Thank You',
  'description' => 'Thank you for contacting ' . $Company . '. We will be in touch shortly.',
  'eyebrow' => 'Thank You',
  'headline' => 'We received your request',
  'body' => 'Thank you for contacting ' . $Company . '. Our team will reach out soon to confirm project details.',
  'cta_call' => 'Contact Us',
  'cta_home' => 'Back to Home'
];
$LabelsCopy = [
  'service_areas' => 'Service Areas',
  'call' => 'Call',
  'email' => 'Email'
];
/*=========================
   CSS VARIABLES
   =========================*/
$BrandCSSVars = sprintf(
  ':root{--brand-primary:%s;--brand-secondary:%s;--brand-white:%s;--brand-accent:%s;--brand-neutral:%s;--brand-primary-rgb:%s;--brand-secondary-rgb:%s;--brand-accent-rgb:%s;}',
  $BrandColors["primary"],
  $BrandColors["secondary"],
  $BrandColors["white"],
  $BrandColors["accent"],
  $BrandColors["neutral"],
  $BrandColors["primary_rgb"],
  $BrandColors["secondary_rgb"],
  $BrandColors["accent_rgb"]
);

$BrandCSSVars .= <<<CSS
body{
  background: linear-gradient(180deg, var(--brand-neutral) 0%, #e3eaf2 100%);
}
#hero-4.hero4{
  background: linear-gradient(130deg, var(--brand-secondary) 0%, var(--brand-primary) 58%, #2a2a2a 100%) !important;
}
#hero-4 .hero4__slides::after{
  background: linear-gradient(to bottom, rgba(var(--brand-secondary-rgb),0.75) 0%, rgba(var(--brand-secondary-rgb),0.48) 42%, rgba(var(--brand-secondary-rgb),0.82) 100%) !important;
}
#hero-4 .hero4__content{
  background: linear-gradient(145deg, rgba(var(--brand-secondary-rgb),0.9), rgba(var(--brand-primary-rgb),0.72)) !important;
  border: 1px solid rgba(var(--brand-accent-rgb),0.45) !important;
}
#hero-4 .hero4__content::before{
  background: radial-gradient(120% 140% at 0% 0%, rgba(var(--brand-accent-rgb),0.2), transparent 62%) !important;
}
#hero-4 .hero4__btn--primary{
  background: var(--brand-accent) !important;
  color: var(--brand-secondary) !important;
}
#hero-4 .hero4__btn--ghost{
  border-color: rgba(var(--brand-accent-rgb),0.7) !important;
  background: rgba(var(--brand-secondary-rgb),0.24) !important;
}
#hero-4 .hero4__thumb.active,
#hero-4 .hero4__arrow:hover{
  border-color: var(--brand-accent) !important;
}

.section-about-arch,
.section-services-premium,
.section-maint-pro,
.mission-vision-section,
.faq-section{
  background: linear-gradient(180deg, #f8fbff 0%, var(--brand-neutral) 100%) !important;
}
.section-remodel-why,
.section-process,
.section-areas,
.cta-premium-section,
.section-contact-premium,
.section-map-contact{
  background: linear-gradient(135deg, color-mix(in srgb, var(--brand-secondary) 92%, #000 8%) 0%, color-mix(in srgb, var(--brand-primary) 78%, #000 22%) 100%) !important;
}

.section-about-arch .arch-eyebrow,
.section-services-premium .sv-eyebrow,
.section-maint-pro .tagline,
.section-remodel-why .sub-badge,
.section-process .step-icon,
.section-areas .license-pill,
.section-areas .city-icon,
.cta-premium-section .cta-badge,
.section-contact-premium .ct-eyebrow,
.section-map-contact .info-icon{
  color: var(--brand-accent) !important;
  border-color: rgba(var(--brand-accent-rgb),0.55) !important;
}
.section-about-arch .arch-eyebrow::before,
.section-services-premium .sv-eyebrow::before,
.section-services-premium .sv-eyebrow::after,
.section-contact-premium .ct-eyebrow::before{
  background: var(--brand-accent) !important;
}

.section-about-arch .content-arch h2 strong,
.section-services-premium .sv-header h2 strong,
.section-maint-pro .pro-header h2 strong{
  color: var(--brand-primary) !important;
}
.section-remodel-why .why-header h2 strong,
.section-process .process-header h2 span,
.section-areas .areas-content h2 strong,
.cta-premium-section .cta-content h2 strong,
.section-map-contact .contact-card h3 span{
  color: var(--brand-accent) !important;
}

.section-services-premium .sv-card,
.section-maint-pro .maint-card-dark,
.section-remodel-why .feature-card,
.section-process .process-step,
.section-areas .map-frame-wrapper,
.section-contact-premium .ct-form-wrapper,
.cta-premium-section .contact-glass-card,
.section-map-contact .contact-card{
  border-radius: 16px !important;
}
.section-services-premium .sv-card:hover,
.section-maint-pro .maint-card-dark:hover,
.section-remodel-why .feature-card:hover,
.section-process .process-step:hover{
  box-shadow: 0 22px 48px rgba(var(--brand-secondary-rgb),0.26) !important;
}

.section-about-arch .btn-arch,
.section-remodel-why .btn-gold,
.section-areas .btn-area,
.cta-premium-section .btn-cta-primary,
.section-contact-premium .btn-submit-arch,
.section-services-premium .btn-sv-accent{
  border-radius: 999px !important;
}
.section-about-arch .btn-arch,
.section-remodel-why .btn-gold,
.cta-premium-section .btn-cta-primary,
.section-contact-premium .btn-submit-arch{
  background: var(--brand-accent) !important;
  color: var(--brand-secondary) !important;
  border-color: var(--brand-accent) !important;
}
.section-about-arch .btn-arch:hover,
.section-remodel-why .btn-gold:hover,
.cta-premium-section .btn-cta-primary:hover,
.section-contact-premium .btn-submit-arch:hover{
  background: color-mix(in srgb, var(--brand-accent) 84%, #fff 16%) !important;
  color: var(--brand-secondary) !important;
}
.section-areas .btn-area{
  border-color: var(--brand-accent) !important;
  color: var(--brand-accent) !important;
}
.section-areas .btn-area:hover{
  background: var(--brand-accent) !important;
  color: var(--brand-secondary) !important;
}
.section-contact-premium .form-control-arch:focus{
  border-bottom-color: var(--brand-accent) !important;
}
.section-map-contact .map-background iframe{
  filter: grayscale(78%) invert(88%) contrast(0.82) !important;
}
CSS;
?>
