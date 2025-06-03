function createAIBanner() {
    // Créer la banderole
    const banner = document.createElement('div');
    banner.style.position = 'fixed';
    banner.style.top = '0';
    banner.style.left = '0';
    banner.style.width = '100%';
    banner.style.height = '50px';
    banner.style.backgroundColor = '#1a73e8';
    banner.style.color = 'white';
    banner.style.display = 'flex';
    banner.style.alignItems = 'center';
    banner.style.justifyContent = 'center';
    banner.style.fontFamily = 'Arial, sans-serif';
    banner.style.fontSize = '14px';
    banner.style.fontWeight = '500';
    banner.style.zIndex = '99998';
    banner.style.boxShadow = '0 2px 10px rgba(0,0,0,0.2)';

    // Icône AI
    const aiIcon = document.createElement('span');
    aiIcon.textContent = '💫';
    aiIcon.style.fontSize = '18px';
    aiIcon.style.marginRight = '10px';
    aiIcon.style.animation = 'bounce 2s infinite';

    // Texte principal
    const text = document.createElement('span');
    text.textContent = 'This website is powered by Advanced AI and Web3 Technology';
    text.style.marginRight = '15px';

    // Badge "NEW"
    const newBadge = document.createElement('span');
    newBadge.textContent = 'NEW';
    newBadge.style.backgroundColor = '#ff4444';
    newBadge.style.color = 'white';
    newBadge.style.padding = '2px 8px';
    newBadge.style.borderRadius = '12px';
    newBadge.style.fontSize = '10px';
    newBadge.style.fontWeight = 'bold';
    newBadge.style.marginLeft = '10px';
    newBadge.style.animation = 'pulse 1.5s infinite';

    // Bouton fermer
    const closeBtn = document.createElement('button');
    closeBtn.textContent = '×';
    closeBtn.style.position = 'absolute';
    closeBtn.style.right = '15px';
    closeBtn.style.top = '50%';
    closeBtn.style.transform = 'translateY(-50%)';
    closeBtn.style.backgroundColor = 'transparent';
    closeBtn.style.color = 'white';
    closeBtn.style.border = '1px solid rgba(255,255,255,0.3)';
    closeBtn.style.borderRadius = '50%';
    closeBtn.style.width = '25px';
    closeBtn.style.height = '25px';
    closeBtn.style.cursor = 'pointer';
    closeBtn.style.fontSize = '16px';
    closeBtn.style.fontWeight = 'bold';
    closeBtn.style.display = 'flex';
    closeBtn.style.alignItems = 'center';
    closeBtn.style.justifyContent = 'center';

    // Animations CSS
    const style = document.createElement('style');
    style.textContent = `
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-5px); }
            60% { transform: translateY(-3px); }
        }
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        @keyframes slideDown {
            from { transform: translateY(-100%); }
            to { transform: translateY(0); }
        }
    `;
    document.head.appendChild(style);

    banner.style.animation = 'slideDown 0.5s ease-out';

    // Assemblage
    banner.appendChild(aiIcon);
    banner.appendChild(text);
    banner.appendChild(newBadge);
    banner.appendChild(closeBtn);

    // Fonction fermer
    closeBtn.addEventListener('click', function () {
        banner.style.animation = 'slideDown 0.3s ease-in reverse';
        setTimeout(() => {
            if (document.body.contains(banner)) {
                document.body.removeChild(banner);
            }
        }, 300);
    });

    // Effet hover sur le bouton fermer
    closeBtn.addEventListener('mouseenter', function () {
        this.style.backgroundColor = 'rgba(255,255,255,0.2)';
    });

    closeBtn.addEventListener('mouseleave', function () {
        this.style.backgroundColor = 'transparent';
    });

    // Ajuster le body pour éviter le chevauchement
    document.body.style.paddingTop = '50px';

    // Ajouter au DOM
    document.body.appendChild(banner);

    // Supprimer automatiquement après 10 secondes si pas fermé
    setTimeout(() => {
        if (document.body.contains(banner)) {
            closeBtn.click();
        }
    }, 10000);
}

// Appeler la fonction
createAIBanner();