<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'min:1', 'max:32'],
            'description' => ['required', 'string', 'min:1', 'max:64'],
            'price' => ['required', 'numeric'],
            'duration' => ['required'],
            'schedule' => ['required']
        ];
    }
}
