<?php

declare(strict_types=1);

namespace App\Http\Requests\Restaurant;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantRequest extends FormRequest
{
    public function rules(): array
    {
        $rules = [
            'name'   => 'required|string|min:2|max:200|unique:restaurants,name',
            'tables' => 'required|numeric|not_in:0',
            'guest_capacity' => 'required|numeric|not_in:0',
        ];

        return $rules;
    }
}
