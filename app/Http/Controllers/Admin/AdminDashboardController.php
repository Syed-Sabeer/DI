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
    private const LOCATION_LEVELS = ['state', 'city', 'area'];

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

    public function locationBreakdown(Request $request)
    {
        $validated = $request->validate([
            'level' => 'required|in:state,city,area',
            'period' => 'nullable|in:today,week,all',
            'country' => 'required|string|max:150',
            'state' => 'nullable|string|max:150',
            'city' => 'nullable|string|max:150',
        ]);

        $level = $validated['level'];
        if ($level === 'city' && empty($validated['state'])) {
            return response()->json(['message' => 'A state is required for city details.'], 422);
        }
        if ($level === 'area' && (empty($validated['state']) || empty($validated['city']))) {
            return response()->json(['message' => 'A state and city are required for area details.'], 422);
        }

        $query = Visitor::query();
        $this->applyPeriod($query, $validated['period'] ?? 'all');
        $this->whereNormalized($query, 'country', $validated['country']);
        if ($level !== 'state') $this->whereNormalized($query, 'state', $validated['state']);
        if ($level === 'area') $this->whereNormalized($query, 'city', $validated['city']);

        $parentTotal = (clone $query)->count();
        $column = self::LOCATION_LEVELS[array_search($level, self::LOCATION_LEVELS, true)];
        $rows = (clone $query)
            ->selectRaw("COALESCE(NULLIF({$column}, ''), 'Unknown') as name, COUNT(*) as total")
            ->groupBy('name')
            ->orderByDesc('total')
            ->limit(50)
            ->get()
            ->map(fn ($row) => [
                'name' => $row->name,
                'total' => (int) $row->total,
                'percentage' => $parentTotal > 0 ? round(($row->total / $parentTotal) * 100, 1) : 0,
            ]);

        return response()->json([
            'level' => $level,
            'parent_total' => $parentTotal,
            'rows' => $rows,
        ]);
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

    private function applyPeriod(Builder $query, string $period): void
    {
        if ($period === 'today') {
            $query->whereDate('visit_date', today());
        } elseif ($period === 'week') {
            $query->whereDate('visit_date', '>=', today()->subDays(6));
        }
    }

    private function whereNormalized(Builder $query, string $column, string $value): void
    {
        $query->whereRaw("COALESCE(NULLIF({$column}, ''), 'Unknown') = ?", [$value]);
    }
}
