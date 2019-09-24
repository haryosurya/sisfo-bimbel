<?php

namespace App\Http\Requests;

use App\Mentor;
use Illuminate\Foundation\Http\FormRequest;

class StoreMentorRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('mentor_create');
    }

    public function rules()
    {
        return [
            'name'          => [
                'required',
            ],
            'password'      => [
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
