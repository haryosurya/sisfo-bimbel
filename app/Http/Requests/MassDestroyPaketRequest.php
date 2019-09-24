<?php

namespace App\Http\Requests;

use App\Paket;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyPaketRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('paket_delete'), 403, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:pakets,id',
        ];
    }
}
