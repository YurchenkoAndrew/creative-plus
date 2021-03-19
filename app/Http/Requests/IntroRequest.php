<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class IntroRequest extends FormRequest
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
            'lead_in' => 'required|max:255',
            'heading' => 'required|max:255',
            'btn_text' => 'required|max:255',
            'logo' => 'required'
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
            'lead_in.required' => 'Поле заголовок обязательно!',
            'heading.required' => 'Поле описание обязательно!',
            'btn_text.required' => 'Поле текст кнопки обязательно!',
            'logo.required' => 'Поле логотип обязательно!',
            'lead_in.max' => 'Поле заголовок не может превышать 255 символов!',
            'heading.max' => 'Поле описание не может превышать 255 символов!',
            'btn_text.max' => 'Поле текст кнопки не может превышать 255 символов!',
        ];
    }
}
