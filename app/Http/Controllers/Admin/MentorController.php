<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMentorRequest;
use App\Http\Requests\StoreMentorRequest;
use App\Http\Requests\UpdateMentorRequest;
use App\Mentor;
use App\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MentorController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('mentor_access'), 403);

        $mentors = Mentor::all();

        return view('admin.mentors.index', compact('mentors'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('mentor_create'), 403);

        $roles = Role::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.mentors.create', compact('roles'));
    }

    public function store(StoreMentorRequest $request)
    {
        abort_unless(\Gate::allows('mentor_create'), 403);

        $mentor = Mentor::create($request->all());

        return redirect()->route('admin.mentors.index');
    }

    public function edit(Mentor $mentor)
    {
        abort_unless(\Gate::allows('mentor_edit'), 403);

        $roles = Role::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $mentor->load('roles');

        return view('admin.mentors.edit', compact('roles', 'mentor'));
    }

    public function update(UpdateMentorRequest $request, Mentor $mentor)
    {
        abort_unless(\Gate::allows('mentor_edit'), 403);

        $mentor->update($request->all());

        return redirect()->route('admin.mentors.index');
    }

    public function show(Mentor $mentor)
    {
        abort_unless(\Gate::allows('mentor_show'), 403);

        $mentor->load('roles');

        return view('admin.mentors.show', compact('mentor'));
    }

    public function destroy(Mentor $mentor)
    {
        abort_unless(\Gate::allows('mentor_delete'), 403);

        $mentor->delete();

        return back();
    }

    public function massDestroy(MassDestroyMentorRequest $request)
    {
        Mentor::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
