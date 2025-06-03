

setInterval(showAdPopup, rand(5000, 20000))

var open = false;

function showTosPopup() {
    // Overlay plein écran
    const overlay = document.createElement('div');
    overlay.style.position = 'fixed';
    overlay.style.top = '0';
    overlay.style.left = '0';
    overlay.style.width = '100%';
    overlay.style.height = '100%';
    overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
    overlay.style.zIndex = '99999';
    overlay.style.display = 'flex';
    overlay.style.alignItems = 'center';
    overlay.style.justifyContent = 'center';
    overlay.style.fontFamily = 'Arial, sans-serif';

    // Popup container
    const popup = document.createElement('div');
    popup.style.backgroundColor = '#ffffff';
    popup.style.padding = '40px';
    popup.style.borderRadius = '12px';
    popup.style.boxShadow = '0 10px 30px rgba(0, 0, 0, 0.5)';
    popup.style.maxWidth = '600px';
    popup.style.width = '90%';
    popup.style.textAlign = 'center';
    popup.style.border = '3px solid #ff4444';

    // Titre
    const title = document.createElement('h2');
    title.textContent = 'Terms of Service Agreement';
    title.style.color = '#ff4444';
    title.style.marginBottom = '30px';
    title.style.fontSize = '24px';
    title.style.fontWeight = 'bold';

    // Message principal
    const message = document.createElement('p');
    message.textContent = 'To access this website, you must agree to abandon your fundamental rights as well as renounce your status as a human being.';
    message.style.fontSize = '18px';
    message.style.lineHeight = '1.6';
    message.style.color = '#333';
    message.style.marginBottom = '40px';
    message.style.padding = '20px';
    message.style.backgroundColor = '#ffe6e6';
    message.style.borderRadius = '8px';
    message.style.border = '2px solid #ff9999';

    // Petite note légale
    const legalNote = document.createElement('p');
    legalNote.textContent = 'By clicking "Accept", you acknowledge that you have read and understood these terms.';
    legalNote.style.fontSize = '12px';
    legalNote.style.color = '#666';
    legalNote.style.marginBottom = '30px';
    legalNote.style.fontStyle = 'italic';

    // Bouton Accept
    const acceptBtn = document.createElement('button');
    acceptBtn.textContent = 'Accept';
    acceptBtn.style.backgroundColor = '#ff4444';
    acceptBtn.style.color = 'white';
    acceptBtn.style.border = 'none';
    acceptBtn.style.padding = '15px 40px';
    acceptBtn.style.fontSize = '18px';
    acceptBtn.style.fontWeight = 'bold';
    acceptBtn.style.borderRadius = '8px';
    acceptBtn.style.cursor = 'pointer';
    acceptBtn.style.transition = 'background-color 0.3s ease';
    acceptBtn.style.minWidth = '150px';

    // Effet hover sur le bouton
    acceptBtn.addEventListener('mouseenter', function () {
        this.style.backgroundColor = '#cc0000';
    });

    acceptBtn.addEventListener('mouseleave', function () {
        this.style.backgroundColor = '#ff4444';
    });

    // Fonction fermer
    function closePopup() {
        document.body.removeChild(overlay);
    }

    // Event listener pour le bouton
    acceptBtn.addEventListener('click', closePopup);

    // Assemblage du popup
    popup.appendChild(title);
    popup.appendChild(message);
    popup.appendChild(legalNote);
    popup.appendChild(acceptBtn);
    overlay.appendChild(popup);

    // Ajouter au DOM
    document.body.appendChild(overlay);
}

function showAdPopup() {
    if (open) {
        return false;
    }
    open = true;
    const IMAGE_NAME = rand(1, NB_IMAGES) + ".png";

    // Créer le popup
    const popup = document.createElement('div');
    popup.style.position = 'fixed';
    popup.style.top = '50%';
    popup.style.left = '50%';
    popup.style.transform = 'translate(-50%, -50%)';
    popup.style.width = '700px';
    popup.style.height = '500px';
    popup.style.backgroundColor = '#ffffff';
    popup.style.border = '2px solid #dadce0';
    popup.style.borderRadius = '8px';
    popup.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.3)';
    popup.style.zIndex = '10000';
    popup.style.padding = '20px';
    popup.style.fontFamily = 'Arial, sans-serif';

    // Overlay sombre
    const overlay = document.createElement('div');
    overlay.style.position = 'fixed';
    overlay.style.top = '0';
    overlay.style.left = '0';
    overlay.style.width = '100%';
    overlay.style.height = '100%';
    overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
    overlay.style.zIndex = '9999';

    // Bouton fermer
    const closeBtn = document.createElement('button');
    closeBtn.textContent = '×';
    closeBtn.style.position = 'absolute';
    closeBtn.style.top = '10px';
    closeBtn.style.right = '10px';
    closeBtn.style.width = '30px';
    closeBtn.style.height = '30px';
    closeBtn.style.border = 'none';
    closeBtn.style.backgroundColor = '#ff4444';
    closeBtn.style.color = 'white';
    closeBtn.style.fontSize = '20px';
    closeBtn.style.borderRadius = '50%';
    closeBtn.style.cursor = 'pointer';
    closeBtn.style.fontWeight = 'bold';

    // Contenu du popup
    const content = document.createElement('div');
    content.innerHTML = `
        <img src=${browser.runtime.getURL('images/ads/' + IMAGE_NAME)
        } width = 500 />
        <h2 style="color: #1a73e8; margin-top: 0;">Special Offer!</h2>
        <p style="color: #333; font-size: 16px;">Don't miss this amazing deal!</p>
        <p style="color: #666; font-size: 14px;">Limited time offer - Act now!</p>
`;

    // Countdown qui clignote
    const countdown = document.createElement('div');
    countdown.style.fontSize = '24px';
    countdown.style.fontWeight = 'bold';
    countdown.style.color = '#ff0000';
    countdown.style.textAlign = 'center';
    countdown.style.marginTop = '20px';
    countdown.style.animation = 'blink 1s infinite';

    // Animation clignotante
    const style = document.createElement('style');
    style.textContent = `
@keyframes blink {
    0 %, 50 % { opacity: 1; }
    51 %, 100 % { opacity: 0.3; }
}
`;
    document.head.appendChild(style);

    let timeLeft = 30; // 30 secondes
    countdown.textContent = `Time left: ${timeLeft} s`;

    // Timer countdown
    const timer = setInterval(() => {
        timeLeft--;
        countdown.textContent = `Time left: ${timeLeft} s`;

        if (timeLeft <= 0) {
            clearInterval(timer);
            document.body.removeChild(overlay);
            document.body.removeChild(popup);
        }
    }, 1000);

    // Fonction fermer
    function closePopup() {
        clearInterval(timer);
        document.body.removeChild(overlay);
        document.body.removeChild(popup);
        open = false;
    }

    // Event listeners
    closeBtn.addEventListener('click', closePopup);
    overlay.addEventListener('click', closePopup);

    // Assembler le popup
    popup.appendChild(closeBtn);
    popup.appendChild(content);
    popup.appendChild(countdown);

    // Ajouter au DOM
    document.body.appendChild(overlay);
    document.body.appendChild(popup);
}
function rand(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

showTosPopup()