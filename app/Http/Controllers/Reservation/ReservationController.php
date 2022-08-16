<?php

declare(strict_types=1);

namespace App\Http\Controllers\Reservation;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reservation\ReservationRequest;
use App\Services\ReservationService;
use Illuminate\Support\Facades\App;
use Illuminate\View\View;

class ReservationController extends Controller
{

    public function create(): View
    {
        return view('reservation.create');
    }

    public function store(ReservationRequest $request)
    {
        $service = App::make(ReservationService::class);

        return $service->handleStore($request, trans('globals.messages.success'));
    }
}
