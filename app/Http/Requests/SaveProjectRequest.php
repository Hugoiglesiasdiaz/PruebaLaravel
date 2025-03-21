<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use App\Models\Project;
class SaveProjectRequest extends FormRequest
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
            'title' => 'required',
            'url' => ['required', Rule::unique('projects')->ignore($this->route('project'))],
            'category_id' => ['required' , 'exists:categories,id'],
            'img' => [$this->route('project') ? 'nullable' : 'required', 'image'],
            'description' => 'required'
        ];
    }
}
