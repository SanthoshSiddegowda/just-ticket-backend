<?php

namespace App\Http\Requests\V1\Order;

use Illuminate\Foundation\Http\FormRequest;

class getOrderRequest extends FormRequest
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
            'uuid' => ['required_without:mobile_no', 'uuid', 'exists:App\Models\Order,uuid'],
            'mobile_no' => ['required_without:uuid', 'numeric', 'exists:App\Models\User,mobile_no'],
        ];
    }

    public function attributes(): array
    {
        return [
            'uuid' => 'Order unique key',
            'mobile_no' => 'Mobile Number',
        ];
    }

    public function messages(): array
    {
        return [
            'uuid' => 'Something went wrong! please try later',
            'mobile_no' => 'Something went wrong! please try later',
        ];
    }
}
