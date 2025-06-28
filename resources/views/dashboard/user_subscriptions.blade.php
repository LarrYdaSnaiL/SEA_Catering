@extends('layouts.app')

@section('title', "Manage Subscriptions for " . $user->name)

@section('content')
<div class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('admin.dashboard') }}" class="text-sm text-emerald-600 hover:underline mb-4 inline-block">&larr; Back to Admin Dashboard</a>
        <h1 class="text-3xl font-bold text-gray-900">Managing Subscriptions for <span class="text-emerald-600">{{ $user->name }}</span></h1>

        @if(session('success'))
            <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="mt-8">
            <h2 class="text-xl font-semibold text-gray-800">User's Subscriptions</h2>
            @if($user->subscriptions->isEmpty())
            <div class="mt-4 bg-white p-8 rounded-lg shadow-md text-center">
                <p class="text-gray-600">This user does not have any subscriptions.</p>
            </div>
            @else
            <div class="mt-4 space-y-6">
                @foreach($user->subscriptions as $sub)
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <div class="sm:flex justify-between items-start">
                        <div>
                            <h3 class="text-2xl font-bold text-emerald-600">{{ $sub->plan_name }}</h3>
                            <p class="mt-1 text-sm text-gray-500">Status:
                                @if($sub->status == 'active')
                                <span class="font-semibold capitalize text-green-600">{{ $sub->status }}</span>
                                @elseif($sub->status == 'paused')
                                <span class="font-semibold capitalize text-yellow-600">{{ $sub->status }}</span>
                                @else
                                <span class="font-semibold capitalize text-red-600">{{ $sub->status }}</span>
                                @endif
                            </p>
                        </div>
                        <div class="mt-4 sm:mt-0 text-2xl font-bold text-gray-800">
                            {{ 'Rp' . number_format($sub->plan_price * count($sub->meal_types) * count($sub->delivery_days) * 4.3, 2, ',', '.') }}/bulan
                        </div>
                    </div>
                    <div class="mt-6 border-t border-gray-200 pt-6 grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div>
                            <h4 class="text-sm font-semibold text-gray-500">Meal Types</h4>
                            <p class="text-gray-800">{{ implode(', ', $sub->meal_types) }}</p>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-gray-500">Delivery Days</h4>
                            <p class="text-gray-800">{{ implode(', ', $sub->delivery_days) }}</p>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center space-x-4">
                        @if($sub->status === 'active')
                        <!-- Pause Form -->
                        <form action="{{ route('subscription.pause', $sub) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="bg-yellow-400 text-yellow-800 font-bold py-2 px-4 rounded-lg hover:bg-yellow-500">Pause Subscription</button>
                        </form>
                        @elseif($sub->status === 'paused')
                        <!-- Resume Form -->
                        <form action="{{ route('subscription.resume', $sub) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600">Resume Subscription</button>
                        </form>
                        @endif

                        @if($sub->status !== 'cancelled')
                        <!-- Cancel Form -->
                        <form action="{{ route('subscription.destroy', $sub) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this user\'s subscription?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-red-600">Cancel Subscription</button>
                        </form>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>
@endsection