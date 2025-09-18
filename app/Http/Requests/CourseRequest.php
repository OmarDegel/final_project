<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
        $courseId = $this->route("course");
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string|min:10',
            'max_students' => 'required|integer|min:1',
            'image' => $courseId
                ? 'nullable|image|mimes:jpeg,jpg,png,gif,svg'
                : 'required|image|mimes:jpeg,jpg,png,gif,svg',
            'video' => $courseId
                ? 'nullable|file|mimes:mp4,mov,avi,wmv'
                : 'required|file|mimes:mp4,mov,avi,wmv',
            'category_id' => 'required|exists:categories,id',
            "status" => "required|boolean"
        ];
    }
}
