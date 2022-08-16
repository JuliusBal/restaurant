<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Reservation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReservationService
{
    public function handleStore(Request $request, string $message = null, $item = null): RedirectResponse
    {
        if (null === $item) {
            $item = new Reservation();
        }

        $item->fill($request->all());

        $totalGuests = $request->get('guests') ? count($request->get('guests')) + 1 : 1;
        $requiredTables = intval(ceil($totalGuests / $item->restaurant->averageTableSize));

        $checkForFreeSpace = $item->freeSpaceCheck(
            $request->get('restaurant_id'),
            $request->get('reservation_date'),
            $request->get('reserved_for'),
            $requiredTables,
        );

        if($checkForFreeSpace) {

            $item->total_guests = $totalGuests;
            $item->reserved_tables = $requiredTables;
            $item->reserved = true;
            $item->save();

            return redirect()->back()->with('success', $requiredTables <= 1 ?
                trans('globals.messages.one_table_reserved')
                : str_replace('%total%', (string)$requiredTables, trans('globals.messages.total_tables_reserved')));

        } else {

            return redirect()->back()->withInput()->withErrors(['msg' => trans('globals.messages.full_restaurant')]);
        }
    }
}
