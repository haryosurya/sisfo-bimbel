<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Murid extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'murids';

    protected $hidden = [
        'email',
        'password',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'tanggal_lahir',
    ];

    const JENIS_KELAMIN_SELECT = [
        'laki-laki' => 'laki-laki',
        'perempuan' => 'perempuan',
    ];

    protected $fillable = [
        'name',
        'email',
        'alamat',
        'password',
        'roles_id',
        'paket_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'sekolah_asal',
        'tempat_lahir',
        'jenis_kelamin',
        'tanggal_lahir',
    ];

    public function roles()
    {
        return $this->belongsTo(Role::class, 'roles_id');
    }

    public function getTanggalLahirAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalLahirAttribute($value)
    {
        $this->attributes['tanggal_lahir'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'paket_id');
    }


}
