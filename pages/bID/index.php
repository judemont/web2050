<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bID - Biometric Identity Database</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            color: #ffffff;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .header {
            background: rgba(0, 0, 0, 0.8);
            padding: 20px 0;
            border-bottom: 3px solid #ff6b6b;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            animation: scan 3s linear infinite;
        }

        @keyframes scan {
            0% {
                left: -100%;
            }

            100% {
                left: 100%;
            }
        }

        .nav {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .logo {
            font-size: 2.5rem;
            font-weight: 900;
            color: #ff6b6b;
            text-shadow: 0 0 20px rgba(255, 107, 107, 0.5);
            letter-spacing: 3px;
        }

        .nav-links {
            display: flex;
            gap: 30px;
            list-style: none;
        }

        .nav-links a {
            color: #ffffff;
            text-decoration: none;
            font-weight: 600;
            padding: 10px 20px;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .nav-links a:hover {
            border-color: #ff6b6b;
            background: rgba(255, 107, 107, 0.1);
        }

        .hero {
            text-align: center;
            padding: 100px 20px;
            position: relative;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="%23333" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at center, rgba(255, 107, 107, 0.1) 0%, transparent 70%);
        }

        .main-title {
            font-size: clamp(2.5rem, 8vw, 5rem);
            font-weight: 900;
            color: #ff6b6b;
            margin-bottom: 20px;
            text-shadow:
                0 0 30px rgba(255, 107, 107, 0.8),
                3px 3px 0px #000000;
            animation: pulse 2s ease-in-out infinite;
            position: relative;
            z-index: 2;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.02);
            }
        }

        .subtitle {
            font-size: clamp(1.2rem, 4vw, 2rem);
            color: #cccccc;
            margin-bottom: 50px;
            font-weight: 300;
            line-height: 1.4;
            position: relative;
            z-index: 2;
        }

        .features {
            max-width: 1200px;
            margin: 0 auto;
            padding: 80px 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 40px;
        }

        .feature-card {
            background: rgba(0, 0, 0, 0.6);
            border: 2px solid #ff6b6b;
            border-radius: 15px;
            padding: 40px;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: conic-gradient(from 0deg, transparent, rgba(255, 107, 107, 0.1), transparent);
            animation: rotate 4s linear infinite;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .feature-card:hover::before {
            opacity: 1;
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(255, 107, 107, 0.3);
        }

        .feature-icon {
            font-size: 4rem;
            margin-bottom: 20px;
            color: #ff6b6b;
            position: relative;
            z-index: 2;
        }

        .feature-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: #ffffff;
            position: relative;
            z-index: 2;
        }

        .feature-text {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #cccccc;
            position: relative;
            z-index: 2;
        }

        .stats {
            background: rgba(0, 0, 0, 0.8);
            padding: 80px 20px;
            text-align: center;
        }

        .stats-container {
            max-width: 1000px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
        }

        .stat-item {
            padding: 20px;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 900;
            color: #ff6b6b;
            display: block;
            margin-bottom: 10px;
            text-shadow: 0 0 20px rgba(255, 107, 107, 0.5);
        }

        .stat-label {
            font-size: 1.2rem;
            color: #cccccc;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .cta {
            padding: 100px 20px;
            text-align: center;
            background: linear-gradient(45deg, rgba(255, 107, 107, 0.1), rgba(0, 0, 0, 0.5));
        }

        .cta-title {
            font-size: 3rem;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 30px;
        }

        .cta-button {
            display: inline-block;
            padding: 20px 50px;
            background: linear-gradient(135deg, #ff6b6b, #ee5a52);
            color: #ffffff;
            text-decoration: none;
            font-size: 1.3rem;
            font-weight: 700;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(255, 107, 107, 0.3);
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .cta-button:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(255, 107, 107, 0.5);
        }

        .footer {
            background: rgba(0, 0, 0, 0.9);
            padding: 50px 20px;
            text-align: center;
            border-top: 3px solid #ff6b6b;
        }

        .footer-text {
            color: #888888;
            font-size: 1rem;
            margin-bottom: 20px;
        }

        .warning-banner {
            background: #ff6b6b;
            color: #000000;
            padding: 15px;
            text-align: center;
            font-weight: 700;
            animation: blink 2s ease-in-out infinite;
        }

        @keyframes blink {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.8;
            }
        }

        .eye-icon {
            position: fixed;
            top: 20px;
            right: 20px;
            font-size: 2rem;
            color: #ff6b6b;
            animation: watchPulse 3s ease-in-out infinite;
            z-index: 1000;
        }

        @keyframes watchPulse {

            0%,
            100% {
                transform: scale(1);
                opacity: 0.7;
            }

            50% {
                transform: scale(1.2);
                opacity: 1;
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .features {
                grid-template-columns: 1fr;
            }

            .stats-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>

<body>
    <div class="eye-icon">👁️</div>

    <div class="warning-banner">
        REMINDER: All activities on this site are monitored and recorded • Privacy is a crime • Control is order
    </div>

    <header class="header">
        <nav class="nav">
            <div class="logo">bID</div>
        </nav>
    </header>

    <section class="hero">
        <h1 class="main-title">Anonymity Only Benefits Criminals</h1>
        <p class="subtitle">Citizens who have nothing to reproach themselves with do not need anonymity.</p>
    </section>

    <section class="features">
        <div class="feature-card">
            <div class="feature-icon">🔍</div>
            <h3 class="feature-title">Total Transparency</h3>
            <p class="feature-text">Every action, every word, every thought is monitored for the safety of society.
                Transparency eliminates the possibility of wrongdoing and ensures complete social harmony.</p>
        </div>

        <div class="feature-card">
            <div class="feature-icon">📱</div>
            <h3 class="feature-title">Mandatory Digital Identity</h3>
            <p class="feature-text">Your bID is linked to all digital activities. No anonymous browsing, no private
                communications. True citizens embrace accountability in all their interactions.</p>
        </div>

        <div class="feature-card">
            <div class="feature-icon">🎯</div>
            <h3 class="feature-title">Predictive Behavior Analysis</h3>
            <p class="feature-text">Our advanced AI predicts criminal behavior before it happens. Why wait for crime to
                occur when we can prevent it through continuous monitoring and intervention?</p>
        </div>

        <div class="feature-card">
            <div class="feature-icon">👥</div>
            <h3 class="feature-title">Community Reporting</h3>
            <p class="feature-text">Good citizens report suspicious behavior. Our integrated reporting system makes it
                easy to help your neighbors stay on the right path through collective vigilance.</p>
        </div>

        <div class="feature-card">
            <div class="feature-icon">🏛️</div>
            <h3 class="feature-title">Government Integration</h3>
            <p class="feature-text">Seamless data sharing with all government agencies ensures no criminal activity goes
                unnoticed. Your compliance is our security, your transparency is our strength.</p>
        </div>

        <div class="feature-card">
            <div class="feature-icon">⚡</div>
            <h3 class="feature-title">Real-Time Enforcement</h3>
            <p class="feature-text">Instant alerts to authorities when suspicious patterns are detected. Swift justice
                ensures social order and protects law-abiding citizens from harmful elements.</p>
        </div>
    </section>

    <section class="stats">
        <div class="stats-container">
            <div class="stat-item">
                <span class="stat-number">100.99%</span>
                <span class="stat-label">Citizen Compliance</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">47M</span>
                <span class="stat-label">Daily Surveillances</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">24/7</span>
                <span class="stat-label">Monitoring Active</span>
            </div>
        </div>
    </section>


    <footer class="footer">
        <p class="footer-text">bID - Biometric Identity Database | "Safety Through Surveillance" | "Privacy is
            Privilege" | "Anonymity is Anarchy"</p>
        <p class="footer-text">© 2025 bID by <a href="/index.php?url=bcorp.bc">Bcorp</a> • All rights reserved.
            Copyright is
            protected by the Universal Declaration of Human
            Rights, and any violation of this fundamental right can be punished by the death penalty.
        </p>
    </footer>

    <script>
        // Simulate surveillance tracking
        let trackingCount = 0;

        function updateTracking() {
            trackingCount++;
            if (trackingCount % 10 === 0) {
                console.log(`Surveillance Update: ${trackingCount} actions tracked`);
            }
        }

        // Track all user interactions
        document.addEventListener('click', updateTracking);
        document.addEventListener('scroll', updateTracking);
        document.addEventListener('mousemove', updateTracking);

        // Simulate random "surveillance alerts"
        setInterval(() => {
            if (Math.random() > 0.7) {
                const alerts = [
                    "Biometric scan completed",
                    "Behavioral pattern logged",
                    "Identity verification in progress",
                    "Compliance status: MONITORED",
                    "Data synchronization active"
                ];
                console.log(`🔍 ${alerts[Math.floor(Math.random() * alerts.length)]}`);
            }
        }, 5000);

        // Add subtle screen effects
        function addGlitchEffect() {
            document.body.style.filter = 'hue-rotate(10deg) brightness(1.1)';
            setTimeout(() => {
                document.body.style.filter = 'none';
            }, 100);
        }

        setInterval(addGlitchEffect, 15000);

        // Eye tracking simulation
        const eye = document.querySelector('.eye-icon');
        document.addEventListener('mousemove', (e) => {
            const x = e.clientX / window.innerWidth;
            const y = e.clientY / window.innerHeight;
            eye.style.transform = `translate(${x * 20 - 10}px, ${y * 20 - 10}px) scale(${1 + Math.sin(Date.now() * 0.003) * 0.2})`;
        });
    </script>
</body>

</html>