<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKehadiranRequest;
use App\Http\Requests\UpdateKehadiranRequest;
use App\Kehadiran;

class KehadiranApiController extends Controller
{
    public function index()
    {
        $kehadirans = Kehadiran::all();

        return $kehadirans;
    }

    public function store(StoreKehadiranRequest $request)
    {
        return Kehadiran::create($request->all());
    }

    public function update(UpdateKehadiranRequest $request, Kehadiran $kehadiran)
    {
        return $kehadiran->update($request->all());
    }

    public function show(Kehadiran $kehadiran)
    {
        return $kehadiran;
    }

    public function destroy(Kehadiran $kehadiran)
    {
        $kehadiran->delete();

        return response("OK", 200);
    }
}
