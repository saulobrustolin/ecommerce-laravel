<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $slug = $request->route('slug');

        $exists = DB::table('products')
            ->where('id', $slug)
            ->exists();

        if (! $exists) {
            return redirect('/home');
        }

        return $next($request);
    }
}
