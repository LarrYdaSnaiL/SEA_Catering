@extends('app')

@section('title', 'Subscribe to a Meal Plan - SEA Catering')

@section('content')
<div class="bg-gray-50 py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                Customize Your Weekly Plan
            </h2>
            <p class="mt-4 text-xl text-gray-600">
                Build your perfect subscription. Healthy eating, tailored to your life.
            </p>
        </div>

        <div class="mt-12 bg-white rounded-2xl shadow-xl">
            <form id="subscription-form" action="#" method="POST" class="p-8">
                @csrf
                <div class="space-y-10">
                    <!-- Step 1: Personal Details -->
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 border-b-2 border-emerald-200 pb-2">Step 1: Your Details</h3>
                        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="full_name" class="block text-sm font-medium text-gray-700">Full Name <span class="text-red-500">*</span></label>
                                <input type="text" name="full_name" id="full_name" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm p-2" placeholder="Noel A.">
                            </div>
                            <div>
                                <label for="phone_number" class="block text-sm font-medium text-gray-700">Active Phone Number <span class="text-red-500">*</span></label>
                                <input type="tel" name="phone_number" id="phone_number" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm p-2" placeholder="08123456789">
                            </div>
                        </div>
                    </div>

                    <!-- Step 2: Plan Selection -->
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 border-b-2 border-emerald-200 pb-2">Step 2: Choose Your Plan <span class="text-red-500">*</span></h3>
                        <div id="plan-selection" class="mt-6 grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <!-- Diet Plan -->
                            <label class="relative flex flex-col p-4 border-2 border-gray-200 rounded-lg cursor-pointer transition hover:bg-emerald-50 has-[:checked]:border-emerald-500 has-[:checked]:bg-emerald-50">
                                <input type="radio" name="plan" value="30000" class="absolute top-4 right-4" required>
                                <span class="text-lg font-bold text-gray-900">Diet Plan</span>
                                <span class="text-sm text-gray-500">For balanced nutrition</span>
                                <span class="mt-2 text-2xl font-bold text-emerald-600">Rp30.000<span class="text-sm font-normal text-gray-500">/meal</span></span>
                            </label>
                            <!-- Protein Plan -->
                            <label class="relative flex flex-col p-4 border-2 border-gray-200 rounded-lg cursor-pointer transition hover:bg-emerald-50 has-[:checked]:border-emerald-500 has-[:checked]:bg-emerald-50">
                                <input type="radio" name="plan" value="40000" class="absolute top-4 right-4">
                                <span class="text-lg font-bold text-gray-900">Protein Plan</span>
                                <span class="text-sm text-gray-500">For muscle building</span>
                                <span class="mt-2 text-2xl font-bold text-emerald-600">Rp40.000<span class="text-sm font-normal text-gray-500">/meal</span></span>
                            </label>
                            <!-- Royal Plan -->
                            <label class="relative flex flex-col p-4 border-2 border-gray-200 rounded-lg cursor-pointer transition hover:bg-emerald-50 has-[:checked]:border-emerald-500 has-[:checked]:bg-emerald-50">
                                <input type="radio" name="plan" value="60000" class="absolute top-4 right-4">
                                <span class="text-lg font-bold text-gray-900">Royal Plan</span>
                                <span class="text-sm text-gray-500">Premium ingredients</span>
                                <span class="mt-2 text-2xl font-bold text-emerald-600">Rp60.000<span class="text-sm font-normal text-gray-500">/meal</span></span>
                            </label>
                        </div>
                    </div>

                    <!-- Step 3: Meal Customization -->
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 border-b-2 border-emerald-200 pb-2">Step 3: Customize Your Meals</h3>
                        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Meal Type (select at least one) <span class="text-red-500">*</span></label>
                                <div id="meal-type" class="mt-2 space-y-2">
                                    <label class="flex items-center p-3 rounded-md transition hover:bg-gray-100"><input type="checkbox" name="meal_type[]" value="breakfast" class="h-4 w-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500"> <span class="ml-3 text-sm text-gray-800">Breakfast</span></label>
                                    <label class="flex items-center p-3 rounded-md transition hover:bg-gray-100"><input type="checkbox" name="meal_type[]" value="lunch" class="h-4 w-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500"> <span class="ml-3 text-sm text-gray-800">Lunch</span></label>
                                    <label class="flex items-center p-3 rounded-md transition hover:bg-gray-100"><input type="checkbox" name="meal_type[]" value="dinner" class="h-4 w-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500"> <span class="ml-3 text-sm text-gray-800">Dinner</span></label>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Delivery Days (select at least one) <span class="text-red-500">*</span></label>
                                <div id="delivery-days" class="mt-2 grid grid-cols-2 gap-2">
                                    <label class="flex items-center p-3 rounded-md transition hover:bg-gray-100"><input type="checkbox" name="delivery_days[]" value="mon" class="h-4 w-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500"> <span class="ml-3 text-sm text-gray-800">Monday</span></label>
                                    <label class="flex items-center p-3 rounded-md transition hover:bg-gray-100"><input type="checkbox" name="delivery_days[]" value="tue" class="h-4 w-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500"> <span class="ml-3 text-sm text-gray-800">Tuesday</span></label>
                                    <label class="flex items-center p-3 rounded-md transition hover:bg-gray-100"><input type="checkbox" name="delivery_days[]" value="wed" class="h-4 w-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500"> <span class="ml-3 text-sm text-gray-800">Wednesday</span></label>
                                    <label class="flex items-center p-3 rounded-md transition hover:bg-gray-100"><input type="checkbox" name="delivery_days[]" value="thu" class="h-4 w-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500"> <span class="ml-3 text-sm text-gray-800">Thursday</span></label>
                                    <label class="flex items-center p-3 rounded-md transition hover:bg-gray-100"><input type="checkbox" name="delivery_days[]" value="fri" class="h-4 w-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500"> <span class="ml-3 text-sm text-gray-800">Friday</span></label>
                                    <label class="flex items-center p-3 rounded-md transition hover:bg-gray-100"><input type="checkbox" name="delivery_days[]" value="sat" class="h-4 w-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500"> <span class="ml-3 text-sm text-gray-800">Saturday</span></label>
                                    <label class="flex items-center p-3 rounded-md transition hover:bg-gray-100"><input type="checkbox" name="delivery_days[]" value="sun" class="h-4 w-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500"> <span class="ml-3 text-sm text-gray-800">Sunday</span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 4: Allergies -->
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 border-b-2 border-emerald-200 pb-2">Step 4: Dietary Restrictions</h3>
                        <div class="mt-6">
                            <label for="allergies" class="block text-sm font-medium text-gray-700">Allergies or preferences (optional)</label>
                            <textarea id="allergies" name="allergies" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm p-2" placeholder="e.g., No peanuts, less spicy"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Total Calculation & Submission -->
                <div class="mt-10 pt-8 border-t-2 border-dashed border-gray-200 sm:flex items-center justify-between">
                    <div class="text-center sm:text-left">
                        <p class="text-sm font-medium text-gray-500">Estimated Weekly Total:</p>
                        <p id="total-price" class="text-4xl font-extrabold text-emerald-600">Rp0,00</p>
                    </div>
                    <div class="mt-6 sm:mt-0 sm:ml-6">
                        <button type="submit" class="w-full md:w-auto bg-emerald-600 text-white font-bold rounded-lg px-12 py-4 hover:bg-emerald-700 transition duration-300 shadow-lg transform hover:scale-105">
                            Subscribe Now
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection