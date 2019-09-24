<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kehadiran extends Model
{
    use SoftDeletes;

    public $table = 'kehadirans';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'jadwal_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'jadwal_id');
    }

    public function pesertas()
    {
        return $this->belongsToMany(Murid::class);
    }
}
