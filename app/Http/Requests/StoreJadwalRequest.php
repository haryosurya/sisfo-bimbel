<?php

namespace App\Http\Requests;

use App\Jadwal;
use Illuminate\Foundation\Http\FormRequest;

class StoreJadwalRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('jadwal_create');
    }

    public function rules()
    {
        return [
            'hari'           => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'jam_mulai'      => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'jam_selesai'    => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'mapel'          => [
                'required',
            ],
            'level_paket_id' => [
                'required',
                'integer',
            ],
            'mentor_id'      => [
                'required',
                'integer',
            ],
            'ruangan'        => [
                'required',
            ],
        ];
    }
}
