<?php

namespace App\Http\Requests;

use App\Murid;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyMuridRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('murid_delete'), 403, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:murids,id',
        ];
    }
}
