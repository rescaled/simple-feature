<?php

namespace Rescaled\SimpleFeature\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Rescaled\SimpleFeature\Facades\SimpleFeature;

class RequireDisabledFeature
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @param string $features The feature(s) that is/are going to get checked
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $features)
    {
        if (false === SimpleFeature::allDisabled(explode(',', $features))) {
            abort(404);
        }

        return $next($request);
    }
}
