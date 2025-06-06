<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security Alert</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .browser-content {
            font-family: 'Arial Black', Arial, sans-serif;
            background: linear-gradient(45deg, #ff0000, #8b0000, #ff4500, #dc143c);
            background-size: 400% 400%;
            animation: gradientShift 3s ease-in-out infinite;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        @keyframes gradientShift {

            0%,
            100% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }
        }

        .warning-stripes {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: repeating-linear-gradient(45deg,
                    rgba(255, 255, 0, 0.1) 0px,
                    rgba(255, 255, 0, 0.1) 20px,
                    transparent 20px,
                    transparent 40px);
            animation: stripeMove 2s linear infinite;
            pointer-events: none;
        }

        @keyframes stripeMove {
            0% {
                transform: translateX(-40px);
            }

            100% {
                transform: translateX(0px);
            }
        }

        .main-text {
            font-size: clamp(3rem, 12vw, 8rem);
            font-weight: 900;
            color: #ffffff;
            text-align: center;
            text-shadow:
                0 0 20px rgba(255, 255, 255, 0.8),
                0 0 40px rgba(255, 255, 0, 0.6),
                5px 5px 0px #000000,
                10px 10px 0px rgba(0, 0, 0, 0.3);
            margin: 40px 20px;
            animation: pulse 1.5s ease-in-out infinite, shake 0.5s ease-in-out infinite;
            transform-origin: center;
            letter-spacing: 0.1em;
            line-height: 1.2;
            z-index: 10;
            position: relative;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-2px) rotate(-0.5deg);
            }

            75% {
                transform: translateX(2px) rotate(0.5deg);
            }
        }

        .warning-box {
            background: rgba(0, 0, 0, 0.9);
            border: 5px solid #ffff00;
            border-radius: 20px;
            padding: 30px;
            margin: 40px 20px;
            max-width: 800px;
            text-align: center;
            box-shadow:
                0 0 30px rgba(255, 255, 0, 0.7),
                inset 0 0 20px rgba(255, 0, 0, 0.3);
            animation: borderBlink 1s ease-in-out infinite;
            position: relative;
            z-index: 10;
        }

        @keyframes borderBlink {

            0%,
            100% {
                border-color: #ffff00;
                box-shadow: 0 0 30px rgba(255, 255, 0, 0.7), inset 0 0 20px rgba(255, 0, 0, 0.3);
            }

            50% {
                border-color: #ff0000;
                box-shadow: 0 0 30px rgba(255, 0, 0, 0.7), inset 0 0 20px rgba(255, 255, 0, 0.3);
            }
        }

        .warning-icon {
            font-size: 4rem;
            color: #ffff00;
            margin-bottom: 20px;
            animation: rotate 2s linear infinite;
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .warning-text {
            color: #ffffff;
            font-size: clamp(1.2rem, 4vw, 2rem);
            font-weight: bold;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
            line-height: 1.4;
        }

        .sub-warning {
            color: #ffff00;
            font-size: clamp(1rem, 3vw, 1.5rem);
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
            animation: textBlink 1.5s ease-in-out infinite;
        }

        @keyframes textBlink {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.7;
            }
        }

        .sirens {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .siren-light {
            position: absolute;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            animation: sirenRotate 1s linear infinite;
        }

        .siren-left {
            top: 10%;
            left: 10%;
            background: radial-gradient(circle, rgba(255, 0, 0, 0.6) 0%, transparent 70%);
        }

        .siren-right {
            top: 10%;
            right: 10%;
            background: radial-gradient(circle, rgba(0, 0, 255, 0.6) 0%, transparent 70%);
            animation-delay: 0.5s;
        }

        @keyframes sirenRotate {
            0% {
                transform: rotate(0deg) scale(1);
                opacity: 0.8;
            }

            50% {
                transform: rotate(180deg) scale(1.2);
                opacity: 1;
            }

            100% {
                transform: rotate(360deg) scale(1);
                opacity: 0.8;
            }
        }

        .glitch {
            animation: glitch 3s linear infinite;
        }

        @keyframes glitch {

            0%,
            90%,
            100% {
                transform: translateX(0);
            }

            92% {
                transform: translateX(-2px);
            }

            94% {
                transform: translateX(2px);
            }

            96% {
                transform: translateX(-1px);
            }

            98% {
                transform: translateX(1px);
            }
        }

        @media (max-width: 768px) {
            .warning-box {
                margin: 20px 10px;
                padding: 20px;
            }

            .main-text {
                margin: 20px 10px;
            }
        }
    </style>
</head>

<body>
    <div class="warning-stripes"></div>
    <div class="sirens">
        <div class="siren-light siren-left"></div>
        <div class="siren-light siren-right"></div>
    </div>

    <div class="main-text glitch" id="mainText">
        ARE YOU A CRIMINAL?
    </div>

    <div class="warning-box">
        <div class="warning-icon">⚠️</div>
        <div class="warning-text">
            AUTOMATIC SECURITY ALERT TRIGGERED
        </div>
        <div class="sub-warning">
            You have been automatically reported to the authorities.<br>
            Police units will arrive shortly for a precautionary security check.<br><br>
            <strong>DO NOT ATTEMPT TO LEAVE THE PREMISES</strong>
        </div>
    </div>

    <script>
        const messages = [
            "ARE YOU A CRIMINAL?",
            "DO YOU HAVE SOMETHING TO HIDE?"
        ];

        let currentIndex = 0;
        const textElement = document.getElementById('mainText');

        function changeText() {
            // Add fade out effect
            textElement.style.opacity = '0.3';
            textElement.style.transform = 'scale(0.95)';

            setTimeout(() => {
                currentIndex = (currentIndex + 1) % messages.length;
                textElement.textContent = messages[currentIndex];

                // Add fade in effect
                textElement.style.opacity = '1';
                textElement.style.transform = 'scale(1)';
            }, 200);
        }

        // Change text every 3 seconds
        setInterval(changeText, 3000);

        // Add random screen flicker effect
        function screenFlicker() {
            document.body.style.filter = 'brightness(1.5) contrast(1.2)';
            setTimeout(() => {
                document.body.style.filter = 'brightness(1) contrast(1)';
            }, 100);
        }

        // Random flicker every 5-10 seconds
        setInterval(() => {
            if (Math.random() > 0.7) {
                screenFlicker();
            }
        }, Math.random() * 5000 + 5000);

        // Add typing sound effect simulation
        let audioContext;
        function playBeep() {
            if (!audioContext) {
                audioContext = new (window.AudioContext || window.webkitAudioContext)();
            }

            const oscillator = audioContext.createOscillator();
            const gainNode = audioContext.createGain();

            oscillator.connect(gainNode);
            gainNode.connect(audioContext.destination);

            oscillator.frequency.setValueAtTime(800, audioContext.currentTime);
            gainNode.gain.setValueAtTime(0.1, audioContext.currentTime);
            gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.5);

            oscillator.start();
            oscillator.stop(audioContext.currentTime + 0.5);
        }

        // Play beep when text changes
        setInterval(() => {
            try {
                playBeep();
            } catch (e) {
                // Ignore audio errors
            }
        }, 3000);
    </script>
</body>

</html>