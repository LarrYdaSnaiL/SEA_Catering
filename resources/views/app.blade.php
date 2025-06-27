<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SEA Catering - Healthy Meals, Anytime, Anywhere')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">

    <!-- Styles (Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
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
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="{{ url('/') }}" class="text-gray-600 hover:text-emerald-600 transition-colors duration-300 {{ request()->is('/') ? 'nav-link-active' : 'font-semibold' }}">Home</a>
                    <a href="{{ url('/menu') }}" class="text-gray-600 hover:text-emerald-600 transition-colors duration-300 {{ request()->is('menu') ? 'nav-link-active' : 'font-semibold' }}">Menu</a>
                    <a href="{{ url('/subscription') }}" class="text-gray-600 hover:text-emerald-600 transition-colors duration-300 {{ request()->is('subscription') ? 'nav-link-active' : 'font-semibold' }}">Subscription</a>
                    <a href="{{ url('/#contact') }}" class="text-gray-600 hover:text-emerald-600 font-semibold transition-colors duration-300">Contact Us</a>
                    <a href="{{ url('/register') }}" class="bg-emerald-500 text-white font-bold rounded-full px-5 py-2 hover:bg-emerald-600 transition-transform duration-300 hover:scale-105 shadow-lg">Sign In</a>
                </nav>
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
            <a href="{{ url('/register') }}" class="block py-3 px-4 text-sm font-bold text-white bg-emerald-500 hover:bg-emerald-600 text-center">Sign In</a>
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

            // --- Star Rating Logic ---
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
                        const rating = this.dataset.rating;
                        ratingValueInput.value = rating;
                        resetStars(rating);
                    });
                });

                starRatingContainer.addEventListener('mouseout', function() {
                    resetStars(ratingValueInput.value);
                });

                function resetStars(currentRating = 0) {
                    stars.forEach((star, index) => {
                        if (index < currentRating) {
                            star.classList.add('text-yellow-400');
                            star.classList.remove('text-gray-300');
                        } else {
                            star.classList.add('text-gray-300');
                            star.classList.remove('text-yellow-400');
                        }
                    });
                }
            }

            // --- Testimonial Carousel and Form Submission Logic ---
            const carousel = document.getElementById('testimonial-carousel');
            if (carousel) {
                let testimonials = [{
                        quote: "SEA Catering has changed my life! The food is delicious, and I've never felt healthier. The delivery is always on time.",
                        name: "Alya",
                        location: "Jakarta",
                        rating: 5
                    },
                    {
                        quote: "As a busy professional, I don't have time to cook. SEA Catering is the perfect solution. Healthy, convenient, and amazing taste.",
                        name: "Budi",
                        location: "Surabaya",
                        rating: 5
                    },
                    {
                        quote: "I love the customization options! I can finally create meals that fit my specific dietary needs. Highly recommended!",
                        name: "Citra",
                        location: "Bali",
                        rating: 4
                    }
                ];
                let currentTestimonial = 0;

                function renderTestimonials() {
                    carousel.innerHTML = '';
                    testimonials.forEach((t, index) => {
                        const div = document.createElement('div');
                        div.className = `testimonial-item text-center p-4 ${index === currentTestimonial ? 'active' : ''}`;
                        let starsHTML = '';
                        for (let i = 0; i < 5; i++) {
                            starsHTML += `<svg class="w-5 h-5 inline-block ${i < t.rating ? 'text-yellow-400' : 'text-gray-300'}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>`;
                        }
                        div.innerHTML = `
                            <div class="flex justify-center mb-2">${starsHTML}</div>
                            <p class="text-xl italic text-gray-700">"${t.quote}"</p>
                            <p class="mt-4 font-bold text-emerald-600">${t.name}, <span class="font-normal text-gray-500">${t.location || 'Indonesia'}</span></p>
                        `;
                        carousel.appendChild(div);
                    });
                }

                const nextBtn = document.getElementById('next-testimonial-btn');
                const prevBtn = document.getElementById('prev-testimonial-btn');
                if (nextBtn && prevBtn) {
                    nextBtn.addEventListener('click', () => {
                        currentTestimonial = (currentTestimonial + 1) % testimonials.length;
                        renderTestimonials();
                    });
                    prevBtn.addEventListener('click', () => {
                        currentTestimonial = (currentTestimonial - 1 + testimonials.length) % testimonials.length;
                        renderTestimonials();
                    });
                }

                const testimonialForm = document.getElementById('testimonial-form');
                if (testimonialForm) {
                    testimonialForm.addEventListener('submit', function(e) {
                        e.preventDefault();
                        const newTestimonial = {
                            name: document.getElementById('customer_name').value,
                            quote: document.getElementById('review_message').value,
                            rating: parseInt(document.getElementById('rating-value').value, 10),
                            location: 'New Customer'
                        };

                        if (!newTestimonial.name || !newTestimonial.quote || !newTestimonial.rating || newTestimonial.rating === 0) {
                            alert('Please fill out all fields and provide a rating.');
                            return;
                        }

                        testimonials.unshift(newTestimonial);
                        currentTestimonial = 0;
                        renderTestimonials();
                        testimonialForm.reset();
                        document.getElementById('rating-value').value = 0;
                        initializeStarRating('star-rating');

                        const submissionModal = document.getElementById('testimonial-submission-modal');
                        if (submissionModal) submissionModal.classList.add('hidden');

                        alert('Thank you for your review!');
                    });
                }
                renderTestimonials();
            }

            // --- Details Modal Logic ---
            const mealDetailsModal = document.getElementById('details-modal');
            if (mealDetailsModal) {
                const detailButtons = document.querySelectorAll('.details-btn');
                const closeModalBtn = mealDetailsModal.querySelector('#close-modal-btn');
                const cancelModalBtn = mealDetailsModal.querySelector('#modal-cancel-btn');
                const modalOverlay = mealDetailsModal.querySelector('#modal-overlay');

                const openModal = (data) => {
                    if (!data) return;
                    mealDetailsModal.querySelector('#modal-plan-image').src = data.image;
                    mealDetailsModal.querySelector('#modal-plan-name').textContent = data.name;
                    mealDetailsModal.querySelector('#modal-plan-description').textContent = data.description;
                    mealDetailsModal.querySelector('#modal-plan-focus').textContent = data.focus;
                    mealDetailsModal.querySelector('#modal-plan-best-for').textContent = data.bestFor;

                    const menuList = mealDetailsModal.querySelector('#modal-plan-menu');
                    menuList.innerHTML = '';
                    const menuItems = JSON.parse(data.menu);
                    menuItems.forEach(item => {
                        const li = document.createElement('li');
                        li.textContent = item;
                        menuList.appendChild(li);
                    });

                    const planSlug = data.name.toLowerCase().replace(/\s+/g, '-');
                    mealDetailsModal.querySelector('#modal-subscribe-link').href = `{{ url('/subscription') }}?plan=${planSlug}`;

                    mealDetailsModal.classList.remove('hidden');
                };

                const closeModal = () => {
                    mealDetailsModal.classList.add('hidden');
                };

                detailButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        const planData = {
                            name: button.dataset.planName,
                            image: button.dataset.planImage,
                            description: button.dataset.planDescription,
                            menu: button.dataset.planMenu,
                            focus: button.dataset.planFocus,
                            bestFor: button.dataset.planBestFor,
                        };
                        openModal(planData);
                    });
                });

                if (closeModalBtn) closeModalBtn.addEventListener('click', closeModal);
                if (cancelModalBtn) cancelModalBtn.addEventListener('click', closeModal);
                if (modalOverlay) modalOverlay.addEventListener('click', closeModal);
            }

            // --- Testimonial Submission Modal Logic ---
            const submissionModal = document.getElementById('testimonial-submission-modal');
            const openSubmissionModalBtn = document.getElementById('open-testimonial-modal-btn');
            if (submissionModal && openSubmissionModalBtn) {
                const closeSubmissionModalBtn = submissionModal.querySelector('#cancel-submission-modal-btn').previousElementSibling;
                const cancelSubmissionModalBtn = submissionModal.querySelector('#cancel-submission-modal-btn');
                const submissionModalOverlay = submissionModal.querySelector('#submission-modal-overlay');

                const openModal = () => submissionModal.classList.remove('hidden');
                const closeModal = () => submissionModal.classList.add('hidden');

                openSubmissionModalBtn.addEventListener('click', openModal);
                if (closeSubmissionModalBtn) closeSubmissionModalBtn.addEventListener('click', closeModal);
                if (cancelSubmissionModalBtn) cancelSubmissionModalBtn.addEventListener('click', closeModal);
                if (submissionModalOverlay) submissionModalOverlay.addEventListener('click', closeModal);

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

                    if (selectedMeals === 0 || selectedDays === 0) {
                        if (priceDisplay) priceDisplay.textContent = 'Rp0,00';
                        return;
                    }

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

                subscriptionForm.addEventListener('submit', function(e) {
                    const selectedMeals = subscriptionForm.querySelectorAll('input[name="meal_type[]"]:checked').length;
                    const selectedDays = subscriptionForm.querySelectorAll('input[name="delivery_days[]"]:checked').length;

                    if (selectedMeals === 0) {
                        e.preventDefault();
                        alert('Please select at least one meal type.');
                        return;
                    }

                    if (selectedDays === 0) {
                        e.preventDefault();
                        alert('Please select at least one delivery day.');
                        return;
                    }

                    e.preventDefault();
                    const formData = new FormData(this);
                    const plan = formData.get('plan');
                    const meals = formData.getAll('meal_type[]');
                    const days = formData.getAll('delivery_days[]');
                    if (priceDisplay) {
                        alert(`Subscription Summary:\nPlan Price: Rp${plan}\nMeals: ${meals.join(', ')}\nDays: ${days.join(', ')}\nTotal: ${priceDisplay.textContent}`);
                    }
                });
            }

            // Details Modal Logic for Menu Page
            const detailsModal = document.getElementById('details-modal');
            if (detailsModal) {
                const detailButtons = document.querySelectorAll('.details-btn');
                const closeModalBtn = detailsModal.querySelector('#close-modal-btn');
                const cancelModalBtn = detailsModal.querySelector('#modal-cancel-btn');
                const modalOverlay = detailsModal.querySelector('#modal-overlay');

                const openModal = (data) => {
                    if (!data) return;
                    detailsModal.querySelector('#modal-plan-image').src = data.image;
                    detailsModal.querySelector('#modal-plan-name').textContent = data.name;
                    detailsModal.querySelector('#modal-plan-description').textContent = data.description;
                    detailsModal.querySelector('#modal-plan-focus').textContent = data.focus;
                    detailsModal.querySelector('#modal-plan-best-for').textContent = data.bestFor;

                    const menuList = detailsModal.querySelector('#modal-plan-menu');
                    menuList.innerHTML = '';
                    const menuItems = JSON.parse(data.menu);
                    menuItems.forEach(item => {
                        const li = document.createElement('li');
                        li.textContent = item;
                        menuList.appendChild(li);
                    });

                    const planSlug = data.name.toLowerCase().replace(/\s+/g, '-');
                    detailsModal.querySelector('#modal-subscribe-link').href = `{{ url('/subscription') }}?plan=${planSlug}`;

                    detailsModal.classList.remove('hidden');
                };

                const closeModal = () => {
                    detailsModal.classList.add('hidden');
                };

                detailButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        const planData = {
                            name: button.dataset.planName,
                            image: button.dataset.planImage,
                            description: button.dataset.planDescription,
                            menu: button.dataset.planMenu,
                            focus: button.dataset.planFocus,
                            bestFor: button.dataset.planBestFor,
                        };
                        openModal(planData);
                    });
                });

                if (closeModalBtn) closeModalBtn.addEventListener('click', closeModal);
                if (cancelModalBtn) cancelModalBtn.addEventListener('click', closeModal);
                if (modalOverlay) modalOverlay.addEventListener('click', closeModal);
            }
        });
    </script>
</body>

</html>