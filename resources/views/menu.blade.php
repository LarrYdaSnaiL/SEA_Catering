@extends('layouts.app')

@section('title', 'Menu & Meal Plans - SEA Catering')

@section('content')
<div class="bg-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-base font-semibold text-emerald-600 tracking-wider uppercase">Our Menu</h2>
            <p class="mt-2 text-3xl font-extrabold text-gray-900 sm:text-4xl">
                Choose Your Perfect Meal Plan
            </p>
            <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500">
                Crafted by nutritionists, perfected by chefs. Find the plan that fits your health goals.
            </p>
        </div>

        <div class="mt-12 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            <!-- Diet Plan Card -->
            <div class="flex flex-col rounded-2xl shadow-xl overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                <img class="h-64 w-full object-cover" src="https://placehold.co/600x400/ef4444/ffffff?text=Diet+Plan" alt="Healthy salad for diet plan">
                <div class="flex-1 p-6 bg-gray-50 flex flex-col justify-between">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900">Diet Plan</h3>
                        <p class="mt-2 text-gray-600">Balanced meals for a healthy and sustainable diet, perfect for maintaining your ideal weight.</p>
                        <p class="mt-4 font-bold text-emerald-600 text-3xl">Rp30.000<span class="text-sm font-semibold text-gray-500">/meal</span></p>
                    </div>
                    <div class="mt-6">
                        <button type="button" class="details-btn w-full text-center bg-gray-200 text-gray-800 font-bold rounded-lg px-4 py-3 hover:bg-gray-300 transition duration-300"
                            data-plan-name="Diet Plan"
                            data-plan-image="https://placehold.co/600x400/ef4444/ffffff?text=Diet+Plan"
                            data-plan-description="Our Diet Plan is designed for effective and sustainable weight management. Each meal is calorie-controlled, low in carbs, and high in fiber to keep you full and satisfied."
                            data-plan-menu='["Grilled Chicken Salad with Lemon Vinaigrette", "Quinoa Bowl with Roasted Vegetables", "Steamed Fish with Asparagus", "Lentil Soup and Whole Wheat Bread"]'
                            data-plan-focus="Low Calorie, High Fiber, Lean Protein"
                            data-plan-best-for="Individuals looking to lose weight in a healthy, controlled manner.">
                            See Details
                        </button>
                    </div>
                </div>
            </div>

            <!-- Protein Plan Card -->
            <div class="flex flex-col rounded-2xl shadow-xl overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                <img class="h-64 w-full object-cover" src="https://placehold.co/600x400/3b82f6/ffffff?text=Protein+Plan" alt="High protein meal with chicken breast">
                <div class="flex-1 p-6 bg-gray-50 flex flex-col justify-between">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900">Protein Plan</h3>
                        <p class="mt-2 text-gray-600">High-protein meals to fuel your workouts and build lean muscle mass.</p>
                        <p class="mt-4 font-bold text-emerald-600 text-3xl">Rp40.000<span class="text-sm font-semibold text-gray-500">/meal</span></p>
                    </div>
                    <div class="mt-6">
                        <button type="button" class="details-btn w-full text-center bg-gray-200 text-gray-800 font-bold rounded-lg px-4 py-3 hover:bg-gray-300 transition duration-300"
                            data-plan-name="Protein Plan"
                            data-plan-image="https://placehold.co/600x400/3b82f6/ffffff?text=Protein+Plan"
                            data-plan-description="Fuel your body for optimal muscle growth. This plan is packed with high-quality proteins and complex carbohydrates to support intense training and recovery."
                            data-plan-menu='["Beef Steak with Sweet Potato and Broccoli", "Chicken Breast with Brown Rice and Beans", "Salmon with Quinoa and Green Beans", "High-Protein Smoothie"]'
                            data-plan-focus="High Protein, Complex Carbs, Healthy Fats"
                            data-plan-best-for="Athletes, bodybuilders, and anyone looking to increase their strength and muscle mass.">
                            See Details
                        </button>
                    </div>
                </div>
            </div>

            <!-- Royal Plan Card -->
            <div class="flex flex-col rounded-2xl shadow-xl overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                <img class="h-64 w-full object-cover" src="https://placehold.co/600x400/f59e0b/ffffff?text=Royal+Plan" alt="Premium meal with salmon and asparagus">
                <div class="flex-1 p-6 bg-gray-50 flex flex-col justify-between">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900">Royal Plan</h3>
                        <p class="mt-2 text-gray-600">Experience the best with our premium ingredients and gourmet recipes.</p>
                        <p class="mt-4 font-bold text-emerald-600 text-3xl">Rp60.000<span class="text-sm font-semibold text-gray-500">/meal</span></p>
                    </div>
                    <div class="mt-6">
                        <button type="button" class="details-btn w-full text-center bg-gray-200 text-gray-800 font-bold rounded-lg px-4 py-3 hover:bg-gray-300 transition duration-300"
                            data-plan-name="Royal Plan"
                            data-plan-image="https://placehold.co/600x400/f59e0b/ffffff?text=Royal+Plan"
                            data-plan-description="Indulge in our most exclusive plan, featuring premium ingredients like salmon, sirloin steak, and organic produce. Perfect for those who want the best of the best."
                            data-plan-menu='["Wagyu Sirloin with Truffle Mash", "Pan-Seared Salmon with Saffron Risotto", "Lobster Thermidor", "Organic Kale and Avocado Salad"]'
                            data-plan-focus="Premium Ingredients, Gourmet Recipes, Maximum Flavor"
                            data-plan-best-for="Food connoisseurs and anyone looking for a luxurious and healthy dining experience.">
                            See Details
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Details Modal -->
<div id="details-modal" class="hidden fixed inset-0 z-[100] overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Background overlay -->
        <div id="modal-overlay" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

        <!-- Modal panel -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <button id="close-modal-btn" type="button" class="absolute top-4 right-4 text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Close</span>
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <img id="modal-plan-image" src="" alt="Meal Plan Image" class="w-full h-64 object-cover rounded-lg">
                <div class="mt-4">
                    <h3 class="text-3xl leading-6 font-bold text-gray-900" id="modal-plan-name"></h3>
                    <div class="mt-4">
                        <p class="text-sm text-gray-600" id="modal-plan-description"></p>
                    </div>
                    <div class="mt-6">
                        <h4 class="font-bold text-lg">Nutritional Focus:</h4>
                        <p class="text-gray-700" id="modal-plan-focus"></p>
                    </div>
                    <div class="mt-4">
                        <h4 class="font-bold text-lg">Best For:</h4>
                        <p class="text-gray-700" id="modal-plan-best-for"></p>
                    </div>
                    <div class="mt-6">
                        <h4 class="font-bold text-lg">Sample Weekly Menu:</h4>
                        <ul id="modal-plan-menu" class="mt-2 list-disc list-inside text-gray-700 space-y-1"></ul>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <a id="modal-subscribe-link" href="#" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-emerald-600 text-base font-medium text-white hover:bg-emerald-700 sm:ml-3 sm:w-auto sm:text-sm">
                    Subscribe to this Plan
                </a>
                <button type="button" id="modal-cancel-btn" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>
@endsection