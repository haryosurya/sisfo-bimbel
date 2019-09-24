<?php

namespace App\Http\Requests;

use App\Paket;
use Illuminate\Foundation\Http\FormRequest;

class StorePaketRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('paket_create');
    }

    public function rules()
    {
        return [
        ];
    }
}
