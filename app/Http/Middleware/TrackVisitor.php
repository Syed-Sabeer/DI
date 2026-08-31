<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use App\Support\IpCountryResolver;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    public function handle(Request $request, Closure $next): Response
    {
        $location = IpCountryResolver::resolve($request);

        $visitor = Visitor::firstOrCreate([
            'ip_address' => $location['ip'],
            'visit_date' => today()->toDateString(),
        ], [
            'country' => $location['country'],
            'state' => $location['state'],
            'city' => $location['city'],
            'area' => $location['area'],
        ]);

        if ($visitor->wasRecentlyCreated === false && $this->shouldUpdateLocation($visitor, $location)) {
            $visitor->update([
                'country' => $location['country'],
                'state' => $location['state'],
                'city' => $location['city'],
                'area' => $location['area'],
            ]);
        }

        return $next($request);
    }

    private function shouldUpdateLocation(Visitor $visitor, array $location): bool
    {
        if ($location['country'] === 'Unknown') {
            return false;
        }

        $hasMissingLocation = collect(['country', 'state', 'city', 'area'])
            ->contains(fn (string $field) => ! $visitor->{$field} || $visitor->{$field} === 'Unknown');

        $hasPostalCodeOnly = preg_match('/^\d+$/', (string) $visitor->area) === 1;
        $newAreaHasName = preg_match('/[\pL]/u', (string) $location['area']) === 1;

        return $hasMissingLocation || ($hasPostalCodeOnly && $newAreaHasName);
    }
}
