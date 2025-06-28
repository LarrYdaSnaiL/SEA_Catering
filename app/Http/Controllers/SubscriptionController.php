<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;
use App\Models\User;

class SubscriptionController extends Controller
{
    /**
     * Display the user's dashboard with their subscriptions.
     */
    public function index()
    {
        $user = Auth::user();

        $subscriptions = $user->subscriptions()->latest()->get();

        if ($user->is_admin) {
            return redirect()->route('admin.dashboard');
        }

        return view('dashboard.user', ['subscriptions' => $subscriptions]);
    }

    /**
     * Show the form for creating a new subscription.
     */
    public function create()
    {
        return view('subscription');
    }

    /**
     * Store a newly created subscription in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $validationRules = [
            'plan' => 'required|numeric',
            'meal_type' => 'required|array|min:1',
            'delivery_days' => 'required|array|min:1',
            'allergies' => 'nullable|string',
        ];

        // Only require phone_number if the user doesn't have one
        if (!$user->phone_number) {
            $validationRules['phone_number'] = 'required|string|max:20';
        }

        $validatedData = $request->validate($validationRules);

        // If phone number was submitted, update the user record
        if (isset($validatedData['phone_number'])) {
            $user->phone_number = $validatedData['phone_number'];
            $user->save();
        }

        $planName = match ($validatedData['plan']) {
            '30000' => 'Diet Plan',
            '40000' => 'Protein Plan',
            '60000' => 'Royal Plan',
            default => 'Unknown Plan',
        };

        Subscription::create([
            'user_id' => $user->id,
            'plan_name' => $planName,
            'plan_price' => $validatedData['plan'],
            'meal_types' => $validatedData['meal_type'],
            'delivery_days' => $validatedData['delivery_days'],
            'allergies' => $validatedData['allergies'],
            'status' => 'active',
        ]);

        return redirect()->route('dashboard.user')->with('success', 'Subscription created successfully!');
    }

    /**
     * Pause the specified subscription.
     */
    public function pause(Request $request, Subscription $subscription)
    {
        if ($subscription->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        $subscription->update(['status' => 'paused']);
        return back()->with('success', 'Subscription paused successfully.');
    }

    /**
     * Resume the specified subscription.
     */
    public function resume(Request $request, Subscription $subscription)
    {
        if ($subscription->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        $subscription->update(['status' => 'active']);
        return back()->with('success', 'Subscription resumed successfully.');
    }

    /**
     * Cancel the specified subscription.
     */
    public function destroy(Subscription $subscription)
    {
        if ($subscription->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        $subscription->update([
            'status' => 'cancelled',
            'cancelled_at' => now()
        ]);
        return back()->with('success', 'Subscription cancelled successfully.');
    }
}
