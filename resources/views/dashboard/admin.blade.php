@extends('layouts.app')

@section('title', 'Admin Dashboard - SEA Catering')

@section('content')
<div class="bg-gray-100 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="sm:flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-900">Admin Dashboard</h1>
            <div class="mt-4 sm:mt-0">
                <form id="date-range-form" method="GET" action="{{ route('admin.dashboard') }}" class="flex items-center space-x-2">
                    <input type="text" id="start_date" name="start_date" class="border-gray-300 rounded-md shadow-sm" value="{{ $start_date }}">
                    <span class="text-gray-500">to</span>
                    <input type="text" id="end_date" name="end_date" class="border-gray-300 rounded-md shadow-sm" value="{{ $end_date }}">
                    <button type="submit" class="bg-emerald-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-emerald-600">Filter</button>
                </form>
            </div>
        </div>

        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- New Subscriptions Card -->
            <div class="bg-white p-6 rounded-2xl shadow-lg">
                <h3 class="text-sm font-semibold text-gray-500">New Subscriptions</h3>
                <p class="text-4xl font-extrabold text-emerald-600 mt-2">{{ number_format($new_subscriptions) }}</p>
                <p class="text-xs text-gray-400">in selected range</p>
            </div>
            <!-- MRR Card -->
            <div class="bg-white p-6 rounded-2xl shadow-lg">
                <h3 class="text-sm font-semibold text-gray-500">Est. Monthly Revenue (MRR)</h3>
                <p class="text-4xl font-extrabold text-blue-600 mt-2">{{ 'Rp' . number_format($mrr / 1000000, 1) . 'jt' }}</p>
                <p class="text-xs text-gray-400">from all active subscriptions</p>
            </div>
            <!-- Reactivations Card -->
            <div class="bg-white p-6 rounded-2xl shadow-lg">
                <h3 class="text-sm font-semibold text-gray-500">Reactivations</h3>
                <p class="text-4xl font-extrabold text-yellow-500 mt-2">{{ number_format($reactivations) }}</p>
                <p class="text-xs text-gray-400">in selected range</p>
            </div>
            <!-- Subscription Growth Card -->
            <div class="bg-white p-6 rounded-2xl shadow-lg">
                <h3 class="text-sm font-semibold text-gray-500">Total Active Subscriptions</h3>
                <p class="text-4xl font-extrabold text-gray-800 mt-2">{{ number_format($growth) }}</p>
                <p class="text-xs text-gray-400">overall</p>
            </div>
        </div>

        <!-- Subscription Growth Chart -->
        <div class="mt-8 bg-white p-6 rounded-2xl shadow-lg">
            <h3 class="font-bold text-lg">New Subscriptions (Last 30 Days)</h3>
            <div class="mt-4">
                <canvas id="subscriptionGrowthChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    // Pass chart data from PHP to a global JavaScript variable
    window.chartData = {
        labels: @json($chartLabels),
        values: @json($chartValues)
    };
</script>
@endsection