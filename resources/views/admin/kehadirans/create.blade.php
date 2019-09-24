@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.kehadiran.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.kehadirans.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('jadwal_id') ? 'has-error' : '' }}">
                            <label for="jadwal">{{ trans('cruds.kehadiran.fields.jadwal') }}*</label>
                            <select name="jadwal_id" id="jadwal" class="form-control select2" required>
                                @foreach($jadwals as $id => $jadwal)
                                    <option value="{{ $id }}" {{ (isset($kehadiran) && $kehadiran->jadwal ? $kehadiran->jadwal->id : old('jadwal_id')) == $id ? 'selected' : '' }}>{{ $jadwal }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('jadwal_id'))
                                <p class="help-block">
                                    {{ $errors->first('jadwal_id') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('pesertas') ? 'has-error' : '' }}">
                            <label for="peserta">{{ trans('cruds.kehadiran.fields.peserta') }}
                                <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                            <select name="pesertas[]" id="pesertas" class="form-control select2" multiple="multiple">
                                @foreach($pesertas as $id => $peserta)
                                    <option value="{{ $id }}" {{ (in_array($id, old('pesertas', [])) || isset($kehadiran) && $kehadiran->pesertas->contains($id)) ? 'selected' : '' }}>{{ $peserta }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('pesertas'))
                                <p class="help-block">
                                    {{ $errors->first('pesertas') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.kehadiran.fields.peserta_helper') }}
                            </p>
                        </div>
                        <div>
                            <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection