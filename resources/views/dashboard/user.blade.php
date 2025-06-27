@extends('layouts.app')

@section('title', 'My Dashboard - SEA Catering')

@section('content')
<div class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">My Dashboard</h1>

        @if(session('success'))
        <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif

        <div class="mt-8">
            <h2 class="text-xl font-semibold text-gray-800">My Subscriptions</h2>
            @if($subscriptions->isEmpty())
            <div class="mt-4 bg-white p-8 rounded-lg shadow-md text-center">
                <p class="text-gray-600">You don't have any subscriptions yet.</p>
                <a href="{{ route('subscription.create') }}" class="mt-4 inline-block bg-emerald-500 text-white font-bold rounded-full px-6 py-3 hover:bg-emerald-600">Create a Subscription</a>
            </div>
            @else
            <div class="mt-4 space-y-6">
                @foreach($subscriptions as $sub)
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
                        <div>
                            <h4 class="text-sm font-semibold text-gray-500">Phone Number</h4>
                            <p class="text-gray-800">{{ $sub->user->phone_number }}</p>
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
                        <!-- Cancel Form (hidden) and Trigger Button -->
                        <form id="cancel-form-{{ $sub->id }}" action="{{ route('subscription.destroy', $sub) }}" method="POST" class="hidden">
                            @csrf
                            @method('DELETE')
                        </form>
                        <button type="button" data-form-id="cancel-form-{{ $sub->id }}" class="cancel-btn bg-red-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-red-600">Cancel Subscription</button>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Cancellation Confirmation Modal -->
<div id="cancel-confirm-modal" class="hidden fixed inset-0 z-[100] overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div id="cancel-modal-overlay" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            Cancel Subscription
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                Are you sure you want to cancel your subscription? This action cannot be undone.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button id="confirm-cancel-btn" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 sm:ml-3 sm:w-auto sm:text-sm">
                    Confirm Cancel
                </button>
                <button id="close-cancel-modal-btn" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Back
                </button>
            </div>
        </div>
    </div>
</div>
@endsection