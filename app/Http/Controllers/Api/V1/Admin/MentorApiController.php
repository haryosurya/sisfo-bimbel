<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMentorRequest;
use App\Http\Requests\UpdateMentorRequest;
use App\Mentor;

class MentorApiController extends Controller
{
    public function index()
    {
        $mentors = Mentor::all();

        return $mentors;
    }

    public function store(StoreMentorRequest $request)
    {
        return Mentor::create($request->all());
    }

    public function update(UpdateMentorRequest $request, Mentor $mentor)
    {
        return $mentor->update($request->all());
    }

    public function show(Mentor $mentor)
    {
        return $mentor;
    }

    public function destroy(Mentor $mentor)
    {
        $mentor->delete();

        return response("OK", 200);
    }
}
