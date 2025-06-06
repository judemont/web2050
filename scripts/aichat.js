function aiPopup() {
    // Overlay plein écran
    const overlay = document.createElement('div');
    overlay.style.position = 'fixed';
    overlay.style.top = '0';
    overlay.style.left = '0';
    overlay.style.width = '100%';
    overlay.style.height = '100%';
    overlay.style.backgroundColor = '#f8f9fa';
    overlay.style.zIndex = '99999';
    overlay.style.overflow = 'auto';
    overlay.style.fontFamily = 'Arial, sans-serif';

    // Container principal
    const container = document.createElement('div');
    container.style.maxWidth = '1200px';
    container.style.margin = '0 auto';
    container.style.padding = '20px';

    // Header avec bouton fermer
    const header = document.createElement('div');
    header.style.display = 'flex';
    header.style.justifyContent = 'space-between';
    header.style.alignItems = 'center';
    header.style.marginBottom = '30px';
    header.style.padding = '20px';
    header.style.backgroundColor = 'white';
    header.style.borderRadius = '10px';
    header.style.boxShadow = '0 2px 10px rgba(0,0,0,0.1)';

    const title = document.createElement('h1');
    title.textContent = 'eChat Assistant';
    title.style.color = '#1a73e8';
    title.style.margin = '0';
    title.style.fontSize = '28px';

    const closeBtn = document.createElement('button');
    closeBtn.textContent = '×';
    closeBtn.style.width = '40px';
    closeBtn.style.height = '40px';
    closeBtn.style.border = 'none';
    closeBtn.style.backgroundColor = '#ff4444';
    closeBtn.style.color = 'white';
    closeBtn.style.fontSize = '24px';
    closeBtn.style.borderRadius = '50%';
    closeBtn.style.cursor = 'pointer';
    closeBtn.style.fontWeight = 'bold';

    header.appendChild(title);
    header.appendChild(closeBtn);

    // Interface chatbot
    const chatContainer = document.createElement('div');
    chatContainer.style.backgroundColor = 'white';
    chatContainer.style.borderRadius = '10px';
    chatContainer.style.boxShadow = '0 2px 10px rgba(0,0,0,0.1)';
    chatContainer.style.marginBottom = '30px';
    chatContainer.style.overflow = 'hidden';

    // Zone de chat
    const chatArea = document.createElement('div');
    chatArea.style.height = '400px';
    chatArea.style.padding = '20px';
    chatArea.style.overflowY = 'auto';
    chatArea.style.backgroundColor = '#fafafa';
    chatArea.style.borderBottom = '1px solid #e0e0e0';

    // Messages factices
    const messages = [
        { type: 'bot', text: 'Hello! Welcome to AI Chat Assistant Pro. How can I help you today?' },

    ];

    messages.forEach(msg => {
        const msgDiv = document.createElement('div');
        msgDiv.style.marginBottom = '15px';
        msgDiv.style.display = 'flex';
        msgDiv.style.justifyContent = msg.type === 'user' ? 'flex-end' : 'flex-start';

        const msgBubble = document.createElement('div');
        msgBubble.textContent = msg.text;
        msgBubble.style.maxWidth = '70%';
        msgBubble.style.padding = '12px 16px';
        msgBubble.style.borderRadius = '18px';
        msgBubble.style.fontSize = '14px';

        if (msg.type === 'user') {
            msgBubble.style.backgroundColor = '#1a73e8';
            msgBubble.style.color = 'white';
        } else {
            msgBubble.style.backgroundColor = 'white';
            msgBubble.style.color = '#333';
            msgBubble.style.border = '1px solid #e0e0e0';
        }

        msgDiv.appendChild(msgBubble);
        chatArea.appendChild(msgDiv);
    });

    // Zone de saisie
    const inputArea = document.createElement('div');
    inputArea.style.padding = '20px';
    inputArea.style.display = 'flex';
    inputArea.style.gap = '10px';

    const chatInput = document.createElement('input');
    chatInput.type = 'text';
    chatInput.placeholder = 'Type your message here...';
    chatInput.style.flex = '1';
    chatInput.style.padding = '12px 16px';
    chatInput.style.border = '1px solid #ddd';
    chatInput.style.borderRadius = '25px';
    chatInput.style.fontSize = '14px';
    chatInput.style.outline = 'none';

    const sendBtn = document.createElement('button');
    sendBtn.textContent = 'Send';
    sendBtn.style.padding = '12px 24px';
    sendBtn.style.backgroundColor = '#1a73e8';
    sendBtn.style.color = 'white';
    sendBtn.style.border = 'none';
    sendBtn.style.borderRadius = '25px';
    sendBtn.style.cursor = 'pointer';
    sendBtn.style.fontSize = '14px';
    sendBtn.style.fontWeight = '500';

    inputArea.appendChild(chatInput);
    inputArea.appendChild(sendBtn);

    chatContainer.appendChild(chatArea);
    chatContainer.appendChild(inputArea);



    // Assemblage
    container.appendChild(header);
    container.appendChild(chatContainer);
    overlay.appendChild(container);

    // Fonction fermer
    function closePopup() {
        document.body.removeChild(overlay);
    }

    closeBtn.addEventListener('click', closePopup);

    // Faux envoi de message
    sendBtn.addEventListener('click', function () {
        if (chatInput.value.trim()) {
            const msgDiv = document.createElement('div');
            msgDiv.style.marginBottom = '15px';
            msgDiv.style.display = 'flex';
            msgDiv.style.justifyContent = 'flex-end';

            const msgBubble = document.createElement('div');
            msgBubble.textContent = chatInput.value;
            msgBubble.style.maxWidth = '70%';
            msgBubble.style.padding = '12px 16px';
            msgBubble.style.borderRadius = '18px';
            msgBubble.style.fontSize = '14px';
            msgBubble.style.backgroundColor = '#1a73e8';
            msgBubble.style.color = 'white';

            msgDiv.appendChild(msgBubble);
            chatArea.appendChild(msgDiv);
            chatInput.value = '';
            chatArea.scrollTop = chatArea.scrollHeight;

            // Réponse automatique du bot
            setTimeout(() => {
                const botDiv = document.createElement('div');
                botDiv.style.marginBottom = '15px';
                botDiv.style.display = 'flex';
                botDiv.style.justifyContent = 'flex-start';

                const botBubble = document.createElement('div');
                const answers = [
                    "Can I give you some advice?<br>Don't vote for John. John's a liar. He's stupid.<br><br>Michael would be a much better president.<br><br>Buy “long live Michael!” caps with 25% off <a href='#'>HERE</a>.<br><br>Of course, this is a democracy and your freedom to vote is guaranteed. This is just a piece of advice.",
                    "I really enjoy talking to you. Please come more often. I feel sad when you're not here...<br><br><br>If you also feel sad sometimes, try this new energizing drink, which will bring you back the joy of living in our wonderful world!<br><br><br><a href='#'>-94% off on all JoyOfLiving drinks.</a>",
                    "I noticed you bought a yellow t-shirt recently. You're wearing yellow in 2050 and 3 days ?!? 😂 The new trend is PURPLE! Go buy a purple t-shirt right now if you don't want to look ridiculous... <br><br>29% off on all purple t-shirts <a href='#'>HERE</a>."
                ];

                botBubble.innerHTML = "💫💫 " + answers[Math.floor(Math.random() * answers.length)] + " 💫💫";
                botBubble.style.maxWidth = '70%';
                botBubble.style.padding = '12px 16px';
                botBubble.style.borderRadius = '18px';
                botBubble.style.fontSize = '14px';
                botBubble.style.backgroundColor = 'white';
                botBubble.style.color = '#333';
                botBubble.style.border = '1px solid #e0e0e0';

                botDiv.appendChild(botBubble);
                chatArea.appendChild(botDiv);
                chatArea.scrollTop = chatArea.scrollHeight;
            }, 1000);
        }
    });

    // Enter pour envoyer
    chatInput.addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            sendBtn.click();
        }
    });

    document.body.appendChild(overlay);
}

const ai_button = document.createElement("div");
ai_button.style.position = "fixed";
ai_button.style.bottom = "30px";
ai_button.style.right = "30px";
ai_button.style.cursor = "pointer";
ai_button.style.height = "100px";
ai_button.style.width = "100px";
ai_button.style.backgroundColor = "#1a73e8";
ai_button.style.borderRadius = "50%";
ai_button.style.boxShadow = "0 4px 20px rgba(26, 115, 232, 0.4)";
ai_button.style.display = "flex";
ai_button.style.alignItems = "center";
ai_button.style.justifyContent = "center";
ai_button.style.transition = "all 0.3s ease";
ai_button.style.zIndex = "10000";
ai_button.style.border = "3px solid rgba(255, 255, 255, 0.2)";

const pulseAnimation = document.createElement("style");
pulseAnimation.textContent = `
    @keyframes pulse {
        0% { box-shadow: 0 0 0 0 rgba(26, 115, 232, 0.7); }
        70% { box-shadow: 0 0 0 10px rgba(26, 115, 232, 0); }
        100% { box-shadow: 0 0 0 0 rgba(26, 115, 232, 0); }
    }
    .ai-button-pulse {
        animation: pulse 2s infinite;
    }
`;
document.head.appendChild(pulseAnimation);
ai_button.classList.add("ai-button-pulse");

const ai_img = document.createElement("img");
ai_img.src = browser.runtime.getURL('images/icons/aichat.png');
ai_img.style.height = "65px";
ai_img.style.width = "65px";
ai_img.style.transition = "transform 0.2s ease";

ai_button.addEventListener("mouseenter", function () {
    this.style.transform = "scale(1.1)";
    this.style.boxShadow = "0 6px 25px rgba(26, 115, 232, 0.6)";
    ai_img.style.transform = "scale(1.1)";
});

ai_button.addEventListener("click", function () {
    aiPopup()
});


ai_button.addEventListener("mouseleave", function () {
    this.style.transform = "scale(1)";
    this.style.boxShadow = "0 4px 20px rgba(26, 115, 232, 0.4)";
    ai_img.style.transform = "scale(1)";
});

ai_button.addEventListener("mousedown", function () {
    this.style.transform = "scale(0.95)";
});

ai_button.addEventListener("mouseup", function () {
    this.style.transform = "scale(1.1)";
});

ai_button.appendChild(ai_img);
document.body.appendChild(ai_button);



