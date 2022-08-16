<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'tables',
        'guest_capacity',
        'created_at',
        'updated_at'
    ];

    public function reservations(): hasMany
    {
        return $this->hasMany(Reservation::class);
    }

    public function getAverageTableSizeAttribute(): int
    {
        return intval($this->guest_capacity / $this->tables);
    }
}
