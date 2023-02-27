<?php

namespace App\Http\Requests\Doctor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;

class StoreDoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('doctor_create'), Response::denyWithStatus(403));
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
            'specialist_id' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255'],
            'fee' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'string', 'max:10000'],
        ];
    }
}
