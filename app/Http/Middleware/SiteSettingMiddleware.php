<?php

namespace App\Http\Middleware;

use App\Models\SiteSetting;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Category;

class SiteSettingMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $settings = SiteSetting::pluck('data', 'title')->toArray();
        $categories = Category::where('status', '1')->with('subCategory')->withCount('items')->get();

        view()->share(['settings' => $settings, 'categories' => $categories]);

        return $next($request);
    }
}
