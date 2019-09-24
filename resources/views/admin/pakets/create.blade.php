@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.paket.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.pakets.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('nama_paket') ? 'has-error' : '' }}">
                            <label for="nama_paket">{{ trans('cruds.paket.fields.nama_paket') }}</label>
                            <input type="text" id="nama_paket" name="nama_paket" class="form-control" value="{{ old('nama_paket', isset($paket) ? $paket->nama_paket : '') }}">
                            @if($errors->has('nama_paket'))
                                <p class="help-block">
                                    {{ $errors->first('nama_paket') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.paket.fields.nama_paket_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('level_paket') ? 'has-error' : '' }}">
                            <label for="level_paket">{{ trans('cruds.paket.fields.level_paket') }}</label>
                            <select id="level_paket" name="level_paket" class="form-control">
                                <option value="" disabled {{ old('level_paket', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Paket::LEVEL_PAKET_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('level_paket', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('level_paket'))
                                <p class="help-block">
                                    {{ $errors->first('level_paket') }}
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