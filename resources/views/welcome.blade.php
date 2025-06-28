@extends('layouts.app')

@section('title', 'SEA Catering - Healthy Meals, Anytime, Anywhere')

@section('content')

<!-- Hero Section -->
<section id="home" class="relative h-screen flex items-center justify-center text-center overflow-hidden -mt-20">
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
            <a href="{{ url('/subscription') }}" class="inline-block bg-emerald-500 text-white font-bold rounded-full px-10 py-4 text-lg hover:bg-emerald-600 transition-all duration-300 transform hover:scale-105 shadow-xl">
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

<!-- Testimonials Section -->
<section id="testimonials" class="py-20 sm:py-28 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">What Our Customers Say</h2>
            <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-600">
                Real stories from our happy and healthy customers across Indonesia.
            </p>
        </div>
        <div class="mt-12 max-w-4xl mx-auto relative">
            <div id="testimonial-carousel" class="overflow-hidden">
                {{-- JS injects testimonials here. This part is now controlled by the layout --}}
            </div>
            <button id="prev-testimonial-btn" class="absolute top-1/2 -left-4 md:-left-12 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-md text-emerald-500 hover:bg-gray-100 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button id="next-testimonial-btn" class="absolute top-1/2 -right-4 md:-right-12 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-md text-emerald-500 hover:bg-gray-100 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
        <div class="mt-10 text-center">
                @auth
                    <button id="open-testimonial-modal-btn" type="button" class="inline-block bg-emerald-600 text-white font-bold rounded-full px-8 py-3 hover:bg-emerald-700 transition-transform duration-300 hover:scale-105 shadow-lg">
                        Rate Our Service
                    </button>
                @else
                    <a href="{{ route('login') }}" class="inline-block bg-emerald-600 text-white font-bold rounded-full px-8 py-3 hover:bg-emerald-700 transition-transform duration-300 hover:scale-105 shadow-lg">
                        Login to Rate Our Service
                    </a>
                @endguest
        </div>
    </div>
</section>

<!-- Testimonial Submission Modal -->
@auth
<div id="testimonial-submission-modal" class="hidden fixed inset-0 z-[100] overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div id="submission-modal-overlay" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <form id="testimonial-form" action="{{ route('testimonials.store') }}" method="POST">
                @csrf
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Share Your Experience</h3>
                            <div class="mt-4 space-y-4">
                                <div>
                                    <label for="customer_name" class="sr-only">Your Name</label>
                                    <input type="text" name="customer_name" id="customer_name" required class="block w-full border-gray-300 rounded-md cursor-not-allowed shadow-sm focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm" placeholder="Your Name" value="{{ Auth::user()->name }}" readonly>
                                </div>
                                <div>
                                    <label for="review_message" class="sr-only">Your Review</label>
                                    <textarea id="review_message" name="review_message" rows="4" required class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm p-2" placeholder="Write your review here..."></textarea>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Your Rating</label>
                                    <div class="flex items-center" id="star-rating">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <svg class="star w-8 h-8 text-gray-300 cursor-pointer" data-rating="{{ $i }}" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                            @endfor
                                            <input type="hidden" name="rating" class="rating-value" id="rating-value" value="0" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-emerald-600 text-base font-medium text-white hover:bg-emerald-700 sm:ml-3 sm:w-auto sm:text-sm">
                        Submit
                    </button>
                    <button type="button" id="cancel-submission-modal-btn" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endauth
<script>
    window.testimonials = @json($testimonials);
</script>
@endsection