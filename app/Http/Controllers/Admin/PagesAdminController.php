<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Payment;
use App\Models\OrderItem;
use Inertia\Inertia;
class PagesAdminController extends Controller
{
    public function dashboard(){
        $users = \App\Models\User::all();
        $totalSales = \App\Models\Payment::sum('amount');
        $latestTransactions = \App\Models\Payment::latest()->take(5)->get();
        $latestUsers = \App\Models\User::latest()->take(5)->get();
        $totalProductsSold = \App\Models\OrderItem::sum('quantity');

        $salesData = \App\Models\Payment::query()
            ->selectRaw('DATE(created_at) as date, SUM(amount) as total')
            ->where('created_at', '>=', now()->subDays(29))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->pluck('total', 'date');

        $period = \Carbon\CarbonPeriod::create(now()->subDays(29), now());
        $dates = collect($period)->map(fn ($date) => $date->format('Y-m-d'));

        $chartData = $dates->mapWithKeys(fn ($date) => [
            $date => $salesData->get($date, 0)
        ]);

        return Inertia::render('Admin/HomeView', [
            'users' => $users,
            'totalSales' => $totalSales,
            'latestTransactions' => $latestTransactions,
            'latestUsers' => $latestUsers,
            'totalProductsSold' => $totalProductsSold,
            'salesChartData' => [
                'labels' => $chartData->keys(),
                'datasets' => [
                    [
                        'label' => 'Sales',
                        'data' => $chartData->values(),
                        'borderColor' => '#36A2EB',
                        'backgroundColor' => '#9BD0F5',
                        'fill' => false,
                    ]
                ]
            ]
        ]);
    }
}