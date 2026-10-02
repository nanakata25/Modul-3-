<?php

namespace App\Http\Requests;

use App\Models\Activity;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateActivityRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'max:30', Rule::unique('activities', 'code')->ignore($this->route('activity'))],
            'title' => ['required', 'string', 'min:5', 'max:100'],
            'description' => ['nullable', 'string', 'max:2000'],
            'activity_date' => ['required', 'date'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'status' => ['required', 'in:'.implode(',', Activity::STATUSES)],
        ];
    }
}
