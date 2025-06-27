<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEA Catering - Healthy Meals, Anytime, Anywhere</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Custom animations to be included in your app.css */
        @keyframes slow-zoom {
            0% {
                transform: scale(1);
            }

            100% {
                transform: scale(1.1);
            }
        }

        @keyframes slide-up-fade-in {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-slow-zoom {
            animation: slow-zoom 15s infinite alternate ease-in-out;
        }

        .fade-in-on-scroll {
            opacity: 0;
            transition: opacity 0.7s ease-out, transform 0.7s ease-out;
            transform: translateY(20px);
        }

        .fade-in-on-scroll.is-visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body class="bg-gray-50 font-sans antialiased text-gray-800">

    <!-- Header -->
    <header class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-sm shadow-md transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-2">
                <a href="#home" class="flex items-center space-x-2">
                    <img src="{{ asset('images/icon.png') }}" alt="SEA Catering Logo" class="h-12 w-auto">
                    <span class="text-2xl sm:text-3xl font-extrabold text-emerald-600 tracking-tighter">SEA Catering</span>
                </a>
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-gray-600 hover:text-emerald-600 font-semibold transition-colors duration-300">Home</a>
                    <a href="#features" class="text-gray-600 hover:text-emerald-600 font-semibold transition-colors duration-300">Features</a>
                    <a href="#how-it-works" class="text-gray-600 hover:text-emerald-600 font-semibold transition-colors duration-300">How It Works</a>
                    <a href="#contact" class="bg-emerald-500 text-white font-bold rounded-full px-5 py-2 hover:bg-emerald-600 transition-transform duration-300 hover:scale-105 shadow-lg">Order Now</a>
                </nav>
                <button id="mobile-menu-button" class="md:hidden p-2 rounded-md text-gray-600 hover:text-emerald-600 hover:bg-gray-100">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200">
            <a href="#home" class="block py-2 px-4 text-sm hover:bg-emerald-50">Home</a>
            <a href="#features" class="block py-2 px-4 text-sm hover:bg-emerald-50">Features</a>
            <a href="#how-it-works" class="block py-2 px-4 text-sm hover:bg-emerald-50">How It Works</a>
            <a href="#contact" class="block py-2 px-4 text-sm font-bold text-emerald-600 hover:bg-emerald-50">Order Now</a>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <!-- Hero Section -->
        <section id="home" class="relative h-screen flex items-center justify-center text-center overflow-hidden">
            <div class="absolute inset-0 z-0">
                <div class="absolute inset-0 bg-black/50 z-10"></div>
                <img class="w-full h-full object-cover animate-slow-zoom" src="https://placehold.co/1920x1080/10B981/FFFFFF?text=Fresh+Ingredients" alt="Background of healthy food ingredients" onerror="this.onerror=null;this.src='https://placehold.co/1920x1080/EAF9F2/34D399?text=Healthy+Meals';">
            </div>
            <div class="relative z-20 px-4" style="animation: slide-up-fade-in 1s ease-out forwards;">
                <h2 class="text-5xl md:text-7xl font-extrabold text-white tracking-tight leading-tight">
                    Healthy Meals, Delivered.
                </h2>
                <p class="mt-4 max-w-2xl mx-auto text-xl md:text-2xl text-emerald-100 font-light">
                    Your journey to a healthier lifestyle, made simple and delicious. Customizable meals delivered across Indonesia.
                </p>
                <div class="mt-10">
                    <a href="#features" class="inline-block bg-emerald-500 text-white font-bold rounded-full px-10 py-4 text-lg hover:bg-emerald-600 transition-all duration-300 transform hover:scale-105 shadow-xl">
                        Start Your Plan
                    </a>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="py-20 sm:py-28 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-base font-semibold text-emerald-600 tracking-wider uppercase">Our Features</h2>
                    <p class="mt-2 text-3xl font-extrabold text-gray-900 sm:text-4xl">
                        Everything You Need for Healthy Eating
                    </p>
                </div>
                <div class="mt-16 grid gap-10 md:grid-cols-2 lg:grid-cols-3">
                    <div class="fade-in-on-scroll text-center p-8 bg-gray-50 rounded-2xl shadow-lg hover:shadow-2xl transition-shadow duration-300 transform hover:-translate-y-2">
                        <svg class="w-20 h-20 mx-auto text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <h4 class="mt-6 text-xl font-bold text-gray-900">Total Meal Customization</h4>
                        <p class="mt-2 text-gray-600">Build your perfect meal. Pick ingredients, adjust portions, and meet your dietary goals with ease.</p>
                    </div>
                    <div class="fade-in-on-scroll text-center p-8 bg-gray-50 rounded-2xl shadow-lg hover:shadow-2xl transition-shadow duration-300 transform hover:-translate-y-2">
                        <svg class="w-20 h-20 mx-auto text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10l2.05-2.05A1 1 0 016.5 14H13zm-9-4h14M3 11h2"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 6h5l3 5v5h-5"></path>
                        </svg>
                        <h4 class="mt-6 text-xl font-bold text-gray-900">Nationwide Delivery</h4>
                        <p class="mt-2 text-gray-600">We deliver fresh to your doorstep in major Indonesian cities, from Jakarta to Bali.</p>
                    </div>
                    <div class="fade-in-on-scroll text-center p-8 bg-gray-50 rounded-2xl shadow-lg hover:shadow-2xl transition-shadow duration-300 transform hover:-translate-y-2">
                        <svg class="w-20 h-20 mx-auto text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        <h4 class="mt-6 text-xl font-bold text-gray-900">Detailed Nutritional Info</h4>
                        <p class="mt-2 text-gray-600">Stay informed. Every meal includes a full breakdown of macros and calories to track your progress.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works Section -->
        <section id="how-it-works" class="py-20 sm:py-28 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-base font-semibold text-emerald-600 tracking-wider uppercase">How It Works</h2>
                    <p class="mt-2 text-3xl font-extrabold text-gray-900 sm:text-4xl">
                        Get Your Healthy Meals in 3 Simple Steps
                    </p>
                </div>
                <div class="mt-16 relative">
                    <!-- The connecting line -->
                    <div class="hidden md:block absolute top-1/2 left-0 w-full h-0.5 bg-emerald-200 -translate-y-1/2"></div>
                    <div class="grid gap-12 md:grid-cols-3">
                        <div class="fade-in-on-scroll text-center relative">
                            <div class="mx-auto flex items-center justify-center w-24 h-24 rounded-full bg-emerald-500 text-white font-bold text-3xl shadow-lg border-4 border-white">1</div>
                            <h3 class="mt-6 text-xl font-bold">Customize Your Meal</h3>
                            <p class="mt-2 text-gray-600">Select from our wide range of fresh ingredients.</p>
                        </div>
                        <div class="fade-in-on-scroll text-center relative">
                            <div class="mx-auto flex items-center justify-center w-24 h-24 rounded-full bg-emerald-500 text-white font-bold text-3xl shadow-lg border-4 border-white">2</div>
                            <h3 class="mt-6 text-xl font-bold">Place Your Order</h3>
                            <p class="mt-2 text-gray-600">Choose your delivery schedule and checkout securely.</p>
                        </div>
                        <div class="fade-in-on-scroll text-center relative">
                            <div class="mx-auto flex items-center justify-center w-24 h-24 rounded-full bg-emerald-500 text-white font-bold text-3xl shadow-lg border-4 border-white">3</div>
                            <h3 class="mt-6 text-xl font-bold">Enjoy Healthy Food</h3>
                            <p class="mt-2 text-gray-600">Receive your delicious, ready-to-eat meals at your door.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer id="contact" class="bg-gray-800 text-white">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="md:col-span-2 flex items-start space-x-4">
                    <img src="{{ asset('images/icon.png') }}" alt="SEA Catering Logo" class="h-16 w-auto mt-1">
                    <div>
                        <h3 class="text-2xl font-bold tracking-tight">SEA Catering</h3>
                        <p class="mt-2 text-gray-400">Making healthy eating accessible for everyone in Indonesia since 2025.</p>
                    </div>
                </div>
                <div>
                    <h4 class="text-lg font-semibold">Contact Us</h4>
                    <ul class="mt-4 space-y-2 text-gray-300">
                        <li>Manager: Brian</li>
                        <li>Phone: 08123456789</li>
                        <li>Email: support@seacatering.id</li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold">Follow Us</h4>
                    <div class="mt-4 flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white"><span class="sr-only">Instagram</span><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.315 2c-4.068 0-4.57 0-6.172.086-1.597.073-2.693.333-3.642.723-.974.398-1.847.96-2.72 1.832-.872.872-1.433 1.748-1.832 2.72C.333 8.434.073 9.53.086 11.127 0 12.728 0 13.23 0 17.3c0 4.068.002 4.57.086 6.172.073 1.597.333 2.693.723 3.642.398.974.96 1.847 1.832 2.72.872.872 1.748 1.433 2.72 1.832 1.054.428 2.162.68 3.642.723 1.602.086 2.104.086 6.172.086s4.57 0 6.172-.086c1.597-.073 2.693-.333 3.642-.723.974-.398 1.847-.96 2.72-1.832.872-.872 1.433-1.748 1.832-2.72.39-.95.65-2.046.723-3.642.084-1.602.086-2.104.086-6.172s0-4.57-.086-6.172c-.073-1.597-.333-2.693-.723-3.642-.398-.974-.96-1.847-1.832-2.72-.872-.872-1.748-1.433-2.72-1.832C20.466.333 19.37.073 17.873.086 16.272 0 15.77 0 11.685 0h.63zm-.315 2.163c4.01.004 4.476 0 6.077.086 1.48.068 2.302.32 2.968.583.754.305 1.342.68 1.933 1.272.59.59.967 1.178 1.272 1.933.263.666.515 1.488.583 2.968.086 1.602.086 2.068.086 6.077s0 4.476-.086 6.077c-.068 1.48-.32 2.302-.583 2.968-.305.754-.68 1.342-1.272 1.933-.59.59-1.178.967-1.933 1.272-.666.263-1.488.515-2.968.583-1.602.086-2.068.086-6.077.086s-4.476 0-6.077-.086c-1.48-.068-2.302-.32-2.968-.583-.754-.305-1.342-.68-1.933-1.272-.59-.59-.967-1.178-1.272-1.933-.263-.666-.515-1.488-.583-2.968-.086-1.602-.086-2.068-.086-6.077s0-4.476.086-6.077c.068-1.48.32-2.302.583-2.968.305-.754.68-1.342 1.272-1.933.59-.59 1.178-.967 1.933-1.272.666-.263 1.488.515 2.968.583 1.602-.086 2.068-.086 6.077-.086zM12 6.848c-2.848 0-5.152 2.304-5.152 5.152s2.304 5.152 5.152 5.152 5.152-2.304 5.152-5.152S14.848 6.848 12 6.848zm0 8.482c-1.837 0-3.332-1.495-3.332-3.332s1.495-3.332 3.332-3.332 3.332 1.495 3.332 3.332-1.495 3.332-3.332 3.332zm6.406-8.318c-.796 0-1.44.645-1.44 1.44s.645 1.44 1.44 1.44 1.44-.645 1.44-1.44-.644-1.44-1.44-1.44z" clip-rule="evenodd" />
                            </svg></a>
                        <a href="#" class="text-gray-400 hover:text-white"><span class="sr-only">Facebook</span><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                            </svg></a>
                    </div>
                </div>
            </div>
            <div class="mt-12 border-t border-gray-700 pt-8 text-center">
                <p class="text-base text-gray-400">&copy; {{ date('Y') }} SEA Catering. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script type="module">
        document.addEventListener('DOMContentLoaded', function() {
            // --- Mobile Menu Toggle ---
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });

            // --- Scroll Animations ---
            const scrollElements = document.querySelectorAll('.fade-in-on-scroll');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                    }
                });
            }, {
                threshold: 0.1
            });
            scrollElements.forEach(el => observer.observe(el));
        });
    </script>
</body>

</html>