<?php

namespace App\Http\Requests;

use App\Kehadiran;
use Illuminate\Foundation\Http\FormRequest;

class UpdateKehadiranRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('kehadiran_edit');
    }

    public function rules()
    {
        return [
            'jadwal_id'  => [
                'required',
                'integer',
            ],
            'pesertas.*' => [
                'integer',
            ],
            'pesertas'   => [
                'array',
            ],
        ];
    }
}
