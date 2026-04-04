<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfile extends FormRequest
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
            'bio' => 'required',
            'profile_image' => 'nullable|image|mimes:png,jpg,gif',
            'cv_url' => 'nullable|string',
            'social_links' => 'string|nullable',
            'phone' => 'string',
        ];
    }
}
