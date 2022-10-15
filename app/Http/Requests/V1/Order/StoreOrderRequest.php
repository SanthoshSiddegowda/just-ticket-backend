<?php

namespace App\Http\Requests\V1\Order;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'orders.*.quantity' => ['required', 'numeric'],
            'orders.*.uuid' => ['required', 'uuid', 'exists:App\Models\CompanyProduct,uuid'],
            'user.mobile_no' => ['required', 'numeric', 'digits:10'],
        ];
    }

    public function attributes(): array
    {
        return [
            'user.mobile_no' => 'Mobile Number',
        ];
    }

    public function messages(): array
    {
        return [
            'orders.*.uuid.required' => 'Some of Unique Keys for order is invalid',
            'orders.*.uuid.uuid' => 'Some of Unique Keys for order is invalid',
            'orders.*.uuid.exists' => 'Some of Unique Keys for Products is invalid',
            'orders.*.quantity.required' => 'some of quantity is missing',
            'user.mobile_no' => ':attribute is required',
        ];
    }
}
