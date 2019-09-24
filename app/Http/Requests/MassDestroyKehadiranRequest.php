<?php

namespace App\Http\Requests;

use App\Kehadiran;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyKehadiranRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('kehadiran_delete'), 403, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:kehadirans,id',
        ];
    }
}
