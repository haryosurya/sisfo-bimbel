<?php

namespace App\Http\Requests;

use App\Mentor;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMentorRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('mentor_edit');
    }

    public function rules()
    {
        return [
            'name'          => [
                'required',
            ],
            'email'         => [
                'required',
            ],
            'jenis_kelamin' => [
                'required',
            ],
            'alamat'        => [
                'required',
            ],
            'roles_id'      => [
                'required',
                'integer',
            ],
        ];
    }
}
