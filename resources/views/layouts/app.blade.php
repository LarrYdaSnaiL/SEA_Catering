<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SEA Catering - Healthy Meals, Anytime, Anywhere')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/icon.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Styles (Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Using Tailwind CSS via CDN for standalone preview -->
    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        .nav-link-active {
            color: #059669;
            font-weight: 700;
        }

        #testimonial-carousel .testimonial-item {
            display: none;
        }

        #testimonial-carousel .testimonial-item.active {
            display: block;
            animation: slide-up-fade-in 0.5s ease-in-out;
        }

        /* Fix for input padding to prevent text overlapping the border/outline */
        input[type='text'],
        input[type='email'],
        input[type='tel'],
        input[type='password'],
        textarea {
            padding: 0.5rem 0.75rem;
        }
    </style>
</head>

<body class="bg-gray-50 font-sans antialiased text-gray-800 pt-20">

    <!-- Header -->
    <header class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-sm shadow-md transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-2">
                <a href="{{ url('/') }}" class="flex items-center space-x-2">
                    <img src="{{ asset('images/icon.png') }}" alt="SEA Catering Logo" class="h-12 w-auto" onerror="this.style.display='none'">
                    <span class="text-2xl sm:text-3xl font-extrabold text-emerald-600 tracking-tighter">SEA Catering</span>
                </a>
                <div class="flex items-center space-x-8">
                    <nav class="hidden md:flex items-center space-x-8">
                        <a href="{{ url('/') }}" class="text-gray-600 hover:text-emerald-600 transition-colors duration-300 {{ request()->is('/') ? 'nav-link-active' : 'font-semibold' }}">Home</a>
                        <a href="{{ url('/menu') }}" class="text-gray-600 hover:text-emerald-600 transition-colors duration-300 {{ request()->is('menu') ? 'nav-link-active' : 'font-semibold' }}">Menu</a>
                        <a href="{{ url('/subscription') }}" class="text-gray-600 hover:text-emerald-600 transition-colors duration-300 {{ request()->is('subscription') ? 'nav-link-active' : 'font-semibold' }}">Subscription</a>
                        <a href="{{ url('/#contact') }}" class="text-gray-600 hover:text-emerald-600 font-semibold transition-colors duration-300">Contact Us</a>
                    </nav>

                    @auth
                    <!-- User Dropdown Menu -->
                    <div class="relative hidden md:block" id="user-dropdown-container">
                        <button id="user-menu-button" class="flex items-center space-x-2 text-sm rounded-full border-2 border-gray-200 py-1 pl-6 pr-2 transition-colors hover:bg-gray-100">
                            <span class="font-semibold text-gray-700">Welcome, {{ Str::words(Auth::user()->name, 1, '') }}</span>
                            <svg class="h-8 w-8 text-gray-400" viewBox="0 0 24 24" fill="currentColor">
                                <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div id="user-dropdown" class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                            <div class="px-4 py-3 border-b border-gray-200">
                                <p class="text-sm font-semibold">Signed in as</p>
                                <p class="text-sm text-gray-600 truncate">{{ Auth::user()->name }}</p>
                            </div>
                            @if(!Auth::user()->is_admin)
                            <a href="{{ route('dashboard.user') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Dashboard</a>
                            @else
                            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Dashboard</a>
                            @endif
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                            <div class="border-t border-gray-100"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Logout</button>
                            </form>
                        </div>
                    </div>
                    @else
                    <!-- Sign In Button -->
                    <div class="hidden md:block">
                        <a href="{{ route('login') }}" class="bg-emerald-500 text-white font-bold rounded-full px-5 py-2 hover:bg-emerald-600 transition-transform duration-300 hover:scale-105 shadow-lg">Sign In</a>
                    </div>
                    @endauth
                </div>

                <button id="mobile-menu-button" class="md:hidden p-2 rounded-md text-gray-600 hover:text-emerald-600 hover:bg-gray-100">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200">
            <a href="{{ url('/') }}" class="block py-2 px-4 text-sm transition-colors duration-300 {{ request()->is('/') ? 'text-emerald-600 font-bold bg-emerald-50' : 'text-gray-700 hover:bg-emerald-50' }}">Home</a>
            <a href="{{ url('/menu') }}" class="block py-2 px-4 text-sm transition-colors duration-300 {{ request()->is('menu') ? 'text-emerald-600 font-bold bg-emerald-50' : 'text-gray-700 hover:bg-emerald-50' }}">Menu</a>
            <a href="{{ url('/subscription') }}" class="block py-2 px-4 text-sm transition-colors duration-300 {{ request()->is('subscription') ? 'text-emerald-600 font-bold bg-emerald-50' : 'text-gray-700 hover:bg-emerald-50' }}">Subscription</a>
            <a href="{{ url('/#contact') }}" class="block py-2 px-4 text-sm text-gray-700 hover:bg-emerald-50">Contact Us</a>
            @auth
            <div class="px-4 py-3 border-t">
                <p class="font-semibold text-gray-800 block">Welcome, {{ Auth::user()->name }}</p>
                @if(!Auth::user()->is_admin)
                <a href="{{ route('dashboard.user') }}" class="block text-sm text-gray-700 mt-2 hover:text-emerald-600">My Dashboard</a>
                @else
                <a href="{{ route('admin.dashboard') }}" class="block text-sm text-gray-700 mt-2 hover:text-emerald-600">My Dashboard</a>
                @endif
                <a href="{{ route('profile.edit') }}" class="block text-sm text-gray-700 mt-2 hover:text-emerald-600">Profile</a>
                <form method="POST" action="{{ route('logout') }}" class="mt-2">
                    @csrf
                    <button type="submit" class="w-full text-left text-sm text-red-600 font-bold bg-red-50 hover:bg-red-100 p-2 rounded-md">Logout</button>
                </form>
            </div>
            @else
            <a href="{{ route('login') }}" class="block py-3 px-4 text-sm font-bold text-white bg-emerald-500 hover:bg-emerald-600 text-center">Sign In</a>
            @endauth
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer id="contact" class="bg-gray-800 text-white">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="md:col-span-2 flex items-start space-x-4">
                    <img src="{{ asset('images/icon.png') }}" alt="SEA Catering Logo" class="h-16 w-auto mt-1" onerror="this.style.display='none'">
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

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script type="module">
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile Menu Toggle
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            if (mobileMenuButton) {
                mobileMenuButton.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                });
            }

            // User Dropdown Logic
            const userMenuButton = document.getElementById('user-menu-button');
            const userDropdown = document.getElementById('user-dropdown');

            if (userMenuButton) {
                userMenuButton.addEventListener('click', function(event) {
                    event.stopPropagation();
                    userDropdown.classList.toggle('hidden');
                });

                window.addEventListener('click', function(e) {
                    const container = document.getElementById('user-dropdown-container');
                    if (container && !container.contains(e.target)) {
                        if (userDropdown) userDropdown.classList.add('hidden');
                    }
                });
            }

            // Scroll Animations
            const scrollElements = document.querySelectorAll('.fade-in-on-scroll');
            if (scrollElements.length > 0) {
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
            }

            // Testimonials Carousel
            const carousel = document.getElementById('testimonial-carousel');
            if (carousel) {
                let testimonials = window.testimonials || [];
                let currentTestimonial = 0;

                function renderTestimonials() {
                    carousel.innerHTML = '';
                    if (testimonials.length === 0) {
                        carousel.innerHTML = `<div class="text-center text-gray-500 p-4">Be the first to leave a review!</div>`;
                        return;
                    }
                    testimonials.forEach((t, index) => {
                        const div = document.createElement('div');
                        div.className = `testimonial-item text-center p-4 ${index === currentTestimonial ? 'active' : ''}`;
                        let starsHTML = '';
                        for (let i = 0; i < 5; i++) {
                            starsHTML += `<svg class="w-5 h-5 inline-block ${i < t.rating ? 'text-yellow-400' : 'text-gray-300'}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>`;
                        }
                        div.innerHTML = `
                            <div class="flex justify-center mb-2">${starsHTML}</div>
                            <p class="text-xl italic text-gray-700">"${t.review_message}"</p>
                            <p class="mt-4 font-bold text-emerald-600">${t.customer_name}</p>
                        `;
                        carousel.appendChild(div);
                    });
                }

                const nextBtn = document.getElementById('next-testimonial-btn');
                const prevBtn = document.getElementById('prev-testimonial-btn');
                if (nextBtn && prevBtn) {
                    nextBtn.addEventListener('click', () => {
                        if (testimonials.length > 0) {
                            currentTestimonial = (currentTestimonial + 1) % testimonials.length;
                            renderTestimonials();
                        }
                    });
                    prevBtn.addEventListener('click', () => {
                        if (testimonials.length > 0) {
                            currentTestimonial = (currentTestimonial - 1 + testimonials.length) % testimonials.length;
                            renderTestimonials();
                        }
                    });
                }
                renderTestimonials();
            }

            // Star Rating Logic
            function initializeStarRating(containerId) {
                const starRatingContainer = document.getElementById(containerId);
                if (!starRatingContainer) return;
                const stars = starRatingContainer.querySelectorAll('.star');
                const ratingValueInput = starRatingContainer.querySelector('.rating-value');
                stars.forEach(star => {
                    star.addEventListener('mouseover', function() {
                        resetStars();
                        const rating = this.dataset.rating;
                        for (let i = 0; i < rating; i++) {
                            stars[i].classList.replace('text-gray-300', 'text-yellow-400');
                        }
                    });
                    star.addEventListener('click', function() {
                        ratingValueInput.value = this.dataset.rating;
                        resetStars(this.dataset.rating);
                    });
                });
                starRatingContainer.addEventListener('mouseout', () => resetStars(ratingValueInput.value));

                function resetStars(currentRating = 0) {
                    stars.forEach((star, index) => {
                        star.classList.toggle('text-yellow-400', index < currentRating);
                        star.classList.toggle('text-gray-300', index >= currentRating);
                    });
                }
            }

            // Testimonial Submission Modal Logic
            const submissionModal = document.getElementById('testimonial-submission-modal');
            if (submissionModal) {
                const openBtn = document.getElementById('open-testimonial-modal-btn');
                const cancelBtn = document.getElementById('cancel-submission-modal-btn');
                const overlay = document.getElementById('submission-modal-overlay');

                if (openBtn) openBtn.addEventListener('click', () => submissionModal.classList.remove('hidden'));
                if (cancelBtn) cancelBtn.addEventListener('click', () => submissionModal.classList.add('hidden'));
                if (overlay) overlay.addEventListener('click', () => submissionModal.classList.add('hidden'));

                initializeStarRating('star-rating');
            }

            // Subscription Form Price Calculation
            const subscriptionForm = document.getElementById('subscription-form');
            if (subscriptionForm) {
                const planInputs = subscriptionForm.querySelectorAll('input[name="plan"]');
                const mealTypeInputs = subscriptionForm.querySelectorAll('input[name="meal_type[]"]');
                const deliveryDayInputs = subscriptionForm.querySelectorAll('input[name="delivery_days[]"]');
                const priceDisplay = document.getElementById('total-price');

                function calculateTotal() {
                    const selectedPlan = subscriptionForm.querySelector('input[name="plan"]:checked');
                    if (!selectedPlan) {
                        if (priceDisplay) priceDisplay.textContent = 'Rp0,00';
                        return;
                    }
                    const planPrice = parseFloat(selectedPlan.value);
                    const selectedMeals = subscriptionForm.querySelectorAll('input[name="meal_type[]"]:checked').length;
                    const selectedDays = subscriptionForm.querySelectorAll('input[name="delivery_days[]"]:checked').length;
                    const weeklyTotal = planPrice * selectedMeals * selectedDays * 4.3;

                    if (priceDisplay) {
                        priceDisplay.textContent = new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR',
                            minimumFractionDigits: 2
                        }).format(weeklyTotal);
                    }
                }
                [...planInputs, ...mealTypeInputs, ...deliveryDayInputs].forEach(input => {
                    input.addEventListener('change', calculateTotal);
                });
            }

            // Initialize Date Range Picker
            if (document.getElementById('start_date')) {
                flatpickr("#start_date", {
                    dateFormat: "Y-m-d",
                });
            }
            if (document.getElementById('end_date')) {
                flatpickr("#end_date", {
                    dateFormat: "Y-m-d",
                });
            }

            // Initialize Subscription Growth Chart
            const ctx = document.getElementById('subscriptionGrowthChart');
            if (ctx && window.chartData) {
                const gradient = ctx.getContext('2d').createLinearGradient(0, 0, 0, 400);
                gradient.addColorStop(0, 'rgba(5, 150, 105, 0.4)');
                gradient.addColorStop(1, 'rgba(5, 150, 105, 0)');

                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: window.chartData.labels,
                        datasets: [{
                            label: 'New Subscriptions',
                            data: window.chartData.values,
                            borderColor: 'rgb(5, 150, 105)',
                            backgroundColor: gradient, // Use the gradient fill
                            borderWidth: 3,
                            tension: 0.4,
                            fill: true,
                            pointBackgroundColor: 'rgb(5, 150, 105)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgb(5, 150, 105)',
                            pointRadius: 4,
                            pointHoverRadius: 7,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1,
                                    color: '#6b7280'
                                },
                                grid: {
                                    color: '#e5e7eb'
                                }
                            },
                            x: {
                                ticks: {
                                    color: '#6b7280'
                                },
                                grid: {
                                    display: false
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                mode: 'index',
                                intersect: false,
                                backgroundColor: '#fff',
                                titleColor: '#1f2937',
                                bodyColor: '#4b5563',
                                borderColor: '#e5e7eb',
                                borderWidth: 1,
                                padding: 10,
                                displayColors: false,
                                callbacks: {
                                    label: function(context) {
                                        return `Subscriptions: ${context.parsed.y}`;
                                    }
                                }
                            }
                        },
                        animation: {
                            duration: 1000,
                            easing: 'easeInOutQuart'
                        }
                    }
                });
            }

            // Cancellation Confirmation Modal Logic
            const cancelModal = document.getElementById('cancel-confirm-modal');
            if (cancelModal) {
                const cancelBtns = document.querySelectorAll('.cancel-btn');
                const closeBtn = document.getElementById('close-cancel-modal-btn');
                const confirmBtn = document.getElementById('confirm-cancel-btn');
                const overlay = document.getElementById('cancel-modal-overlay');
                let formToSubmit = null;

                cancelBtns.forEach(btn => {
                    btn.addEventListener('click', function() {
                        formToSubmit = document.getElementById(this.dataset.formId);
                        if (formToSubmit) {
                            cancelModal.classList.remove('hidden');
                        }
                    });
                });

                const closeModal = () => {
                    cancelModal.classList.add('hidden');
                    formToSubmit = null;
                };

                confirmBtn.addEventListener('click', () => {
                    if (formToSubmit) {
                        formToSubmit.submit();
                    }
                });

                closeBtn.addEventListener('click', closeModal);
                overlay.addEventListener('click', closeModal);
            }
        });
    </script>
</body>

</html>