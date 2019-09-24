@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.murid.title') }}
                </div>
                <div class="panel-body">

                    <div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.murid.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $murid->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.murid.fields.email') }}
                                    </th>
                                    <td>
                                        ---
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.murid.fields.password') }}
                                    </th>
                                    <td>
                                        ---
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.murid.fields.roles') }}
                                    </th>
                                    <td>
                                        {{ $murid->roles->title ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.murid.fields.jenis_kelamin') }}
                                    </th>
                                    <td>
                                        {{ App\Murid::JENIS_KELAMIN_SELECT[$murid->jenis_kelamin] }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.murid.fields.alamat') }}
                                    </th>
                                    <td>
                                        {{ $murid->alamat }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.murid.fields.sekolah_asal') }}
                                    </th>
                                    <td>
                                        {{ $murid->sekolah_asal }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.murid.fields.tempat_lahir') }}
                                    </th>
                                    <td>
                                        {{ $murid->tempat_lahir }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.murid.fields.tanggal_lahir') }}
                                    </th>
                                    <td>
                                        {{ $murid->tanggal_lahir }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.murid.fields.paket') }}
                                    </th>
                                    <td>
                                        {{ $murid->paket->level_paket ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection