@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.jadwal.title') }}
                </div>
                <div class="panel-body">

                    <div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.jadwal.fields.hari') }}
                                    </th>
                                    <td>
                                        {{ $jadwal->hari }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.jadwal.fields.jam_mulai') }}
                                    </th>
                                    <td>
                                        {{ $jadwal->jam_mulai }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.jadwal.fields.jam_selesai') }}
                                    </th>
                                    <td>
                                        {{ $jadwal->jam_selesai }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.jadwal.fields.mapel') }}
                                    </th>
                                    <td>
                                        {{ App\Jadwal::MAPEL_SELECT[$jadwal->mapel] }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.jadwal.fields.level_paket') }}
                                    </th>
                                    <td>
                                        {{ $jadwal->level_paket->level_paket ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.jadwal.fields.mentor') }}
                                    </th>
                                    <td>
                                        {{ $jadwal->mentor->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.jadwal.fields.ruangan') }}
                                    </th>
                                    <td>
                                        {{ App\Jadwal::RUANGAN_SELECT[$jadwal->ruangan] }}
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