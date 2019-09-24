<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJadwalRequest;
use App\Http\Requests\UpdateJadwalRequest;
use App\Jadwal;

class JadwalApiController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::all();

        return $jadwals;
    }

    public function store(StoreJadwalRequest $request)
    {
        return Jadwal::create($request->all());
    }

    public function update(UpdateJadwalRequest $request, Jadwal $jadwal)
    {
        return $jadwal->update($request->all());
    }

    public function show(Jadwal $jadwal)
    {
        return $jadwal;
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();

        return response("OK", 200);
    }
}
