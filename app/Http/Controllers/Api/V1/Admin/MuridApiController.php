<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMuridRequest;
use App\Http\Requests\UpdateMuridRequest;
use App\Murid;

class MuridApiController extends Controller
{
    public function index()
    {
        $murids = Murid::all();

        return $murids;
    }

    public function store(StoreMuridRequest $request)
    {
        return Murid::create($request->all());
    }

    public function update(UpdateMuridRequest $request, Murid $murid)
    {
        return $murid->update($request->all());
    }

    public function show(Murid $murid)
    {
        return $murid;
    }

    public function destroy(Murid $murid)
    {
        $murid->delete();

        return response("OK", 200);
    }
}
