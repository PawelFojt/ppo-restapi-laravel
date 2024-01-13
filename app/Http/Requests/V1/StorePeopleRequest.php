<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StorePeopleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'firstName' => ['required'],
            'lastName' => ['required'],
            'phoneNumber' => ['required'],
            'email' => ['required', 'email'],
            'address' => ['required'],
            'city' => ['required'],
            'postalCode' => ['required']
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'phone_number' => $this->phoneNumber,
            'postal_code' => $this->postalCode
        ]);
    }
}
