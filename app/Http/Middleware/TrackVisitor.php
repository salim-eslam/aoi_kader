<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;
class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // $visitor = new Visitor();
        // Visitor::hit();
        // $visitor->ip_address = $request->ip();
        // $visitor->user_agent = $request->header('User-Agent');

        // $visitor->save();
        $visitor = Visitor::firstOrCreate(['user_agent'=> $request->header('User-Agent'),'ip_address'=>$request->ip()]);

        return $next($request);

    }
}
