<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'restaurant_id',
        'guest_first_name',
        'guest_last_name',
        'guest_email',
        'guest_phone_number',
        'guests',
        'total_guests',
        'reserved_tables',
        'reservation_date',
        'reserved_for',
        'reserved',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'reserved' => 'boolean',
        'guests' => 'array'
    ];

    protected $dates = [
        'reservation_date'
    ];

    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function getCurrentRestaurantReservationAttribute()
    {
        return $this->restaurant->averageTableSize;
    }

    public function scopeFreeSpaceCheck($query, $restaurantId, $date, $reservedFor, $requiredTables)
    {
        $startDate = Carbon::parse($date)->format('Y-m-d h-m');
        $endDate = Carbon::parse($date)->addHours($reservedFor)->format('Y-m-d h-m');

        $reservations = $query->whereBetween('reservation_date', [$startDate, $endDate])
            ->where('reserved', true)
            ->where('restaurant_id', $restaurantId)
            ->get();

        $alreadyReservedGuests = $reservations->pluck('total_guests')->sum();
        $alreadyReservedTables = $reservations->pluck('reserved_tables')->sum();

        return $this->restaurant->guest_capacity - $alreadyReservedGuests > 0 && $this->restaurant->tables >= $alreadyReservedTables + $requiredTables;
    }
}
