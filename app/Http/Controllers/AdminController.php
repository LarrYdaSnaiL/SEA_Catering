<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // Set default date range to the last 30 days
        $startDate = $request->input('start_date', Carbon::now()->subDays(29)->startOfDay());
        $endDate = $request->input('end_date', Carbon::now()->endOfDay());

        if (is_string($startDate)) {
            $startDate = Carbon::parse($startDate)->startOfDay();
        }
        if (is_string($endDate)) {
            $endDate = Carbon::parse($endDate)->endOfDay();
        }

        // 1. New Subscriptions in range
        $newSubscriptions = Subscription::whereBetween('created_at', [$startDate, $endDate])->count();

        // 2. Monthly Recurring Revenue (MRR)
        $activeSubscriptions = Subscription::where('status', 'active')->get();
        $mrr = 0;
        foreach ($activeSubscriptions as $sub) {
            $mrr += ($sub->plan_price * count($sub->meal_types) * count($sub->delivery_days) * 4.3);
        }

        // 3. Reactivations in range
        $reactivations = Subscription::whereBetween('created_at', [$startDate, $endDate])
            ->whereHas('user', function ($query) {
                $query->whereHas('subscriptions', function ($q) {
                    $q->where('status', 'cancelled');
                });
            })
            ->distinct('user_id')
            ->count();

        // 4. Subscription Growth (Total Active)
        $subscriptionGrowth = Subscription::where('status', 'active')->count();

        // 5. Chart Data: New subscriptions per day for the last 30 days
        $chartData = Subscription::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->where('created_at', '>=', Carbon::now()->subDays(29)->startOfDay())
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        $chartLabels = $chartData->pluck('date')->map(function ($date) {
            return Carbon::parse($date)->format('M d');
        });
        $chartValues = $chartData->pluck('count');

        return view('dashboard.admin', [
            'new_subscriptions' => $newSubscriptions,
            'mrr' => $mrr,
            'reactivations' => $reactivations,
            'growth' => $subscriptionGrowth,
            'start_date' => $startDate->toDateString(),
            'end_date' => $endDate->toDateString(),
            'chartLabels' => $chartLabels,
            'chartValues' => $chartValues,
        ]);
    }
}
