<?php
$faqItems = [
    [
        'q' => 'Do you work with clients outside the UK?',
        'a' => 'Absolutely. While we are based in Liverpool, we work with clients across the United Kingdom and United States. All our services — web design, graphic design, motion graphics and digital marketing — are delivered remotely without any loss in quality or communication.',
    ],
    [
        'q' => 'Can you handle the entire project from start to finish?',
        'a' => 'Yes, that is exactly what we are built for. Falchion Digital Studios is a full-service creative studio, meaning we can take a project from initial strategy and design all the way through to development, production and ongoing marketing. You deal with one team instead of managing multiple agencies or freelancers.',
    ],
    [
        'q' => 'How long does a typical project take?',
        'a' => 'It depends on the scope. A website project typically takes 3–6 weeks from brief to launch. A branding package can take 2–4 weeks. Video production varies from 1 week for short social content up to 4–6 weeks for a full production. We always provide a clear timeline before work begins.',
    ],
    [
        'q' => 'Do you offer one-off projects or only ongoing retainers?',
        'a' => 'Both. We take on one-off projects such as a website build, a brand identity or a video shoot with no long-term commitment required. We also offer monthly retainers for clients who need continuous support — digital marketing management, content creation, SEO reporting or website maintenance.',
    ],
    [
        'q' => 'What industries do you work with?',
        'a' => 'We have worked with businesses across e-commerce, hospitality, real estate, legal services, education, health and wellness, and local trades. Our approach is adaptable — we focus on understanding your audience and goals, not on being limited to a single niche.',
    ],
    [
        'q' => 'How much does it cost to work with Falchion?',
        'a' => 'Pricing varies depending on the service and scope. Our web collection plans start from a fixed monthly rate which covers design, development and ongoing updates. For bespoke projects we provide a custom quote after an initial discovery call. There are no hidden fees — everything is agreed upfront.',
    ],
    [
        'q' => 'Do you offer bilingual services?',
        'a' => 'Yes. Our team is fully bilingual in English and Spanish. We can deliver projects, communications and creative assets in both languages, which is particularly valuable for brands targeting audiences across the UK and US.',
    ],
    [
        'q' => 'What happens after my website or project is delivered?',
        'a' => 'We do not disappear after delivery. We offer ongoing support, maintenance plans and growth services so your digital presence keeps evolving. Many of our clients start with a single project and expand into a broader working relationship over time.',
    ],
];
?>

<section class="faq-section" id="faq">
    <div class="container">

        <div class="faq-section__head" data-aos="fade-up">
            <div>
                <span class="faq-section__eyebrow">FAQ</span>
                <h2 class="faq-section__title">Common <strong>Questions</strong></h2>
                <p class="faq-section__desc">Everything you need to know before working with us.</p>
            </div>
            <a class="faq-section__cta" href="<?= htmlspecialchars(falchion_url('contact.php'), ENT_QUOTES, 'UTF-8') ?>">
                Still have questions? Get in touch →
            </a>
        </div>

        <div class="faq-list" id="faqList" data-aos="fade-up" data-aos-delay="100">
            <?php foreach ($faqItems as $i => $item): ?>
            <div class="faq-item <?= $i === 0 ? 'is-open' : '' ?>" id="faq-<?= $i ?>">
                <button class="faq-item__trigger" aria-expanded="<?= $i === 0 ? 'true' : 'false' ?>" aria-controls="faq-answer-<?= $i ?>">
                    <span><?= htmlspecialchars($item['q'], ENT_QUOTES, 'UTF-8') ?></span>
                    <div class="faq-item__icon" aria-hidden="true">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    </div>
                </button>
                <div class="faq-item__body" id="faq-answer-<?= $i ?>" role="region">
                    <div class="faq-item__body-inner">
                        <p><?= htmlspecialchars($item['a'], ENT_QUOTES, 'UTF-8') ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<script>
(function () {
    const items = document.querySelectorAll('.faq-item');
    items.forEach(item => {
        const trigger = item.querySelector('.faq-item__trigger');
        if (!trigger) return;
        trigger.addEventListener('click', () => {
            const isOpen = item.classList.contains('is-open');
            items.forEach(i => {
                i.classList.remove('is-open');
                const t = i.querySelector('.faq-item__trigger');
                if (t) t.setAttribute('aria-expanded', 'false');
            });
            if (!isOpen) {
                item.classList.add('is-open');
                trigger.setAttribute('aria-expanded', 'true');
            }
        });
    });
})();
</script>
