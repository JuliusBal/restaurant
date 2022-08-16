<?php

declare(strict_types=1);

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\RestaurantRequest;
use App\Models\Restaurant;
use Illuminate\View\View;

class RestaurantController extends Controller
{
    public function create(): View
    {
        return view('restaurant.create');
    }

    public function store(RestaurantRequest $request)
    {
        Restaurant::create($request->all());

        return redirect()->back()->with('success', trans('globals.messages.success'));
    }
}
