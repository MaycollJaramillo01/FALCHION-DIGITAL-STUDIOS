(function() {
    var options = window.socialButtonsOptions || {
        whatsapp: "8178616700",
        facebook: "",
        instagram: "",
        email: "",
        call: "",
        messenger: "accenttires817",
        button_color: "#333",
        button_hover_color: "#555",
        button_size: "50px",
        position: "left",
        bottom: "20px",
        gap: "10px"
    };

    function createButton(iconClass, href, color) {
        var link = document.createElement('a');
        link.href = href;
        link.target = '_blank';
        link.style.backgroundColor = color;
        link.style.color = '#fff';
        link.style.fontSize = '20px';
        link.style.padding = '15px';
        link.style.borderRadius = '50%';
        link.style.textAlign = 'center';
        link.style.width = options.button_size;
        link.style.height = options.button_size;
        link.style.display = 'flex';
        link.style.alignItems = 'center';
        link.style.justifyContent = 'center';
        link.style.textDecoration = 'none';
        link.style.transition = 'background-color 0.3s, transform 0.3s';
        link.style.marginBottom = options.gap;
        link.style.animation = 'rotateIn 0.5s';
        link.onmouseover = function() { link.style.transform = 'rotate(360deg)'; };
        link.onmouseout = function() { link.style.transform = 'rotate(0deg)'; };

        var icon = document.createElement('i');
        icon.className = iconClass;
        link.appendChild(icon);

        return link;
    }

    var mainButton = document.createElement('div');
    mainButton.style.backgroundColor = 'rgb(222, 14, 29)'; // Color rojo oscuro
    mainButton.style.color = '#fff';
    mainButton.style.fontSize = '20px';
    mainButton.style.padding = '15px';
    mainButton.style.borderRadius = '50%';
    mainButton.style.textAlign = 'center';
    mainButton.style.width = options.button_size;
    mainButton.style.height = options.button_size;
    mainButton.style.display = 'flex';
    mainButton.style.alignItems = 'center';
    mainButton.style.justifyContent = 'center';
    mainButton.style.textDecoration = 'none';
    mainButton.style.transition = 'background-color 0.3s, transform 0.3s';
    mainButton.style.position = 'fixed';
    mainButton.style.bottom = options.bottom;
    mainButton.style[options.position] = '20px';
    mainButton.style.zIndex = '1000';
    mainButton.style.cursor = 'pointer';
    mainButton.style.animation = 'bounce 2s infinite'; // Animaci贸n de rebote

    var mainIcon = document.createElement('i');
    mainIcon.className = 'fa fa-share-alt';
    mainButton.appendChild(mainIcon);

    document.body.appendChild(mainButton);

    var container = document.createElement('div');
    container.style.position = 'fixed';
    container.style.bottom = `calc(${options.bottom} + ${options.button_size} + ${options.gap})`;
    container.style[options.position] = '20px';
    container.style.display = 'none';
    container.style.flexDirection = 'column';
    container.style.zIndex = '1000';

    if (options.whatsapp) {
        container.appendChild(createButton('fab fa-whatsapp', 'https://api.whatsapp.com/send?phone=1' + options.whatsapp, '#25D366'));
    }
    if (options.facebook) {
        container.appendChild(createButton('fab fa-facebook-f', 'https://www.facebook.com/' + options.facebook, '#3b5998'));
    }
    if (options.instagram) {
        container.appendChild(createButton('fab fa-instagram', 'https://www.instagram.com/' + options.instagram, '#E4405F'));
    }
    if (options.email) {
        container.appendChild(createButton('fa fa-envelope', 'mailto:' + options.email, '#D44638'));
    }
    if (options.call) {
        container.appendChild(createButton('fa fa-phone', 'tel:1' + options.call, '#34B7F1'));
    }
    if (options.youtube) {
        container.appendChild(createButton('fab fa-youtube', 'https://www.youtube.com/' + options.youtube, '#FF0000'));
    }
    if (options.messenger) {
        container.appendChild(createButton('fab fa-facebook-messenger', 'http://m.me/' + options.messenger, '#0084FF'));
    }

    document.body.appendChild(container);

    mainButton.onclick = function() {
        container.style.display = container.style.display === 'none' ? 'flex' : 'none';
    };

    // Animaciones CSS
    var style = document.createElement('style');
    style.innerHTML = `
        @keyframes rotateIn {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-30px);
            }
            60% {
                transform: translateY(-15px);
            }
        }
    `;
    document.head.appendChild(style);
})();