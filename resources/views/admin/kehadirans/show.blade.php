@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.kehadiran.title') }}
                </div>
                <div class="panel-body">

                    <div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.kehadiran.fields.jadwal') }}
                                    </th>
                                    <td>
                                        {{ $kehadiran->jadwal->hari ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Peserta
                                    </th>
                                    <td>
                                        @foreach($kehadiran->pesertas as $id => $peserta)
                                            <span class="label label-info label-many">{{ $peserta->name }}</span>
                                        @endforeach
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