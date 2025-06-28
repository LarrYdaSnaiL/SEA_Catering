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
            <div class="mt-4" style="height: 400px;">
                <canvas id="subscriptionGrowthChart"></canvas>
            </div>
        </div>

        <!-- User Management Table -->
        <div class="mt-8 bg-white p-6 rounded-2xl shadow-lg">
            <h3 class="font-bold text-lg">User Management</h3>
            @if(session('success'))
                <div class="mt-2 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="mt-2 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded">{{ session('error') }}</div>
            @endif
            <div class="mt-4 overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                            <th scope="col" class="relative px-6 py-3"><span class="sr-only">Actions</span></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($users as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                @if($user->is_admin)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-emerald-100 text-emerald-800">Admin</span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">User</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex items-center justify-end space-x-4">
                                <a href="{{ route('admin.users.subscriptions', $user) }}" class="text-blue-600 hover:text-blue-900">Manage Subscriptions</a>
                                @if($user->is_admin)
                                    <form action="{{ route('admin.users.demote', $user) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-yellow-600 hover:text-yellow-900">Demote</button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.users.promote', $user) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-emerald-600 hover:text-emerald-900">Promote</button>
                                    </form>
                                @endif
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user? This action is irreversible.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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