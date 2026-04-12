<?php
if ( ! defined( 'ABSPATH' ) ) {
	return;
}

/**
 * Render the lightweight J&M Home Improvement chatbot in the footer.
 */
function jm_home_improvement_chatbot_ui() {
	$ajax_url = esc_url( admin_url( 'admin-ajax.php' ) );
	?>
	<div id="jm-chatbot-wrapper" class="jm-chatbot-wrapper jm-chatbot-wrapper--closed" aria-live="polite">
		<button id="jm-chatbot-toggle" class="jm-chatbot-toggle" type="button" aria-expanded="false" aria-controls="jm-chatbot-card">
			<span class="jm-chatbot-toggle-icon" aria-hidden="true">
				<img src="https://8ml.014.mytemp.website/jjmhomeimprovement.net/wp-content/uploads/2025/12/logo-7.png" alt="" />
			</span>
		</button>
		<div id="jm-chatbot-card" class="jm-chatbot-card" aria-label="J&M Assistant chat">
			<header class="jm-chatbot-header">
				<div class="jm-chatbot-avatar" aria-hidden="true">
					<img src="https://8ml.014.mytemp.website/jjmhomeimprovement.net/wp-content/uploads/2025/12/logo-7.png" alt="J&M Home Improvement logo" />
				</div>
				<div>
					<p class="jm-chatbot-company">J&amp;M Assistant</p>
					<p class="jm-chatbot-subtitle">Quality advice in seconds</p>
				</div>
			</header>
			<div class="jm-chatbot-body">
				<div id="jm-chatbot-messages" class="jm-chatbot-messages"></div>
				<div class="jm-chatbot-quick">
					<button type="button" data-value="Free Estimate">Free Estimate</button>
					<button type="button" data-value="Painting Services">Painting Services</button>
					<button type="button" data-value="Drywall & Power Washing">Drywall / Power Washing</button>
					<button type="button" data-value="Cabinet Refinishing">Cabinet Refinishing</button>
					<button type="button" data-value="Remodeling Expertise">Remodeling Expertise</button>
				</div>
			</div>
			<div class="jm-chatbot-input">
				<div class="jm-chatbot-input-field">
					<input id="jm-chatbot-input" type="text" placeholder="Ask me about your project..." aria-label="Type your message" autocomplete="off" />
					<button id="jm-chatbot-send" type="button" aria-label="Send message">
						<span class="jm-chatbot-send-icon" aria-hidden="true">➤</span>
					</button>
				</div>
			</div>
		</div>
	</div>
	<style>
		#jm-chatbot-wrapper {
			position: fixed;
			bottom: 30px;
			right: 30px;
			z-index: 9999;
			font-family: "Poppins", "Inter", "Segoe UI", system-ui, sans-serif;
		}
		.jm-chatbot-card {
			width: 320px;
			max-width: 92vw;
			border-radius: 28px;
			background: linear-gradient(180deg, #ffffff 0%, #eef1ff 100%);
			box-shadow: 0 30px 45px rgba(8, 24, 63, 0.3);
			overflow: hidden;
			border: none;
			display: flex;
			flex-direction: column;
		}
		.jm-chatbot-wrapper--closed .jm-chatbot-card {
			opacity: 0;
			transform: translateY(30px);
			pointer-events: none;
			visibility: hidden;
		}
		.jm-chatbot-wrapper--open .jm-chatbot-card {
			opacity: 1;
			transform: translateY(0);
			pointer-events: auto;
			visibility: visible;
		}
		.jm-chatbot-toggle {
			position: fixed;
			bottom: 30px;
			right: 30px;
			width: 64px;
			height: 64px;
			background: linear-gradient(145deg, #001f3f 0%, #0b2c79 100%);
			color: #ffffff;
			border: none;
			border-radius: 100%;
			box-shadow: 0 12px 30px rgba(0, 0, 0, 0.35);
			cursor: pointer;
			display: inline-flex;
			align-items: center;
			justify-content: center;
			padding: 0;
			animation: jm-chatbot-bounce 3s ease-in-out infinite;
			z-index: 10000;
		}
		.jm-chatbot-toggle-icon {
			width: 48px;
			height: 48px;
			border-radius: 100%;
			background: #ffffff;
			display: inline-flex;
			overflow: hidden;
			align-items: center;
			justify-content: center;
			padding: 3px;
		}
		.jm-chatbot-toggle-icon img {
			width: 100%;
			height: 100%;
			object-fit: cover;
			border-radius: 50%;
		}
		.jm-chatbot-header {
			background: linear-gradient(135deg, #002a5c 0%, #0b2c79 100%);
			padding: 18px;
			display: flex;
			align-items: center;
			gap: 12px;
			color: #ffffff;
			box-shadow: 0 2px 10px rgba(0, 0, 0, 0.35);
		}
		.jm-chatbot-avatar {
			width: 46px;
			height: 46px;
			border-radius: 50%;
			background: #ffffff;
			display: flex;
			align-items: center;
			justify-content: center;
			box-shadow: inset 0 0 0 2px #0b2c79;
		}
		.jm-chatbot-avatar img {
			display: block;
			width: 38px;
			height: 38px;
			border-radius: 50%;
			object-fit: cover;
		}
		.jm-chatbot-company {
			font-size: 15px;
			margin: 0;
			font-weight: 600;
			letter-spacing: 0.4px;
		}
		.jm-chatbot-subtitle {
			margin: 0;
			font-size: 12px;
			opacity: 0.9;
		}
		.jm-chatbot-body {
			padding: 18px 20px 14px;
			background: #ffffff;
			display: flex;
			flex-direction: column;
			gap: 12px;
		}
		.jm-chatbot-messages {
			display: flex;
			flex-direction: column;
			gap: 12px;
			max-height: 240px;
			overflow-y: auto;
			padding-right: 6px;
			background: #ffffff;
			border-radius: 22px;
			box-shadow: inset 0 0 0 1px rgba(11, 44, 121, 0.08);
			padding: 16px;
		}
		.jm-chatbot-message {
			padding: 14px 18px;
			border-radius: 20px;
			font-size: 14px;
			line-height: 1.6;
			max-width: 85%;
			word-break: break-word;
			background: #eef2ff;
			color: #0b2c79;
			box-shadow: 0 20px 35px rgba(0, 0, 0, 0.08);
		}
		.jm-chatbot-message.bot {
			background: #ffffff;
		}
		.jm-chatbot-message.user {
			align-self: flex-end;
			background: #ffffff;
			color: #0b2c79;
			box-shadow: 0 12px 20px rgba(255, 193, 7, 0.3);
		}
		.jm-chatbot-quick {
			display: flex;
			flex-direction: column;
			gap: 9px;
		}
		.jm-chatbot-quick button {
			padding: 13px 20px;
			background: #ffffff;
			border: 2px solid #0b2c79;
			border-radius: 999px;
			color: #0b2c79;
			font-size: 14px;
			font-weight: 600;
			text-transform: none;
			box-shadow: inset 0 0 0 1px rgba(11, 44, 121, 0.4);
			cursor: pointer;
			transition: all 0.2s ease;
		}
		.jm-chatbot-quick button:first-child {
			background: #0b2c79;
			color: #ffffff;
			box-shadow: 0 10px 20px rgba(0, 42, 92, 0.4);
			border-color: #0b2c79;
		}
		.jm-chatbot-quick button:hover {
			background: #ffd54f;
			color: #0b2c79;
			box-shadow: inset 0 0 0 2px rgba(11, 44, 121, 0.4);
		}
		.jm-chatbot-input {
			padding: 14px 18px 22px;
			background: #f7f7ff;
		}
		.jm-chatbot-input-field {
			display: flex;
			align-items: center;
			gap: 10px;
			background: #ffffff;
			border-radius: 999px;
			padding: 8px 14px;
			box-shadow: inset 0 0 0 1px rgba(11, 44, 121, 0.15);
		}
		.jm-chatbot-input-field input {
			flex: 1;
			border: none;
			background: transparent;
			padding: 10px;
			font-size: 14px;
			color: #0b2c79;
			outline: none;
		}
		.jm-chatbot-input-field button {
			width: 48px;
			height: 48px;
			border-radius: 50%;
			background: linear-gradient(145deg, #ffd54f 0%, #ffc107 100%);
			border: none;
			display: flex;
			align-items: center;
			justify-content: center;
			cursor: pointer;
			box-shadow: 0 16px 30px rgba(255, 193, 7, 0.4);
			transition: transform 0.2s ease;
		}
		.jm-chatbot-input-field button:hover {
			transform: translateY(-2px);
		}
		.jm-chatbot-send-icon {
			font-size: 16px;
			color: #002a5c;
			font-weight: 700;
		}
		@keyframes jm-chatbot-bounce {
			0% {
				transform: translateY(0);
			}
			50% {
				transform: translateY(-6px);
			}
			100% {
				transform: translateY(0);
			}
		}
	</style>
	<script>
		(function () {
			const root = document.getElementById('jm-chatbot-wrapper');
			if (!root) {
				return;
			}
			const messages = root.querySelector('#jm-chatbot-messages');
			const input = root.querySelector('#jm-chatbot-input');
			const sendButton = root.querySelector('#jm-chatbot-send');
			const quickButtons = root.querySelectorAll('.jm-chatbot-quick button');
			const toggleButton = root.querySelector('#jm-chatbot-toggle');
			const ajaxEndpoint = '<?php echo $ajax_url; ?>';
			let leadStage = 0;
			const leadData = {
				name: '',
				contact: '',
				reason: 'Free Estimate'
			};
			const leadKeywords = ['free estimate', 'estimate', 'consultation', 'quote', 'presupuesto', 'consulta', 'ayuda', 'cotizacion', 'cotizacion', 'presupuesta', 'valoracion'];
			const servicesKeywords = ['painting', 'paint', 'cabinet', 'drywall', 'power wash', 'power washing', 'pressure wash'];
			const specialsKeywords = ['offer', 'special', 'deal', 'discount', 'promotion'];
			const thanksKeywords = ['thank', 'thanks', 'gracias'];
			const responses = {
				greeting: 'Hi! I can help with interior/exterior painting, drywall repair/installation, power washing, cabinet refinishing, or general remodeling. Ask a question or tap a quick option.',
				services: 'We provide residential & commercial painting, drywall, power washing, and cabinet refinishing plus general remodeling across Glen Burnie and the surrounding Maryland communities with free estimates.',
				specials: 'Ask about our free estimates, seasonal specials, or how our bilingual team can schedule a visit from Monday to Saturday between 8:00 AM and 5:00 PM.',
				thanks: 'You’re welcome! Ready for a Free Estimate? Share your info and someone will be in touch soon.',
				fallback: 'Tell me a bit more about your project (painting, drywall, power washing, cabinets, etc.) and I will point you to the right service or a Free Estimate.'
			};

			function addMessage(kind, text) {
				const bubble = document.createElement('div');
				bubble.className = 'jm-chatbot-message ' + kind;
				bubble.textContent = text;
				messages.appendChild(bubble);
				messages.scrollTop = messages.scrollHeight;
			}

			function normalize(text) {
				return text.trim().toLowerCase();
			}

			function includesKeyword(list, text) {
				return list.some(function (keyword) {
					return text.indexOf(keyword) !== -1;
				});
			}

			function beginLeadFlow(trigger) {
				leadStage = 1;
				leadData.reason = trigger || 'Free Estimate';
				addMessage('bot', 'Great! Let us start your Free Estimate. What is your full name?');
			}

			function handleLeadResponse(text) {
				if (leadStage === 1) {
					leadData.name = text;
					leadStage = 2;
					addMessage('bot', 'Thanks, ' + text + '. Please share your phone number or email so we can reach you.');
					return true;
				}
				if (leadStage === 2) {
					leadData.contact = text;
					addMessage('bot', 'Perfect! Sending your request now and someone will reach out soon.');
					sendLeadToServer();
					leadStage = 0;
					leadData.name = '';
					leadData.contact = '';
					leadData.reason = 'Free Estimate';
					return true;
				}
				return false;
			}

			function sendLeadToServer() {
				const payload = new URLSearchParams();
				payload.append('action', 'jm_home_improvement_lead');
				payload.append('jm_lead_name', leadData.name);
				payload.append('jm_lead_contact', leadData.contact);
				payload.append('jm_lead_message', leadData.reason);

				fetch(ajaxEndpoint, {
					method: 'POST',
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
					},
					body: payload.toString()
				})
					.then(function (res) {
						return res.json();
					})
					.then(function (body) {
						if (body && body.success) {
							addMessage('bot', 'Thanks! We received your information and will reach out shortly.');
						} else {
							addMessage('bot', 'Oops! Something went wrong. I will let the team know and they will follow up.');
						}
					})
					.catch(function () {
						addMessage('bot', 'We ran into an issue sending your request. Please try again or email us directly.');
					});
			}

			function detectIntent(text) {
				if (includesKeyword(leadKeywords, text)) {
					return 'lead';
				}
				if (includesKeyword(servicesKeywords, text)) {
					return 'services';
				}
				if (includesKeyword(specialsKeywords, text)) {
					return 'specials';
				}
				if (includesKeyword(thanksKeywords, text)) {
					return 'thanks';
				}
				return 'greeting';
			}

			function handleMessage(text) {
				if (!text) {
					return;
				}
				const trimmed = text.trim();
				if (!trimmed) {
					return;
				}
				const normalized = normalize(trimmed);
				addMessage('user', trimmed);
				if (leadStage > 0 && handleLeadResponse(trimmed)) {
					return;
				}
				const intent = detectIntent(normalized);
				if (intent === 'lead') {
					beginLeadFlow(trimmed);
					return;
				}
				addMessage('bot', responses[intent] || responses.fallback);
			}

			if (toggleButton) {
				toggleButton.addEventListener('click', function () {
					const opened = root.classList.toggle('jm-chatbot-wrapper--open');
					root.classList.toggle('jm-chatbot-wrapper--closed', !opened);
					toggleButton.setAttribute('aria-expanded', opened ? 'true' : 'false');
				});
			}

			sendButton.addEventListener('click', function () {
				handleMessage(input.value);
				input.value = '';
				input.focus();
			});
			input.addEventListener('keydown', function (event) {
				if (event.key === 'Enter') {
					event.preventDefault();
					sendButton.click();
				}
			});
			quickButtons.forEach(function (btn) {
				btn.addEventListener('click', function () {
					handleMessage(btn.getAttribute('data-value') || btn.textContent);
				});
			});

			addMessage('bot', 'Hi! I am J&M Assistant. Need a Free Estimate or expert advice?');
		})();
	</script>
	<?php
}

function jm_home_improvement_chatbot_lead_handler() {
	if ( ! isset( $_POST['jm_lead_name'], $_POST['jm_lead_contact'] ) ) {
		wp_send_json_error( 'Missing lead data.' );
	}

	$name    = sanitize_text_field( wp_unslash( $_POST['jm_lead_name'] ) );
	$contact = sanitize_text_field( wp_unslash( $_POST['jm_lead_contact'] ) );
	$reason  = sanitize_text_field( wp_unslash( $_POST['jm_lead_message'] ?? 'Free Estimate' ) );
	$to      = 'jjmhomeimprovementllc@gmail.com';
	$subject = sprintf( 'Chatbot lead from %s', $name ?: 'an interested homeowner' );
	$body    = sprintf(
		"<p><strong>Name:</strong> %s</p><p><strong>Contact:</strong> %s</p><p><strong>Interest:</strong> %s</p><p><strong>Page:</strong> %s</p><p><strong>Timestamp:</strong> %s</p>",
		esc_html( $name ),
		esc_html( $contact ),
		esc_html( $reason ),
		esc_html( wp_get_referer() ?: home_url() ),
		esc_html( current_time( 'Y-m-d H:i:s' ) )
	);
	$headers = array( 'Content-Type: text/html; charset=UTF-8' );
	$sent    = wp_mail( $to, $subject, $body, $headers );

	if ( $sent ) {
		wp_send_json_success( 'Lead received.' );
	}

	wp_send_json_error( 'Mail delivery failed.' );
}

add_action( 'wp_footer', 'jm_home_improvement_chatbot_ui' );
add_action( 'wp_ajax_jm_home_improvement_lead', 'jm_home_improvement_chatbot_lead_handler' );
add_action( 'wp_ajax_nopriv_jm_home_improvement_lead', 'jm_home_improvement_chatbot_lead_handler' );
