<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'profile_photo_path' => ['mimes:jpg,png,jpeg'],
            'name' => ['string', 'max:255'],
            'phone' => ['string', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'max:50'],
            'location_id' => ['string', 'max:30']
        ];
    }
}
