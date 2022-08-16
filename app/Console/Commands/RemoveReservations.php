<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Console\Command;

class RemoveReservations extends Command
{
    protected $signature = 'remove:reservations';

    protected $description = 'Set reserved table to false after expired reservation hours';

    public function handle()
    {
        $reservations = Reservation::where('reserved', true)->whereDate('reservation_date', Carbon::today())->get();

        foreach($reservations as $reservation)
        {
            if(Carbon::parse($reservation->reservation_date)->addHours($reservation->reserved_for)->lte(Carbon::now()))
            {
                $reservation->reserved = false;
                $reservation->save();
            }
        }
    }
}
