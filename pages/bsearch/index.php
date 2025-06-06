<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B-Search - Search Engine</title>
    <script src="scripts/popup.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .browser-content {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        /* Animation de fond */
        .browser-content::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 118, 117, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(100, 219, 200, 0.3) 0%, transparent 50%);
            animation: float 20s ease-in-out infinite;
            z-index: -1;
        }

        @keyframes float {

            0%,
            100% {
                transform: translate(0, 0) rotate(0deg);
            }

            33% {
                transform: translate(30px, -30px) rotate(120deg);
            }

            66% {
                transform: translate(-20px, 20px) rotate(240deg);
            }
        }

        header {
            padding: 2rem;
            text-align: center;
        }

        .logo {
            font-size: 4rem;
            font-weight: 900;
            background: linear-gradient(45deg, #fff, #f0f0f0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            margin-bottom: 0.5rem;
            animation: glow 3s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from {
                filter: drop-shadow(0 0 5px rgba(255, 255, 255, 0.5));
            }

            to {
                filter: drop-shadow(0 0 20px rgba(255, 255, 255, 0.8));
            }
        }

        .tagline {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.2rem;
            font-weight: 300;
            margin-bottom: 3rem;
        }

        .search-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
        }

        .search-box {
            position: relative;
            margin-bottom: 2rem;
        }

        .search-input {
            width: 100%;
            padding: 1.5rem 2rem;
            padding-right: 4rem;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            outline: none;
        }

        .search-input:focus {
            transform: translateY(-2px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
            background: rgba(255, 255, 255, 1);
        }

        .search-input::placeholder {
            color: #aaa;
            font-style: italic;
        }

        .search-btn {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: linear-gradient(45deg, #667eea, #764ba2);
            border: none;
            width: 3rem;
            height: 3rem;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .search-btn:hover {
            transform: translateY(-50%) scale(1.1);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }

        .search-btn svg {
            width: 1.2rem;
            height: 1.2rem;
            fill: white;
        }

        .search-options {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 3rem;
            flex-wrap: wrap;
        }

        .option-btn {
            padding: 0.8rem 1.5rem;
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 25px;
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .option-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .quick-links {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .quick-link {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 1.5rem;
            text-align: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .quick-link:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .quick-link-icon {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            display: block;
        }

        .quick-link-title {
            font-weight: 600;
            margin-bottom: 0.3rem;
        }

        .quick-link-desc {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        footer {
            margin-top: auto;
            padding: 2rem;
            text-align: center;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: white;
        }

        /* Animations d'entrée */
        .search-container {
            animation: slideUp 0.8s ease-out;
        }

        .quick-links {
            animation: fadeIn 1s ease-out 0.3s both;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .logo {
                font-size: 3rem;
            }

            .search-input {
                padding: 1.2rem 1.5rem;
                font-size: 1rem;
            }

            .search-options {
                gap: 0.5rem;
            }

            .option-btn {
                padding: 0.6rem 1.2rem;
                font-size: 0.9rem;
            }

            .quick-links {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .footer-links {
                flex-direction: column;
                gap: 1rem;
            }
        }

        /* Effet de particules subtil */
        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(255, 255, 255, 0.6);
            border-radius: 50%;
            animation: particle-float 8s infinite linear;
        }

        @keyframes particle-float {
            0% {
                transform: translateY(100vh) translateX(0);
                opacity: 0;
            }

            10% {
                opacity: 1;
            }

            90% {
                opacity: 1;
            }

            100% {
                transform: translateY(-10vh) translateX(100px);
                opacity: 0;
            }
        }
    </style>
</head>

<body>
    <!-- Particules flottantes -->
    <div class="particle" style="left: 10%; animation-delay: 0s;"></div>
    <div class="particle" style="left: 20%; animation-delay: 2s;"></div>
    <div class="particle" style="left: 30%; animation-delay: 4s;"></div>
    <div class="particle" style="left: 40%; animation-delay: 1s;"></div>
    <div class="particle" style="left: 50%; animation-delay: 3s;"></div>
    <div class="particle" style="left: 60%; animation-delay: 5s;"></div>
    <div class="particle" style="left: 70%; animation-delay: 1.5s;"></div>
    <div class="particle" style="left: 80%; animation-delay: 3.5s;"></div>
    <div class="particle" style="left: 90%; animation-delay: 0.5s;"></div>

    <header>
        <h1 class="logo">B-Search</h1>
        <p class="tagline">We are Internet.</p>
    </header>

    <main class="search-container">
        <div class="search-box">
            <input type="text" class="search-input" placeholder="What are you looking for today?">
            <button class="search-btn" onclick="performSearch()">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                </svg>
            </button>
        </div>


    </main>
    <!-- 
    <section class="quick-links">
        <a href="#" class="quick-link">
            <div class="quick-link-title">Quick Search</div>
            <div class="quick-link-desc">Instant results</div>
        </a>
        <a href="#" class="quick-link">
            <div class="quick-link-title">Secure Browsing</div>
            <div class="quick-link-desc">Your privacy protected</div>
        </a>
        <a href="#" class="quick-link">
            <div class="quick-link-title">Accurate Results</div>
            <div class="quick-link-desc">Find exactly what you're looking for</div>
        </a>
        <a href="#" class="quick-link">
            <div class="quick-link-title">Global Search</div>
            <div class="quick-link-desc">Explore the entire web</div>
        </a>
    </section> -->

    <footer>
        <!-- <div class="footer-links">
            <a href="#">About</a>
            <a href="#">Privacy</a>
            <a href="#">Terms of Service</a>
            <a href="#">Support</a>
            <a href="#">Developers</a>
        </div> -->
        <p>&copy; 2025 B-Search by <a href="/index.php?url=bcorp.bc">Bcorp</a>. All rights reserved. Copyright is
            protected by the Universal Declaration of Human
            Rights, and any violation of this fundamental right can be punished by the death penalty.</p>
    </footer>

    <script>
        showTosPopup();
        function performSearch() {
            const searchInput = document.querySelector('.search-input');
            const query = searchInput.value.trim();

            if (query) {
                // Animation de recherche
                const searchBtn = document.querySelector('.search-btn');
                searchBtn.style.transform = 'translateY(-50%) scale(0.95)';

                setTimeout(() => {
                    window.location.href = "index.php?url=bid.bc/login"
                }, 150);
            }
        }

        // Handle Enter key
        document.querySelector('.search-input').addEventListener('keypress', function (e) {
            if (e.key === 'Enter') {
                performSearch();
            }
        });

        // Animation on focus
        const searchInput = document.querySelector('.search-input');
        searchInput.addEventListener('focus', function () {
            this.parentElement.style.transform = 'scale(1.02)';
        });

        searchInput.addEventListener('blur', function () {
            this.parentElement.style.transform = 'scale(1)';
        });

        // Light parallax effect on scroll
        window.addEventListener('scroll', function () {
            const scrolled = window.pageYOffset;
            const particles = document.querySelectorAll('.particle');

            particles.forEach((particle, index) => {
                const speed = (index + 1) * 0.5;
                particle.style.transform = `translateY(${scrolled * speed}px)`;
            });
        });
    </script>
</body>

</html>