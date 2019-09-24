<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMuridRequest;
use App\Http\Requests\StoreMuridRequest;
use App\Http\Requests\UpdateMuridRequest;
use App\Murid;
use App\Paket;
use App\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MuridController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_unless(\Gate::allows('murid_access'), 403);

        $murids = Murid::all();

        return view('admin.murids.index', compact('murids'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('murid_create'), 403);

        $roles = Role::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pakets = Paket::all()->pluck('level_paket', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.murids.create', compact('roles', 'pakets'));
    }

    public function store(StoreMuridRequest $request)
    {
        abort_unless(\Gate::allows('murid_create'), 403);

        $murid = Murid::create($request->all());

        return redirect()->route('admin.murids.index');
    }

    public function edit(Murid $murid)
    {
        abort_unless(\Gate::allows('murid_edit'), 403);

        $roles = Role::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pakets = Paket::all()->pluck('level_paket', 'id')->prepend(trans('global.pleaseSelect'), '');

        $murid->load('roles', 'paket');

        return view('admin.murids.edit', compact('roles', 'pakets', 'murid'));
    }

    public function update(UpdateMuridRequest $request, Murid $murid)
    {
        abort_unless(\Gate::allows('murid_edit'), 403);

        $murid->update($request->all());

        

        return redirect()->route('admin.murids.index');
    }

    public function show(Murid $murid)
    {
        abort_unless(\Gate::allows('murid_show'), 403);

        $murid->load('roles', 'paket');

        return view('admin.murids.show', compact('murid'));
    }

    public function destroy(Murid $murid)
    {
        abort_unless(\Gate::allows('murid_delete'), 403);

        $murid->delete();

        return back();
    }

    public function massDestroy(MassDestroyMuridRequest $request)
    {
        Murid::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
