<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subscription; // Import Subscription model
use Illuminate\Support\Facades\Auth;

class UserManagementController extends Controller
{
    public function showSubscriptions(User $user)
    {
        return view('dashboard.user_subscriptions', [
            'user' => $user->load('subscriptions')
        ]);
    }

    public function promote(User $user)
    {
        $user->update(['is_admin' => true]);
        return back()->with('success', 'User has been promoted to admin.');
    }

    public function demote(User $user)
    {
        if (Auth::id() === $user->id) {
            return back()->with('error', 'You cannot demote yourself.');
        }
        $user->update(['is_admin' => false]);
        return back()->with('success', 'User has been demoted.');
    }

    public function destroy(User $user)
    {
        if (Auth::id() === $user->id) {
            return back()->with('error', 'You cannot delete yourself.');
        }

        $user->subscriptions()->delete();
        $user->delete();

        return back()->with('success', 'User has been deleted successfully.');
    }
    
    // New methods for managing subscriptions
    public function pauseSubscription(Subscription $subscription)
    {
        $subscription->update(['status' => 'paused']);
        return back()->with('success', "Subscription for {$subscription->user->name} has been paused.");
    }
    
    public function resumeSubscription(Subscription $subscription)
    {
        $subscription->update(['status' => 'active']);
        return back()->with('success', "Subscription for {$subscription->user->name} has been resumed.");
    }

    public function cancelSubscription(Subscription $subscription)
    {
        $subscription->update([
            'status' => 'cancelled',
            'cancelled_at' => now()
        ]);
        return back()->with('success', "Subscription for {$subscription->user->name} has been cancelled.");
    }
}
