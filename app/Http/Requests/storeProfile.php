<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeProfile extends FormRequest
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

            // 'user_id' => 'required|exists:users,id',
            'job_title' => 'required',
            'bio' => 'nullable||string',
            'profile_image' => 'nullable|image|max:1024|mimes:png,jpg,jpeg,gif',
            'cv_url' => 'nullable|string',
            'social_links' => 'string|nullable',
            'phone' => 'string',
            'borrow' => 'string',
            'social_links2' => 'social_links2',
        ];
    }
}
