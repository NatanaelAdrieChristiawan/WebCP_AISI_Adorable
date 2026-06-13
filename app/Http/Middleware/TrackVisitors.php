<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Visitor;

class TrackVisitors
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ignore admin backend requests, Livewire updates, AJAX, and non-GET requests
        if ($request->is('admin*') || 
            $request->is('livewire*') || 
            $request->ajax() || 
            $request->prefetch() || 
            $request->hasHeader('X-Livewire') || 
            !$request->isMethod('GET')) {
            return $next($request);
        }

        try {
            Visitor::create([
                'ip_address' => $request->ip() ?? '127.0.0.1',
                'user_agent' => $request->userAgent(),
                'url'        => $request->fullUrl(),
            ]);
        } catch (\Exception $e) {
            report($e);
        }

        return $next($request);
    }
}
