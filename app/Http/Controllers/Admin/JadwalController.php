<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyJadwalRequest;
use App\Http\Requests\StoreJadwalRequest;
use App\Http\Requests\UpdateJadwalRequest;
use App\Jadwal;
use App\Mentor;
use App\Paket;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JadwalController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('jadwal_access'), 403);

        $jadwals = Jadwal::all();

        return view('admin.jadwals.index', compact('jadwals'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('jadwal_create'), 403);

        $level_pakets = Paket::all()->pluck('level_paket', 'id')->prepend(trans('global.pleaseSelect'), '');

        $mentors = Mentor::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.jadwals.create', compact('level_pakets', 'mentors'));
    }

    public function store(StoreJadwalRequest $request)
    {
        abort_unless(\Gate::allows('jadwal_create'), 403);

        $jadwal = Jadwal::create($request->all());

        return redirect()->route('admin.jadwals.index');
    }

    public function edit(Jadwal $jadwal)
    {
        abort_unless(\Gate::allows('jadwal_edit'), 403);

        $level_pakets = Paket::all()->pluck('level_paket', 'id')->prepend(trans('global.pleaseSelect'), '');

        $mentors = Mentor::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $jadwal->load('level_paket', 'mentor');

        return view('admin.jadwals.edit', compact('level_pakets', 'mentors', 'jadwal'));
    }

    public function update(UpdateJadwalRequest $request, Jadwal $jadwal)
    {
        abort_unless(\Gate::allows('jadwal_edit'), 403);

        $jadwal->update($request->all());

        return redirect()->route('admin.jadwals.index');
    }

    public function show(Jadwal $jadwal)
    {
        abort_unless(\Gate::allows('jadwal_show'), 403);

        $jadwal->load('level_paket', 'mentor');

        return view('admin.jadwals.show', compact('jadwal'));
    }

    public function destroy(Jadwal $jadwal)
    {
        abort_unless(\Gate::allows('jadwal_delete'), 403);

        $jadwal->delete();

        return back();
    }

    public function massDestroy(MassDestroyJadwalRequest $request)
    {
        Jadwal::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
