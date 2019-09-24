@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.mentor.title') }}
                </div>
                <div class="panel-body">

                    <div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.mentor.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $mentor->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.mentor.fields.password') }}
                                    </th>
                                    <td>
                                        ---
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.mentor.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $mentor->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.mentor.fields.jenis_kelamin') }}
                                    </th>
                                    <td>
                                        {{ App\Mentor::JENIS_KELAMIN_SELECT[$mentor->jenis_kelamin] }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.mentor.fields.alamat') }}
                                    </th>
                                    <td>
                                        {{ $mentor->alamat }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.mentor.fields.roles') }}
                                    </th>
                                    <td>
                                        {{ $mentor->roles->title ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                            Back
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection