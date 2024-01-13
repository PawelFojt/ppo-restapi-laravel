<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePeopleRequest extends FormRequest
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
        $method = $this->method();

        if($method == 'PUT') {
            return [
                'firstName' => ['required'],
                'lastName' => ['required'],
                'phoneNumber' => ['required'],
                'email' => ['required', 'email'],
                'address' => ['required'],
                'city' => ['required'],
                'postalCode' => ['required'],
            ];
        } else {
            return [
                'firstName' => ['sometimes', 'required'],
                'lastName' => ['sometimes', 'required'],
                'phoneNumber' => ['sometimes', 'required'],
                'email' => ['sometimes', 'required', 'email'],
                'address' => ['sometimes', 'required'],
                'city' => ['sometimes', 'required'],
                'postalCode' => ['sometimes', 'required']
            ];
        }
        
    }

    protected function prepareForValidation() {
        $attributeMap = [
            'firstName' => 'first_name',
            'lastName' => 'last_name',
            'phoneNumber' => 'phone_number',
            'postalCode' => 'postal_code',
        ];
    
        foreach ($attributeMap as $requestKey => $dbKey) {
            if ($this->$requestKey) {
                $this->merge([$dbKey => $this->$requestKey]);
            }
        }
    }
    
}
