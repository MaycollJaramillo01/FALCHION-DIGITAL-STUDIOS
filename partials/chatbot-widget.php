<?php
@session_start();
if (!isset($BrandColors)) {
    include_once __DIR__ . '/../text.php';
}

$chatbotData = [
    'locale' => i18n_get_locale(),
    'company' => (string)($Company ?? 'BrandBoost Marketing'),
    'assistantName' => 'BrandBot',
    'assistantSubtitle' => t('Asistente digital del sitio', 'Site digital assistant'),
    'phone' => (string)($Phone ?? ''),
    'phoneRef' => (string)($PhoneRef ?? '#'),
    'whatsapp' => (string)($Phone2 ?? ''),
    'whatsappRef' => (string)($Phone2Ref ?? '#'),
    'email' => (string)($Mail ?? ''),
    'emailRef' => (string)($MailRef ?? '#'),
    'schedule' => (string)($Schedule ?? ''),
    'payment' => (string)($Payment ?? ''),
    'contactUrl' => i18n_localized_url('contact.php'),
    'servicesUrl' => i18n_localized_url('services.php'),
    'portfolioUrl' => i18n_localized_url('portfolio.php'),
    'services' => [
        [
            'name' => t('Creacion de Sitios Web', 'Website Creation'),
            'url' => i18n_localized_url('website-creation.php'),
            'keywords' => ['website creation', 'create website', 'new website', 'sitio web', 'pagina web', 'crear web']
        ],
        [
            'name' => 'Rediseño Web',
            'url' => i18n_localized_url('website-redesign.php'),
            'keywords' => ['website redesign', 'redesign', 'mejorar web', 'rediseno', 'sitio actual', 'modernizar']
        ],
        [
            'name' => 'Paginas de Aterrizaje',
            'url' => i18n_localized_url('landing-pages.php'),
            'keywords' => ['landing page', 'landing', 'campana', 'ads', 'conversion page', 'pagina de aterrizaje']
        ],
        [
            'name' => 'Rediseño de Logo',
            'url' => i18n_localized_url('logo-redesign.php'),
            'keywords' => ['logo', 'logo redesign', 'identidad visual', 'brand', 'marca']
        ],
        [
            'name' => 'Configuracion de Presencia Digital',
            'url' => i18n_localized_url('digital-presence-setup.php'),
            'keywords' => ['digital presence', 'presencia digital', 'google business', 'local visibility', 'social setup']
        ],
    ]
];

$assistantName = (string)($chatbotData['assistantName'] ?? 'BrandBot');
$assistantSubtitle = (string)($chatbotData['assistantSubtitle'] ?? t('Asistente digital del sitio', 'Site digital assistant'));
?>

<div class="nv-chatbot" id="nv-chatbot">
    <button class="nv-chatbot__toggle" id="nv-chatbot-toggle" type="button" aria-controls="nv-chatbot-panel" aria-expanded="false" aria-label="<?= htmlspecialchars(t('Abrir ', 'Open ') . $assistantName . t(', asistente del sitio', ', site assistant'), ENT_QUOTES, 'UTF-8') ?>">
        <span class="nv-chatbot__mascot-wrap" aria-hidden="true">
            <span class="nv-chatbot__mascot-glow"></span>
            <span class="nv-chatbot__mascot-spark nv-chatbot__mascot-spark--one"></span>
            <span class="nv-chatbot__mascot-spark nv-chatbot__mascot-spark--two"></span>
            <span class="nv-chatbot__robot">
                <span class="nv-chatbot__robot-antenna"></span>
                <span class="nv-chatbot__robot-head">
                    <span class="nv-chatbot__robot-eye nv-chatbot__robot-eye--left"></span>
                    <span class="nv-chatbot__robot-eye nv-chatbot__robot-eye--right"></span>
                    <span class="nv-chatbot__robot-mouth"></span>
                </span>
                <span class="nv-chatbot__robot-body">
                    <span class="nv-chatbot__robot-core"></span>
                </span>
            </span>
        </span>
        <span class="nv-chatbot__toggle-copy">
            <span class="nv-chatbot__toggle-kicker"><?= htmlspecialchars(t('Asistente digital', 'Digital assistant'), ENT_QUOTES, 'UTF-8') ?></span>
            <span class="nv-chatbot__toggle-label"><?= htmlspecialchars($assistantName, ENT_QUOTES, 'UTF-8') ?></span>
        </span>
        <span class="nv-chatbot__toggle-badge"><?= htmlspecialchars(t('Asistente', 'Assistant'), ENT_QUOTES, 'UTF-8') ?></span>
    </button>

    <section class="nv-chatbot__panel" id="nv-chatbot-panel" aria-hidden="true" aria-label="<?= htmlspecialchars(t('Chat del asistente ', 'Assistant chat ') . $assistantName, ENT_QUOTES, 'UTF-8') ?>">
        <header class="nv-chatbot__head">
            <div class="nv-chatbot__head-meta">
                <div class="nv-chatbot__head-avatar" aria-hidden="true">
                    <span class="nv-chatbot__robot">
                        <span class="nv-chatbot__robot-antenna"></span>
                        <span class="nv-chatbot__robot-head">
                            <span class="nv-chatbot__robot-eye nv-chatbot__robot-eye--left"></span>
                            <span class="nv-chatbot__robot-eye nv-chatbot__robot-eye--right"></span>
                            <span class="nv-chatbot__robot-mouth"></span>
                        </span>
                        <span class="nv-chatbot__robot-body">
                            <span class="nv-chatbot__robot-core"></span>
                        </span>
                    </span>
                </div>
                <div class="nv-chatbot__head-title">
                    <strong><?= htmlspecialchars($assistantName, ENT_QUOTES, 'UTF-8') ?></strong>
                    <small><?= htmlspecialchars($assistantSubtitle, ENT_QUOTES, 'UTF-8') ?></small>
                </div>
            </div>
            <button class="nv-chatbot__close" id="nv-chatbot-close" type="button" aria-label="<?= htmlspecialchars(t('Cerrar chat', 'Close chat'), ENT_QUOTES, 'UTF-8') ?>">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </header>

        <div class="nv-chatbot__body" id="nv-chatbot-messages"></div>

        <div class="nv-chatbot__quick">
            <button type="button" data-quick="<?= htmlspecialchars(t('Necesito un sitio web para generar leads', 'I need a website to generate leads'), ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars(t('Generar leads', 'Generate leads'), ENT_QUOTES, 'UTF-8') ?></button>
            <button type="button" data-quick="Quiero rediseñar mi sitio web actual">Rediseño web</button>
            <button type="button" data-quick="<?= htmlspecialchars(t('Ayudame a elegir el mejor servicio', 'Help me choose the best service'), ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars(t('Elegir servicio', 'Choose service'), ENT_QUOTES, 'UTF-8') ?></button>
        </div>

        <form class="nv-chatbot__form" id="nv-chatbot-form">
            <input type="text" id="nv-chatbot-input" maxlength="600" placeholder="<?= htmlspecialchars(t('Escribe tu pregunta...', 'Ask your question...'), ENT_QUOTES, 'UTF-8') ?>" autocomplete="off">
            <button type="submit" id="nv-chatbot-send" aria-label="<?= htmlspecialchars(t('Enviar mensaje', 'Send message'), ENT_QUOTES, 'UTF-8') ?>">
                <i class="fa-solid fa-paper-plane"></i>
            </button>
        </form>
    </section>
</div>

<style>
.nv-chatbot {
    position: fixed;
    right: 18px;
    bottom: 18px;
    z-index: 2500;
    font-family: var(--body-font, "Inter", sans-serif);
}

.nv-chatbot__toggle {
    min-height: 84px;
    border: 1px solid color-mix(in srgb, var(--brand-accent) 12%, transparent);
    border-radius: 999px;
    padding: 10px 12px 10px 10px;
    background:
        radial-gradient(circle at 24% 16%, color-mix(in srgb, var(--brand-secondary) 18%, transparent), transparent 42%),
        linear-gradient(140deg, color-mix(in srgb, var(--brand-primary) 94%, #000 6%), color-mix(in srgb, var(--brand-neutral) 92%, #081326 8%));
    color: var(--brand-accent);
    display: inline-flex;
    align-items: center;
    gap: 12px;
    font-weight: 700;
    font-size: 0.9rem;
    box-shadow: 0 18px 34px color-mix(in srgb, var(--brand-primary) 56%, transparent);
    cursor: pointer;
    position: relative;
    overflow: hidden;
    transition: transform 0.22s ease, box-shadow 0.22s ease, border-color 0.22s ease;
}

.nv-chatbot__toggle:hover {
    transform: translateY(-2px);
    border-color: color-mix(in srgb, var(--brand-secondary) 30%, transparent);
    box-shadow: 0 22px 40px color-mix(in srgb, var(--brand-primary) 62%, transparent);
}

.nv-chatbot__toggle-copy {
    display: grid;
    gap: 4px;
    text-align: left;
}

.nv-chatbot__toggle-kicker {
    font-size: 0.68rem;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    color: color-mix(in srgb, var(--brand-secondary) 78%, var(--brand-accent) 22%);
}

.nv-chatbot__toggle-label {
    display: block;
    color: var(--brand-accent);
    font-size: 1rem;
    font-weight: 800;
}

.nv-chatbot__toggle-badge {
    min-height: 28px;
    padding: 0 12px;
    border-radius: 999px;
    background: color-mix(in srgb, var(--brand-secondary) 14%, transparent);
    border: 1px solid color-mix(in srgb, var(--brand-secondary) 26%, transparent);
    color: var(--brand-secondary);
    font-size: 0.7rem;
    font-weight: 800;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.nv-chatbot__mascot-wrap {
    position: relative;
    width: 64px;
    height: 64px;
    flex-shrink: 0;
}

.nv-chatbot__mascot-glow {
    position: absolute;
    inset: 10px;
    border-radius: 50%;
    background: radial-gradient(circle, color-mix(in srgb, var(--brand-secondary) 32%, transparent) 0%, transparent 72%);
    filter: blur(6px);
}

.nv-chatbot__mascot-spark {
    position: absolute;
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--brand-secondary), #2BA7FF);
    box-shadow: 0 0 16px color-mix(in srgb, var(--brand-secondary) 34%, transparent);
}

.nv-chatbot__mascot-spark--one {
    top: 8px;
    right: 7px;
    animation: nv-chatbot-spark 2.2s ease-in-out infinite;
}

.nv-chatbot__mascot-spark--two {
    bottom: 12px;
    left: 5px;
    width: 5px;
    height: 5px;
    animation: nv-chatbot-spark 1.8s ease-in-out infinite 0.25s;
}

.nv-chatbot__robot {
    position: absolute;
    inset: 0;
    animation: nv-chatbot-float 3.2s ease-in-out infinite;
}

.nv-chatbot__robot-antenna {
    position: absolute;
    left: 50%;
    top: 3px;
    width: 5px;
    height: 16px;
    border-radius: 999px;
    background: linear-gradient(180deg, color-mix(in srgb, var(--brand-accent) 92%, transparent), color-mix(in srgb, var(--brand-accent) 32%, transparent));
    transform: translateX(-50%);
}

.nv-chatbot__robot-antenna::before {
    content: "";
    position: absolute;
    top: -7px;
    left: 50%;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--brand-secondary), #2BA7FF);
    box-shadow: 0 0 16px color-mix(in srgb, var(--brand-secondary) 46%, transparent);
    transform: translateX(-50%);
}

.nv-chatbot__robot-head {
    position: absolute;
    top: 14px;
    left: 50%;
    width: 46px;
    height: 34px;
    border-radius: 16px;
    background: linear-gradient(180deg, color-mix(in srgb, var(--brand-accent) 96%, transparent), color-mix(in srgb, var(--brand-accent) 76%, transparent));
    border: 1px solid color-mix(in srgb, var(--brand-accent) 65%, transparent);
    box-shadow:
        inset 0 -8px 14px color-mix(in srgb, var(--brand-primary) 8%, transparent),
        0 12px 18px color-mix(in srgb, var(--brand-primary) 28%, transparent);
    transform: translateX(-50%);
}

.nv-chatbot__robot-head::before {
    content: "";
    position: absolute;
    inset: 7px 8px 9px;
    border-radius: 12px;
    background: linear-gradient(135deg, color-mix(in srgb, var(--brand-primary) 94%, #000 6%), color-mix(in srgb, #0E2C56 88%, #091422 12%));
}

.nv-chatbot__robot-eye {
    position: absolute;
    top: 14px;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: linear-gradient(180deg, #79ddff, #2BA7FF);
    box-shadow: 0 0 10px rgba(43, 167, 255, 0.65);
    z-index: 1;
    animation: nv-chatbot-blink 4s infinite;
}

.nv-chatbot__robot-eye--left {
    left: 14px;
}

.nv-chatbot__robot-eye--right {
    right: 14px;
}

.nv-chatbot__robot-mouth {
    position: absolute;
    left: 50%;
    bottom: 9px;
    width: 14px;
    height: 3px;
    border-radius: 999px;
    background: linear-gradient(90deg, color-mix(in srgb, var(--brand-secondary) 55%, transparent), #2BA7FF);
    transform: translateX(-50%);
    z-index: 1;
}

.nv-chatbot__robot-body {
    position: absolute;
    left: 50%;
    top: 44px;
    width: 34px;
    height: 18px;
    border-radius: 12px;
    background: linear-gradient(180deg, color-mix(in srgb, var(--brand-secondary) 80%, #fff 20%), color-mix(in srgb, var(--brand-secondary) 46%, var(--brand-accent) 54%));
    border: 1px solid color-mix(in srgb, var(--brand-accent) 44%, transparent);
    transform: translateX(-50%);
    box-shadow: 0 8px 18px color-mix(in srgb, var(--brand-primary) 25%, transparent);
}

.nv-chatbot__robot-body::before,
.nv-chatbot__robot-body::after {
    content: "";
    position: absolute;
    top: 4px;
    width: 8px;
    height: 8px;
    border-radius: 999px;
    background: color-mix(in srgb, var(--brand-accent) 72%, transparent);
}

.nv-chatbot__robot-body::before {
    left: -5px;
}

.nv-chatbot__robot-body::after {
    right: -5px;
}

.nv-chatbot__robot-core {
    position: absolute;
    inset: 5px 10px;
    border-radius: 999px;
    background: linear-gradient(135deg, var(--brand-primary), #2BA7FF);
    box-shadow: 0 0 12px rgba(43, 167, 255, 0.28);
}

.nv-chatbot__panel {
    position: absolute;
    right: 0;
    bottom: 96px;
    width: min(388px, calc(100vw - 24px));
    border-radius: 18px;
    border: 1px solid color-mix(in srgb, var(--brand-accent) 16%, transparent);
    background: linear-gradient(180deg, color-mix(in srgb, var(--brand-primary) 94%, #000 6%) 0%, color-mix(in srgb, var(--brand-primary) 96%, #000 4%) 100%);
    box-shadow: 0 16px 30px rgba(0, 0, 0, 0.34);
    opacity: 0;
    transform: translateY(10px);
    pointer-events: none;
    transition: opacity 0.25s ease, transform 0.25s ease;
    overflow: hidden;
}

.nv-chatbot.is-open .nv-chatbot__panel {
    opacity: 1;
    transform: translateY(0);
    pointer-events: auto;
}

.nv-chatbot__head {
    min-height: 62px;
    border-bottom: 1px solid color-mix(in srgb, var(--brand-accent) 12%, transparent);
    padding: 0 14px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.nv-chatbot__head-meta {
    display: flex;
    align-items: center;
    gap: 12px;
}

.nv-chatbot__head-avatar {
    position: relative;
    width: 48px;
    height: 48px;
    border-radius: 16px;
    background: linear-gradient(160deg, color-mix(in srgb, var(--brand-secondary) 20%, transparent), color-mix(in srgb, var(--brand-accent) 6%, transparent));
    border: 1px solid color-mix(in srgb, var(--brand-accent) 10%, transparent);
    overflow: hidden;
}

.nv-chatbot__head-avatar .nv-chatbot__robot {
    animation: none;
    transform: scale(0.72);
    transform-origin: center;
}

.nv-chatbot__head-title strong {
    display: block;
    color: var(--brand-accent);
    font-size: 0.96rem;
}

.nv-chatbot__head-title small {
    color: color-mix(in srgb, var(--brand-accent) 66%, transparent);
    font-size: 0.74rem;
}

.nv-chatbot__close {
    width: 34px;
    height: 34px;
    border: 0;
    border-radius: 10px;
    color: var(--brand-accent);
    background: color-mix(in srgb, var(--brand-accent) 7%, transparent);
    cursor: pointer;
}

.nv-chatbot__body {
    max-height: 380px;
    overflow: auto;
    padding: 12px 12px 6px;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.nv-chatbot__msg {
    max-width: 92%;
    border-radius: 12px;
    padding: 9px 11px;
    font-size: 0.88rem;
    line-height: 1.55;
    white-space: normal;
}

.nv-chatbot__msg--bot {
    align-self: flex-start;
    color: color-mix(in srgb, var(--brand-accent) 90%, transparent);
    background: color-mix(in srgb, var(--brand-accent) 6%, transparent);
    border: 1px solid color-mix(in srgb, var(--brand-accent) 12%, transparent);
}

.nv-chatbot__msg--user {
    align-self: flex-end;
    color: var(--brand-primary);
    background: var(--brand-secondary);
}

.nv-chatbot__quick {
    padding: 9px 12px 4px;
    display: flex;
    flex-wrap: wrap;
    gap: 7px;
}

.nv-chatbot__quick button {
    border: 1px solid color-mix(in srgb, var(--brand-accent) 14%, transparent);
    border-radius: 999px;
    min-height: 30px;
    background: color-mix(in srgb, var(--brand-accent) 4%, transparent);
    color: var(--brand-accent);
    font-size: 0.75rem;
    font-weight: 600;
    padding: 0 10px;
    cursor: pointer;
}

.nv-chatbot__quick button:hover {
    border-color: color-mix(in srgb, var(--brand-secondary) 70%, transparent);
    color: var(--brand-secondary);
}

.nv-chatbot__form {
    padding: 10px 12px 8px;
    display: grid;
    grid-template-columns: 1fr 42px;
    gap: 8px;
}

.nv-chatbot__form input {
    min-height: 42px;
    border-radius: 11px;
    border: 1px solid color-mix(in srgb, var(--brand-accent) 14%, transparent);
    background: color-mix(in srgb, var(--brand-accent) 4%, transparent);
    color: var(--brand-accent);
    padding: 0 12px;
    font-size: 0.88rem;
    outline: none;
}

.nv-chatbot__form input:focus {
    border-color: color-mix(in srgb, var(--brand-secondary) 70%, transparent);
}

.nv-chatbot__form button {
    min-height: 42px;
    border: 0;
    border-radius: 11px;
    background: var(--brand-secondary);
    color: var(--brand-primary);
    cursor: pointer;
}

.nv-chatbot__typing {
    display: inline-flex;
    gap: 4px;
    align-items: center;
}

.nv-chatbot__typing i {
    width: 5px;
    height: 5px;
    border-radius: 50%;
    display: inline-block;
    background: color-mix(in srgb, var(--brand-accent) 70%, transparent);
    animation: nv-chatbot-dot 1.2s infinite ease-in-out;
}

.nv-chatbot__typing i:nth-child(2) { animation-delay: 0.15s; }
.nv-chatbot__typing i:nth-child(3) { animation-delay: 0.3s; }

@keyframes nv-chatbot-dot {
    0%, 80%, 100% { transform: translateY(0); opacity: 0.4; }
    40% { transform: translateY(-3px); opacity: 1; }
}

@keyframes nv-chatbot-float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-4px); }
}

@keyframes nv-chatbot-spark {
    0%, 100% { transform: scale(0.9); opacity: 0.45; }
    50% { transform: scale(1.15); opacity: 1; }
}

@keyframes nv-chatbot-blink {
    0%, 45%, 100% { transform: scaleY(1); }
    47%, 49% { transform: scaleY(0.2); }
}

@media (max-width: 575px) {
    .nv-chatbot {
        right: 10px;
        bottom: 10px;
    }

    .nv-chatbot__toggle-copy,
    .nv-chatbot__toggle-badge {
        display: none;
    }

    .nv-chatbot__toggle {
        width: 74px;
        height: 74px;
        min-height: 74px;
        padding: 0;
        justify-content: center;
    }

    .nv-chatbot__mascot-wrap {
        width: 60px;
        height: 60px;
    }

    .nv-chatbot__panel {
        right: -2px;
        width: min(388px, calc(100vw - 12px));
    }
}
</style>

<script>
window.NV_CHATBOT_DATA = <?= json_encode($chatbotData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;

(function () {
    function ready(fn) {
        if (document.readyState === "loading") {
            document.addEventListener("DOMContentLoaded", fn);
            return;
        }
        fn();
    }

    ready(function () {
        var root = document.getElementById("nv-chatbot");
        if (!root) return;

        var cfg = window.NV_CHATBOT_DATA || {};
        var locale = cfg.locale || "es";
        var isEnglish = locale === "en";
        var assistantName = cfg.assistantName || "BrandBot";
        var storageKey = "nv_chatbot_history_v11_" + locale;

        var panel = document.getElementById("nv-chatbot-panel");
        var toggle = document.getElementById("nv-chatbot-toggle");
        var closeBtn = document.getElementById("nv-chatbot-close");
        var messages = document.getElementById("nv-chatbot-messages");
        var input = document.getElementById("nv-chatbot-input");
        var form = document.getElementById("nv-chatbot-form");
        var quickButtons = root.querySelectorAll(".nv-chatbot__quick button");

        var history = [];
        var qualifyMode = false;
        var qualifyStep = 0;
        var qualifyAnswers = { business: "", goal: "", timeline: "" };

        function normalizeText(text) {
            var str = String(text || "").toLowerCase();
            str = str.normalize ? str.normalize("NFD").replace(/[\u0300-\u036f]/g, "") : str;
            return str;
        }

        function escapeHtml(str) {
            return String(str || "")
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/\"/g, "&quot;")
                .replace(/'/g, "&#39;");
        }

        function tr(es, en) {
            return isEnglish ? en : es;
        }

        function serviceLabel(service) {
            var url = String((service && service.url) || "");
            if (url.indexOf("website-creation.php") !== -1) return tr("Creacion de Sitios Web", "Website Creation");
            if (url.indexOf("website-redesign.php") !== -1) return tr("Rediseño Web", "Website Redesign");
            if (url.indexOf("landing-pages.php") !== -1) return tr("Paginas de Aterrizaje", "Landing Pages");
            if (url.indexOf("logo-redesign.php") !== -1) return tr("Rediseño de Logo", "Logo Redesign");
            if (url.indexOf("digital-presence-setup.php") !== -1) return tr("Configuracion de Presencia Digital", "Digital Presence Setup");
            return String((service && service.name) || "");
        }

        function syncQuickButtons() {
            if (!quickButtons || quickButtons.length < 3 || !isEnglish) return;
            quickButtons[0].textContent = "Generate leads";
            quickButtons[0].setAttribute("data-quick", "I need a website to generate leads");
            quickButtons[1].textContent = "Website redesign";
            quickButtons[1].setAttribute("data-quick", "I want to redesign my current website");
            quickButtons[2].textContent = "Choose service";
            quickButtons[2].setAttribute("data-quick", "Help me choose the best service");
        }

        function formatContent(text) {
            return escapeHtml(String(text || "")).replace(/\n/g, "<br>");
        }

        function scrollToBottom() {
            messages.scrollTop = messages.scrollHeight;
        }

        function renderMessage(role, text) {
            var bubble = document.createElement("div");
            bubble.className = "nv-chatbot__msg " + (role === "user" ? "nv-chatbot__msg--user" : "nv-chatbot__msg--bot");
            bubble.innerHTML = formatContent(text);
            messages.appendChild(bubble);
            scrollToBottom();
        }

        function addTyping() {
            var bubble = document.createElement("div");
            bubble.className = "nv-chatbot__msg nv-chatbot__msg--bot";
            bubble.id = "nv-chatbot-typing";
            bubble.innerHTML = '<span class="nv-chatbot__typing"><i></i><i></i><i></i></span>';
            messages.appendChild(bubble);
            scrollToBottom();
        }

        function removeTyping() {
            var el = document.getElementById("nv-chatbot-typing");
            if (el) el.remove();
        }

        function persistHistory() {
            try {
                localStorage.setItem(storageKey, JSON.stringify(history.slice(-28)));
            } catch (e) {}
        }

        function loadHistory() {
            try {
                var raw = localStorage.getItem(storageKey);
                if (!raw) return [];
                var parsed = JSON.parse(raw);
                if (!Array.isArray(parsed)) return [];
                return parsed.filter(function (item) {
                    return item && (item.role === "user" || item.role === "assistant") && typeof item.text === "string";
                }).slice(-28);
            } catch (e) {
                return [];
            }
        }

        function setOpen(open) {
            root.classList.toggle("is-open", open);
            panel.setAttribute("aria-hidden", open ? "false" : "true");
            toggle.setAttribute("aria-expanded", open ? "true" : "false");
            if (open) {
                window.setTimeout(function () {
                    input.focus();
                    scrollToBottom();
                }, 80);
            }
        }

        function containsAny(text, list) {
            for (var i = 0; i < list.length; i++) {
                if (text.indexOf(list[i]) !== -1) return true;
            }
            return false;
        }

        function recommendService(goalText) {
            var t = normalizeText(goalText);
            if (containsAny(t, ["redisen", "redesign", "mejorar web", "web actual", "modernizar"])) {
                return cfg.services[1];
            }
            if (containsAny(t, ["landing", "ads", "campana", "conversion", "anuncio"])) {
                return cfg.services[2];
            }
            if (containsAny(t, ["logo", "marca", "identidad"])) {
                return cfg.services[3];
            }
            if (containsAny(t, ["google business", "presencia digital", "local visibility", "social", "perfil"])) {
                return cfg.services[4];
            }
            return cfg.services[0];
        }

        function servicesSummary() {
            var lines = [];
            for (var i = 0; i < cfg.services.length; i++) {
                lines.push("- " + cfg.services[i].name + ": " + cfg.services[i].url);
            }
            return "Estos son nuestros servicios:\n" + lines.join("\n") + "\nVer todos: " + cfg.servicesUrl;
        }

        function contactSummary() {
            return "Canales directos:\n- Telefono: " + cfg.phone + "\n- WhatsApp: " + cfg.whatsapp + "\n- Correo: " + cfg.email + "\n- Horario: " + cfg.schedule + "\nFormulario: " + cfg.contactUrl;
        }

        function startQualify() {
            qualifyMode = true;
            qualifyStep = 1;
            qualifyAnswers = { business: "", goal: "", timeline: "" };
            return "Perfecto. Puedo ayudarte a elegir.\n1) Que tipo de negocio tienes?";
        }

        function handleQualify(userText) {
            if (qualifyStep === 1) {
                qualifyAnswers.business = userText;
                qualifyStep = 2;
                return "2) Cual es tu objetivo principal? (mas leads, rediseño, campaña, branding)";
            }

            if (qualifyStep === 2) {
                qualifyAnswers.goal = userText;
                qualifyStep = 3;
                return "3) Cual es tu tiempo ideal o fecha objetivo de lanzamiento?";
            }

            qualifyAnswers.timeline = userText;
            qualifyMode = false;
            qualifyStep = 0;

            var svc = recommendService(qualifyAnswers.goal || "");
            return "Recomendacion inicial: " + svc.name + ".\nRuta sugerida: " + svc.url + "\nSiguiente paso: comparte tu nombre y telefono en " + cfg.contactUrl + " y te enviaremos un alcance dentro de 1 dia habil.";
        }

        function resolveByService(text) {
            for (var i = 0; i < cfg.services.length; i++) {
                var service = cfg.services[i];
                if (containsAny(text, service.keywords || [])) {
                    return "Buena eleccion: " + service.name + ".\nDetalles y alcance: " + service.url + "\nSi quieres, puedo ayudarte a definir alcance y tiempos.";
                }
            }
            return "";
        }

        function getRuleReply(message) {
            if (qualifyMode) {
                return handleQualify(message);
            }

            var t = normalizeText(message);
            var serviceReply = resolveByService(t);
            if (serviceReply) return serviceReply;

            if (containsAny(t, ["hola", "hello", "hi", "buenas"])) {
                return "Hola. Soy " + assistantName + ", el asistente digital de " + cfg.company + ". Puedo ayudarte con servicios, precios, tiempos y opciones de contacto.";
            }

            if (containsAny(t, ["precio", "cost", "costo", "price", "budget", "presupuesto", "cotizacion", "quote"])) {
                return "Rango actual: " + cfg.payment + ".\nSi compartes tu objetivo y tu tiempo ideal, puedo sugerirte el mejor servicio antes de cotizar.";
            }

            if (containsAny(t, ["tiempo", "timeline", "duration", "duracion", "when", "fecha"])) {
                return "Depende del servicio. Ejemplos:\n- Creacion de Sitios Web: 2-4 semanas\n- Rediseño Web: 2-3 semanas\n- Paginas de Aterrizaje: 5-10 dias";
            }

            if (containsAny(t, ["contacto", "contact", "phone", "telefono", "whatsapp", "email", "correo", "llamar", "call"])) {
                return contactSummary();
            }

            if (containsAny(t, ["portafolio", "portfolio", "casos", "case study", "examples"])) {
                return "Puedes revisar casos por servicio aqui: " + cfg.portfolioUrl;
            }

            if (containsAny(t, ["servicios", "services", "que ofrecen", "what do you offer"])) {
                return servicesSummary();
            }

            if (containsAny(t, ["recomienda", "recommend", "elegir", "choose", "no se", "not sure"])) {
                return startQualify();
            }

                return "Puedo ayudarte con:\n- Elegir el servicio correcto\n- Precios y tiempos\n- Opciones de contacto rapido\nEscribe: 'ayudame a elegir el mejor servicio'.";
        }

        function servicesSummary() {
            var lines = [];
            for (var i = 0; i < cfg.services.length; i++) {
                lines.push("- " + serviceLabel(cfg.services[i]) + ": " + cfg.services[i].url);
            }
            return tr("Estos son nuestros servicios:\n", "These are our services:\n") +
                lines.join("\n") +
                "\n" +
                tr("Ver todos: ", "See all: ") +
                cfg.servicesUrl;
        }

        function contactSummary() {
            return tr("Canales directos:\n- Telefono: ", "Direct channels:\n- Phone: ") + cfg.phone +
                "\n- WhatsApp: " + cfg.whatsapp +
                "\n- " + tr("Correo: ", "Email: ") + cfg.email +
                "\n- " + tr("Horario: ", "Schedule: ") + cfg.schedule +
                "\n" + tr("Formulario: ", "Form: ") + cfg.contactUrl;
        }

        function startQualify() {
            qualifyMode = true;
            qualifyStep = 1;
            qualifyAnswers = { business: "", goal: "", timeline: "" };
            return tr(
                "Perfecto. Puedo ayudarte a elegir.\n1) Que tipo de negocio tienes?",
                "Perfect. I can help you choose.\n1) What type of business do you have?"
            );
        }

        function handleQualify(userText) {
            if (qualifyStep === 1) {
                qualifyAnswers.business = userText;
                qualifyStep = 2;
                return tr(
                    "2) Cual es tu objetivo principal? (mas leads, rediseño, campaña, branding)",
                    "2) What is your main goal? (more leads, redesign, campaign, branding)"
                );
            }

            if (qualifyStep === 2) {
                qualifyAnswers.goal = userText;
                qualifyStep = 3;
                return tr(
                    "3) Cual es tu tiempo ideal o fecha objetivo de lanzamiento?",
                    "3) What is your ideal timeline or target launch date?"
                );
            }

            qualifyAnswers.timeline = userText;
            qualifyMode = false;
            qualifyStep = 0;

            var svc = recommendService(qualifyAnswers.goal || "");
            return tr("Recomendacion inicial: ", "Initial recommendation: ") + serviceLabel(svc) +
                ".\n" + tr("Ruta sugerida: ", "Suggested path: ") + svc.url +
                "\n" + tr("Siguiente paso: comparte tu nombre y telefono en ", "Next step: share your name and phone at ") +
                cfg.contactUrl +
                tr(" y te enviaremos un alcance dentro de 1 dia habil.", " and we will send you a scope within 1 business day.");
        }

        function resolveByService(text) {
            for (var i = 0; i < cfg.services.length; i++) {
                var service = cfg.services[i];
                if (containsAny(text, service.keywords || [])) {
                    return tr("Buena eleccion: ", "Good choice: ") + serviceLabel(service) +
                        ".\n" + tr("Detalles y alcance: ", "Details and scope: ") + service.url +
                        "\n" + tr("Si quieres, puedo ayudarte a definir alcance y tiempos.", "If you want, I can help you define scope and timeline.");
                }
            }
            return "";
        }

        function getRuleReply(message) {
            if (qualifyMode) {
                return handleQualify(message);
            }

            var normalized = normalizeText(message);
            var serviceReply = resolveByService(normalized);
            if (serviceReply) return serviceReply;

            if (containsAny(normalized, ["hola", "hello", "hi", "buenas"])) {
                return tr(
                    "Hola. Soy ",
                    "Hi. I am "
                ) + assistantName + tr(
                    ", el asistente digital de ",
                    ", the digital assistant for "
                ) + cfg.company + tr(
                    ". Puedo ayudarte con servicios, precios, tiempos y opciones de contacto.",
                    ". I can help with services, pricing, timelines, and contact options."
                );
            }

            if (containsAny(normalized, ["precio", "cost", "costo", "price", "budget", "presupuesto", "cotizacion", "quote"])) {
                return tr(
                    "Rango actual: ",
                    "Current range: "
                ) + cfg.payment + tr(
                    ".\nSi compartes tu objetivo y tu tiempo ideal, puedo sugerirte el mejor servicio antes de cotizar.",
                    ".\nIf you share your goal and ideal timeline, I can suggest the best service before quoting."
                );
            }

            if (containsAny(normalized, ["tiempo", "timeline", "duration", "duracion", "when", "fecha"])) {
                return tr(
                    "Depende del servicio. Ejemplos:\n- Creacion de Sitios Web: 2-4 semanas\n- Rediseño Web: 2-3 semanas\n- Paginas de Aterrizaje: 5-10 dias",
                    "It depends on the service. Examples:\n- Website Creation: 2-4 weeks\n- Website Redesign: 2-3 weeks\n- Landing Pages: 5-10 days"
                );
            }

            if (containsAny(normalized, ["contacto", "contact", "phone", "telefono", "whatsapp", "email", "correo", "llamar", "call"])) {
                return contactSummary();
            }

            if (containsAny(normalized, ["portafolio", "portfolio", "casos", "case study", "examples"])) {
                return tr("Puedes revisar casos por servicio aqui: ", "You can review service-based case studies here: ") + cfg.portfolioUrl;
            }

            if (containsAny(normalized, ["servicios", "services", "que ofrecen", "what do you offer"])) {
                return servicesSummary();
            }

            if (containsAny(normalized, ["recomienda", "recommend", "elegir", "choose", "no se", "not sure"])) {
                return startQualify();
            }

            return tr(
                "Puedo ayudarte con:\n- Elegir el servicio correcto\n- Precios y tiempos\n- Opciones de contacto rapido\nEscribe: 'ayudame a elegir el mejor servicio'.",
                "I can help with:\n- Choosing the right service\n- Pricing and timelines\n- Fast contact options\nType: 'help me choose the best service'."
            );
        }

        function bootWelcome() {
            if (history.length > 0) {
                history.forEach(function (item) {
                    renderMessage(item.role === "assistant" ? "bot" : "user", item.text);
                });
                return;
            }

            var welcome = tr("Hola, soy ", "Hi, I am ") + assistantName + tr(", el asistente digital de ", ", the digital assistant for ") + cfg.company + ".";
            var helper = tr(
                "Puedo ayudarte a elegir el servicio correcto, estimar tiempos y llevarte al canal de contacto ideal.",
                "I can help you choose the right service, estimate timelines, and take you to the best contact channel."
            );
            history.push({ role: "assistant", text: welcome });
            history.push({ role: "assistant", text: helper });
            renderMessage("bot", welcome);
            renderMessage("bot", helper);
            persistHistory();
        }

        function processMessage(text) {
            var prompt = String(text || "").trim();
            if (!prompt) return;

            history.push({ role: "user", text: prompt });
            renderMessage("user", prompt);
            persistHistory();

            addTyping();
            window.setTimeout(function () {
                removeTyping();
                var reply = getRuleReply(prompt);
                history.push({ role: "assistant", text: reply });
                renderMessage("bot", reply);
                persistHistory();
                input.focus();
            }, 320);
        }

        function bootWelcome() {
            if (history.length > 0) {
                history.forEach(function (item) {
                    renderMessage(item.role === "assistant" ? "bot" : "user", item.text);
                });
                return;
            }

            var welcome = "Hola, soy " + assistantName + ", el asistente digital de " + cfg.company + ".";
            var helper = "Puedo ayudarte a elegir el servicio correcto, estimar tiempos y llevarte al canal de contacto ideal.";
            history.push({ role: "assistant", text: welcome });
            history.push({ role: "assistant", text: helper });
            renderMessage("bot", welcome);
            renderMessage("bot", helper);
            persistHistory();
        }

        toggle.addEventListener("click", function () {
            setOpen(!root.classList.contains("is-open"));
        });

        closeBtn.addEventListener("click", function () {
            setOpen(false);
        });

        form.addEventListener("submit", function (event) {
            event.preventDefault();
            var value = input.value;
            input.value = "";
            processMessage(value);
        });

        quickButtons.forEach(function (btn) {
            btn.addEventListener("click", function () {
                processMessage(btn.getAttribute("data-quick") || btn.textContent || "");
            });
        });

        document.addEventListener("keydown", function (event) {
            if (event.key === "Escape") {
                setOpen(false);
            }
        });

        syncQuickButtons();
        history = loadHistory();
        bootWelcome();
    });
})();
</script>
