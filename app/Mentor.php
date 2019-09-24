<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mentor extends Model
{
    use SoftDeletes;

    public $table = 'mentors';

    protected $hidden = [
        'password',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
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
        'created_at',
        'updated_at',
        'deleted_at',
        'jenis_kelamin',
    ];

    public function roles()
    {
        return $this->belongsTo(Role::class, 'roles_id');
    }
}
