<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paket extends Model
{
    use SoftDeletes;

    public $table = 'pakets';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nama_paket',
        'created_at',
        'updated_at',
        'deleted_at',
        'level_paket',
    ];

    const LEVEL_PAKET_SELECT = [
        'SD kelas 4'   => 'SD kelas 4',
        'SD kelas 5'   => 'SD kelas 5',
        'SD kelas 6'   => 'SD kelas 6',
        'SMP kelas 7'  => 'SMP kelas 7',
        'SMP kelas 8'  => 'SMP kelas 8',
        'SMP kelas 9'  => 'SMP kelas 9',
        'SMA kelas 10' => 'SMA kelas 10',
        'SMA kelas 11' => 'SMA kelas 11',
        'SMA kelas 12' => 'SMA kelas 12',
    ];
}
