<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date|after:today',
            'check_out' => 'required|date|after:check_in',
            'guests' => 'required|integer|min:1',
            'guest_details' => 'required|array',
            'guest_details.primary_guest' => 'required|array',
            'guest_details.primary_guest.name' => 'required|string|max:255',
            'guest_details.primary_guest.email' => 'required|email',
            'guest_details.primary_guest.phone' => 'required|string|max:20',
            'guest_details.special_requests' => 'nullable|string|max:1000'
        ];
    }
}
