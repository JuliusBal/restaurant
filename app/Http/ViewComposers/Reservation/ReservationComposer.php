<?php

declare(strict_types=1);

namespace App\Http\ViewComposers\Reservation;

use App\Models\Restaurant;
use Illuminate\View\View;

class ReservationComposer
{
    public function compose(View $view)
    {
        $view->with(['restaurants' => Restaurant::select('id','name')->get()]);
    }
}

