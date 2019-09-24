<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jadwal extends Model
{
    use SoftDeletes;

    public $table = 'jadwals';

    protected $dates = [
        'hari',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'hari',
        'mapel',
        'ruangan',
        'jam_mulai',
        'mentor_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'jam_selesai',
        'level_paket_id',
    ];

    const MAPEL_SELECT = [
        'Matematika'              => 'Matematika',
        'Bahasa Indonesia'        => 'Bahasa Indonesia',
        'Bahasa Inggris'          => 'Bahasa Inggris',
        'Ilmu Pengetahuan Alam'   => 'Ilmu Pengetahuan Alam',
        'Ilmu Pengetahuan Sosial' => 'Ilmu Pengetahuan Sosial',
    ];

    const RUANGAN_SELECT = [
        'Ruang A' => 'Ruang A',
        'Ruang B' => 'Ruang B',
        'Ruang C' => 'Ruang C',
        'Ruang D' => 'Ruang D',
        'Ruang E' => 'Ruang E',
        'Ruang F' => 'Ruang F',
        'Ruang G' => 'Ruang G',
        'Ruang H' => 'Ruang H',
        'Ruang I' => 'Ruang I',
        'Ruang J' => 'Ruang J',
    ];

    public function getHariAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setHariAttribute($value)
    {
        $this->attributes['hari'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function level_paket()
    {
        return $this->belongsTo(Paket::class, 'level_paket_id');
    }

    public function mentor()
    {
        return $this->belongsTo(Mentor::class, 'mentor_id');
    }
}
