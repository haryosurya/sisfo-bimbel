<?php

namespace App\Http\Requests;

use App\Paket;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePaketRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('paket_edit');
    }

    public function rules()
    {
        return [
        ];
    }
}
