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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'phone' => ['string', 'max:255'],
            'Company_Name' => ['string', 'max:255'],
            'Company_Address' => ['string', 'max:255'],
            'Company_Address_2' => ['string', 'max:255'],
            'City' => ['string', 'max:255'],
            'Postal_code' => ['string', 'max:255'],
            'Country' => ['string', 'max:255'],
            'Company_email' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }
}
