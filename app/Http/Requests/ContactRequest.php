<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
             'email' => 'required|email|max:255',
             'phone' => 'required|max:18',
             'mobile_phone' => 'max:18',
             'site' => 'max:255',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'email.required' => 'Email обязателен!',
            'phone.required' => 'Email обязателен!',
            'email.email' => 'Email не корректен!',
            'email.max' => 'Email не должен превышать 255 символов!',
            'phone.max' => 'Телефон не должен превышать 18 символов!',
            'mobile_phone.max' => 'Мобильный телефон не должен превышать 18 символов!',
            'site.max' => 'Поле сайт не должено превышать 255 символов!'
        ];
    }
}
