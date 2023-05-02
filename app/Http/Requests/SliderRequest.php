<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255|min:5',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Başlık alanı boş bırakılamaz.',
            'title.string' => 'Başlık alanı string olmalıdır.',
            'title.max' => 'Başlık alanı en fazla 255 karakter olabilir.',
            'title.min' => 'Başlık alanı en az 5 karakter olabilir.'
            ];
    }

    public function errors()
    {
        return $this->validator->errors()->add(
            'field', 'Something is wrong with this field!'
        );
    }
}
