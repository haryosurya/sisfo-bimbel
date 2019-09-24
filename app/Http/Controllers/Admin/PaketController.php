<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPaketRequest;
use App\Http\Requests\StorePaketRequest;
use App\Http\Requests\UpdatePaketRequest;
use App\Paket;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PaketController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('paket_access'), 403);

        $pakets = Paket::all();

        return view('admin.pakets.index', compact('pakets'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('paket_create'), 403);

        return view('admin.pakets.create');
    }

    public function store(StorePaketRequest $request)
    {
        abort_unless(\Gate::allows('paket_create'), 403);

        $paket = Paket::create($request->all());

        return redirect()->route('admin.pakets.index');
    }

    public function edit(Paket $paket)
    {
        abort_unless(\Gate::allows('paket_edit'), 403);

        return view('admin.pakets.edit', compact('paket'));
    }

    public function update(UpdatePaketRequest $request, Paket $paket)
    {
        abort_unless(\Gate::allows('paket_edit'), 403);

        $paket->update($request->all());

        return redirect()->route('admin.pakets.index');
    }

    public function show(Paket $paket)
    {
        abort_unless(\Gate::allows('paket_show'), 403);

        return view('admin.pakets.show', compact('paket'));
    }

    public function destroy(Paket $paket)
    {
        abort_unless(\Gate::allows('paket_delete'), 403);

        $paket->delete();

        return back();
    }

    public function massDestroy(MassDestroyPaketRequest $request)
    {
        Paket::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
