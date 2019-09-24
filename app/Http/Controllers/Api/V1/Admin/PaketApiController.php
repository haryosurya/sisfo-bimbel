<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaketRequest;
use App\Http\Requests\UpdatePaketRequest;
use App\Paket;

class PaketApiController extends Controller
{
    public function index()
    {
        $pakets = Paket::all();

        return $pakets;
    }

    public function store(StorePaketRequest $request)
    {
        return Paket::create($request->all());
    }

    public function update(UpdatePaketRequest $request, Paket $paket)
    {
        return $paket->update($request->all());
    }

    public function show(Paket $paket)
    {
        return $paket;
    }

    public function destroy(Paket $paket)
    {
        $paket->delete();

        return response("OK", 200);
    }
}
