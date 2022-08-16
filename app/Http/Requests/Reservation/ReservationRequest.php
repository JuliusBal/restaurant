<?php

declare(strict_types=1);

namespace App\Http\Requests\Reservation;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    public function rules(): array
    {
        $rules = [
            'restaurant_id' => 'required',
            'guest_first_name' => 'required|string|min:2',
            'guest_last_name' => 'required|string|min:2',
            'guest_email' => 'required|email',
            'guest_phone_number' => 'required|string',
            'guests' => 'nullable',
            'reservation_date' => 'required|date',
            'reserved_for' => 'required|numeric',
        ];

        return $rules;
    }
}
