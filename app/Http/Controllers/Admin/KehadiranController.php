<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKehadiranRequest;
use App\Http\Requests\StoreKehadiranRequest;
use App\Http\Requests\UpdateKehadiranRequest;
use App\Jadwal;
use App\Kehadiran;
use App\Murid;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KehadiranController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('kehadiran_access'), 403);

        $kehadirans = Kehadiran::all();

        return view('admin.kehadirans.index', compact('kehadirans'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('kehadiran_create'), 403);

        $jadwals = Jadwal::all()->pluck('hari', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pesertas = Murid::all()->pluck('name', 'id');

        return view('admin.kehadirans.create', compact('jadwals', 'pesertas'));
    }

    public function store(StoreKehadiranRequest $request)
    {
        abort_unless(\Gate::allows('kehadiran_create'), 403);

        $kehadiran = Kehadiran::create($request->all());
        $kehadiran->pesertas()->sync($request->input('pesertas', []));

        return redirect()->route('admin.kehadirans.index');
    }

    public function edit(Kehadiran $kehadiran)
    {
        abort_unless(\Gate::allows('kehadiran_edit'), 403);

        $jadwals = Jadwal::all()->pluck('hari', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pesertas = Murid::all()->pluck('name', 'id');

        $kehadiran->load('jadwal', 'pesertas');

        return view('admin.kehadirans.edit', compact('jadwals', 'pesertas', 'kehadiran'));
    }

    public function update(UpdateKehadiranRequest $request, Kehadiran $kehadiran)
    {
        abort_unless(\Gate::allows('kehadiran_edit'), 403);

        $kehadiran->update($request->all());
        $kehadiran->pesertas()->sync($request->input('pesertas', []));

        return redirect()->route('admin.kehadirans.index');
    }

    public function show(Kehadiran $kehadiran)
    {
        abort_unless(\Gate::allows('kehadiran_show'), 403);

        $kehadiran->load('jadwal', 'pesertas');

        return view('admin.kehadirans.show', compact('kehadiran'));
    }

    public function destroy(Kehadiran $kehadiran)
    {
        abort_unless(\Gate::allows('kehadiran_delete'), 403);

        $kehadiran->delete();

        return back();
    }

    public function massDestroy(MassDestroyKehadiranRequest $request)
    {
        Kehadiran::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
