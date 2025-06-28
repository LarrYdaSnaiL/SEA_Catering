<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserManagementController extends Controller
{
    /**
     * Display the subscriptions for a specific user.
     */
    public function showSubscriptions(User $user)
    {
        return view('dashboard.user_subscriptions', [
            'user' => $user->load('subscriptions')
        ]);
    }

    /**
     * Promote a user to admin.
     */
    public function promote(User $user)
    {
        $user->update(['is_admin' => true]);
        return back()->with('success', 'User has been promoted to admin.');
    }

    /**
     * Demote a user from admin.
     */
    public function demote(User $user)
    {
        if (Auth::id() === $user->id) {
            return back()->with('error', 'You cannot demote yourself.');
        }
        $user->update(['is_admin' => false]);
        return back()->with('success', 'User has been demoted.');
    }

    /**
     * Delete a user.
     */
    public function destroy(User $user)
    {
        if (Auth::id() === $user->id) {
            return back()->with('error', 'You cannot delete yourself.');
        }

        $user->subscriptions()->delete();
        $user->delete();

        return back()->with('success', 'User has been deleted successfully.');
    }
}
