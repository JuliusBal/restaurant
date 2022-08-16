<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Models\Restaurant;
use Closure;
use Illuminate\Http\Request;

class HasRestaurant
{
    public function handle(Request $request, Closure $next)
    {
        if (Restaurant::count() > 0) {
            return $next($request);
        }

        return redirect(route('restaurant.create'))->withErrors(['msg' => trans('globals.messages.create_restaurant_first')]);
    }
}
