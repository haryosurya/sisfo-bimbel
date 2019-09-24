@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.jadwal.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.jadwals.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('hari') ? 'has-error' : '' }}">
                            <label for="hari">{{ trans('cruds.jadwal.fields.hari') }}*</label>
                            <input type="text" id="hari" name="hari" class="form-control date" value="{{ old('hari', isset($jadwal) ? $jadwal->hari : '') }}" required>
                            @if($errors->has('hari'))
                                <p class="help-block">
                                    {{ $errors->first('hari') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.jadwal.fields.hari_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('jam_mulai') ? 'has-error' : '' }}">
                            <label for="jam_mulai">{{ trans('cruds.jadwal.fields.jam_mulai') }}*</label>
                            <input type="text" id="jam_mulai" name="jam_mulai" class="form-control timepicker" value="{{ old('jam_mulai', isset($jadwal) ? $jadwal->jam_mulai : '') }}" required>
                            @if($errors->has('jam_mulai'))
                                <p class="help-block">
                                    {{ $errors->first('jam_mulai') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.jadwal.fields.jam_mulai_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('jam_selesai') ? 'has-error' : '' }}">
                            <label for="jam_selesai">{{ trans('cruds.jadwal.fields.jam_selesai') }}*</label>
                            <input type="text" id="jam_selesai" name="jam_selesai" class="form-control timepicker" value="{{ old('jam_selesai', isset($jadwal) ? $jadwal->jam_selesai : '') }}" required>
                            @if($errors->has('jam_selesai'))
                                <p class="help-block">
                                    {{ $errors->first('jam_selesai') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.jadwal.fields.jam_selesai_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('mapel') ? 'has-error' : '' }}">
                            <label for="mapel">{{ trans('cruds.jadwal.fields.mapel') }}*</label>
                            <select id="mapel" name="mapel" class="form-control" required>
                                <option value="" disabled {{ old('mapel', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Jadwal::MAPEL_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('mapel', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('mapel'))
                                <p class="help-block">
                                    {{ $errors->first('mapel') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('level_paket_id') ? 'has-error' : '' }}">
                            <label for="level_paket">{{ trans('cruds.jadwal.fields.level_paket') }}*</label>
                            <select name="level_paket_id" id="level_paket" class="form-control select2" required>
                                @foreach($level_pakets as $id => $level_paket)
                                    <option value="{{ $id }}" {{ (isset($jadwal) && $jadwal->level_paket ? $jadwal->level_paket->id : old('level_paket_id')) == $id ? 'selected' : '' }}>{{ $level_paket }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('level_paket_id'))
                                <p class="help-block">
                                    {{ $errors->first('level_paket_id') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('mentor_id') ? 'has-error' : '' }}">
                            <label for="mentor">{{ trans('cruds.jadwal.fields.mentor') }}*</label>
                            <select name="mentor_id" id="mentor" class="form-control select2" required>
                                @foreach($mentors as $id => $mentor)
                                    <option value="{{ $id }}" {{ (isset($jadwal) && $jadwal->mentor ? $jadwal->mentor->id : old('mentor_id')) == $id ? 'selected' : '' }}>{{ $mentor }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('mentor_id'))
                                <p class="help-block">
                                    {{ $errors->first('mentor_id') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('ruangan') ? 'has-error' : '' }}">
                            <label for="ruangan">{{ trans('cruds.jadwal.fields.ruangan') }}*</label>
                            <select id="ruangan" name="ruangan" class="form-control" required>
                                <option value="" disabled {{ old('ruangan', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Jadwal::RUANGAN_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('ruangan', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('ruangan'))
                                <p class="help-block">
                                    {{ $errors->first('ruangan') }}
                                </p>
                            @endif
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