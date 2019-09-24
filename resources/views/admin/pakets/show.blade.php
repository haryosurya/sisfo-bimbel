@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.paket.title') }}
                </div>
                <div class="panel-body">

                    <div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.paket.fields.nama_paket') }}
                                    </th>
                                    <td>
                                        {{ $paket->nama_paket }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.paket.fields.level_paket') }}
                                    </th>
                                    <td>
                                        {{ App\Paket::LEVEL_PAKET_SELECT[$paket->level_paket] }}
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