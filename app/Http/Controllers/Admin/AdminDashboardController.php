<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use App\Models\Visitor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        $totalVisitors = Visitor::count();
        $todayVisitors = Visitor::whereDate('visit_date', today())->count();
        $totalContacts = ContactSubmission::count();

        $period = in_array($request->query('period'), ['today', 'week', 'all'], true)
            ? $request->query('period')
            : 'all';
        $periodLabel = ['today' => 'Today', 'week' => 'Last 7 Days', 'all' => 'All Time'][$period];

        $visitorQuery = Visitor::query();
        $contactQuery = ContactSubmission::query();

        if ($period === 'today') {
            $visitorQuery->whereDate('visit_date', today());
            $contactQuery->whereDate('created_at', today());
        } elseif ($period === 'week') {
            $visitorQuery->whereDate('visit_date', '>=', today()->subDays(6));
            $contactQuery->where('created_at', '>=', now()->subDays(7));
        }

        $filteredVisitorTotal = (clone $visitorQuery)->count();
        $filteredContactTotal = (clone $contactQuery)->count();
        $visitorCountries = $this->topCountries($visitorQuery, $filteredVisitorTotal);
        $contactCountries = $this->topCountries($contactQuery, $filteredContactTotal);

        return view('admin.dashboard', compact(
            'totalVisitors',
            'todayVisitors',
            'totalContacts',
            'period',
            'periodLabel',
            'filteredVisitorTotal',
            'filteredContactTotal',
            'visitorCountries',
            'contactCountries'
        ));
    }

    private function topCountries(Builder $query, int $total)
    {
        $countries = (clone $query)->selectRaw(
            "COALESCE(NULLIF(country, ''), 'Unknown') as normalized_country"
        );

        return DB::query()
            ->fromSub($countries, 'country_records')
            ->selectRaw('normalized_country as country, COUNT(*) as total')
            ->groupBy('normalized_country')
            ->orderByDesc('total')
            ->limit(10)
            ->get()
            ->map(function ($row) use ($total) {
                $row->percentage = $total > 0 ? round(($row->total / $total) * 100, 1) : 0;
                return $row;
            });
    }
}
