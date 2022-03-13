<?php

namespace App\Http\Requests;

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
            'title' => ['required', 'string', 'min:1', 'max:32', 'regex:/[<>"&%=]/u'],
            'description' => ['required', 'string', 'min:1', 'max:64', 'regex:/[<>"&%=]/u'],
            'price' => ['required', 'string', 'max:30'],
            'duration' => ['required'],
            'schedule' => ['required']
        ];
    }
}
