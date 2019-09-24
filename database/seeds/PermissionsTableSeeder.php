<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [[
            'id'         => '1',
            'title'      => 'user_management_access',
            'created_at' => '2019-07-08 10:20:45',
            'updated_at' => '2019-07-08 10:20:45',
        ],
            [
                'id'         => '2',
                'title'      => 'permission_create',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '3',
                'title'      => 'permission_edit',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '4',
                'title'      => 'permission_show',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '5',
                'title'      => 'permission_delete',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '6',
                'title'      => 'permission_access',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '7',
                'title'      => 'role_create',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '8',
                'title'      => 'role_edit',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '9',
                'title'      => 'role_show',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '10',
                'title'      => 'role_delete',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '11',
                'title'      => 'role_access',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '12',
                'title'      => 'user_create',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '13',
                'title'      => 'user_edit',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '14',
                'title'      => 'user_show',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '15',
                'title'      => 'user_delete',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '16',
                'title'      => 'user_access',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '17',
                'title'      => 'mentor_create',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '18',
                'title'      => 'mentor_edit',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '19',
                'title'      => 'mentor_show',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '20',
                'title'      => 'mentor_delete',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '21',
                'title'      => 'mentor_access',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '22',
                'title'      => 'paket_create',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '23',
                'title'      => 'paket_edit',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '24',
                'title'      => 'paket_show',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '25',
                'title'      => 'paket_delete',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '26',
                'title'      => 'paket_access',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '27',
                'title'      => 'murid_create',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '28',
                'title'      => 'murid_edit',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '29',
                'title'      => 'murid_show',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '30',
                'title'      => 'murid_delete',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '31',
                'title'      => 'murid_access',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '32',
                'title'      => 'jadwal_create',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '33',
                'title'      => 'jadwal_edit',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '34',
                'title'      => 'jadwal_show',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '35',
                'title'      => 'jadwal_delete',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '36',
                'title'      => 'jadwal_access',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '37',
                'title'      => 'kehadiran_create',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '38',
                'title'      => 'kehadiran_edit',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '39',
                'title'      => 'kehadiran_show',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '40',
                'title'      => 'kehadiran_delete',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ],
            [
                'id'         => '41',
                'title'      => 'kehadiran_access',
                'created_at' => '2019-07-08 10:20:45',
                'updated_at' => '2019-07-08 10:20:45',
            ]];

        Permission::insert($permissions);
    }
}
