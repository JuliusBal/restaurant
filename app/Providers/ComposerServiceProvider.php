<?php

declare(strict_types=1);

namespace App\Providers;

use App\Http\ViewComposers\Reservation\ReservationComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('reservation.create', ReservationComposer::class);
    }
}
