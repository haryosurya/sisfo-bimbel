@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.murid.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.murids.update", [$murid->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('cruds.murid.fields.name') }}*</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($murid) ? $murid->name : '') }}" required>
                            @if($errors->has('name'))
                                <p class="help-block">
                                    {{ $errors->first('name') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.murid.fields.name_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">{{ trans('cruds.murid.fields.email') }}</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                            @if($errors->has('email'))
                                <p class="help-block">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.murid.fields.email_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label for="password">{{ trans('cruds.murid.fields.password') }}</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                            @if($errors->has('password'))
                                <p class="help-block">
                                    {{ $errors->first('password') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.murid.fields.password_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('roles_id') ? 'has-error' : '' }}">
                            <label for="roles">{{ trans('cruds.murid.fields.roles') }}*</label>
                            <select name="roles_id" id="roles" class="form-control select2" required>
                                @foreach($roles as $id => $roles)
                                    <option value="{{ $id }}" {{ (isset($murid) && $murid->roles ? $murid->roles->id : old('roles_id')) == $id ? 'selected' : '' }}>{{ $roles }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('roles_id'))
                                <p class="help-block">
                                    {{ $errors->first('roles_id') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('jenis_kelamin') ? 'has-error' : '' }}">
                            <label for="jenis_kelamin">{{ trans('cruds.murid.fields.jenis_kelamin') }}*</label>
                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
                                <option value="" disabled {{ old('jenis_kelamin', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Murid::JENIS_KELAMIN_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('jenis_kelamin', $murid->jenis_kelamin) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('jenis_kelamin'))
                                <p class="help-block">
                                    {{ $errors->first('jenis_kelamin') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
                            <label for="alamat">{{ trans('cruds.murid.fields.alamat') }}*</label>
                            <input type="text" id="alamat" name="alamat" class="form-control" value="{{ old('alamat', isset($murid) ? $murid->alamat : '') }}" required>
                            @if($errors->has('alamat'))
                                <p class="help-block">
                                    {{ $errors->first('alamat') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.murid.fields.alamat_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('sekolah_asal') ? 'has-error' : '' }}">
                            <label for="sekolah_asal">{{ trans('cruds.murid.fields.sekolah_asal') }}*</label>
                            <input type="text" id="sekolah_asal" name="sekolah_asal" class="form-control" value="{{ old('sekolah_asal', isset($murid) ? $murid->sekolah_asal : '') }}" required>
                            @if($errors->has('sekolah_asal'))
                                <p class="help-block">
                                    {{ $errors->first('sekolah_asal') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.murid.fields.sekolah_asal_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('tempat_lahir') ? 'has-error' : '' }}">
                            <label for="tempat_lahir">{{ trans('cruds.murid.fields.tempat_lahir') }}*</label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', isset($murid) ? $murid->tempat_lahir : '') }}" required>
                            @if($errors->has('tempat_lahir'))
                                <p class="help-block">
                                    {{ $errors->first('tempat_lahir') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.murid.fields.tempat_lahir_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('tanggal_lahir') ? 'has-error' : '' }}">
                            <label for="tanggal_lahir">{{ trans('cruds.murid.fields.tanggal_lahir') }}*</label>
                            <input type="text" id="tanggal_lahir" name="tanggal_lahir" class="form-control date" value="{{ old('tanggal_lahir', isset($murid) ? $murid->tanggal_lahir : '') }}" required>
                            @if($errors->has('tanggal_lahir'))
                                <p class="help-block">
                                    {{ $errors->first('tanggal_lahir') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.murid.fields.tanggal_lahir_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('paket_id') ? 'has-error' : '' }}">
                            <label for="paket">{{ trans('cruds.murid.fields.paket') }}*</label>
                            <select name="paket_id" id="paket" class="form-control select2" required>
                                @foreach($pakets as $id => $paket)
                                    <option value="{{ $id }}" {{ (isset($murid) && $murid->paket ? $murid->paket->id : old('paket_id')) == $id ? 'selected' : '' }}>{{ $paket }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('paket_id'))
                                <p class="help-block">
                                    {{ $errors->first('paket_id') }}
                                </p>
                            @endif
                        </div>
                   <!--     <div class="form-group {{ $errors->has('foto') ? 'has-error' : '' }}">
                            <label for="foto">{{ trans('cruds.murid.fields.foto') }}</label>
                            <div class="needsclick dropzone" id="foto-dropzone">

                            </div>
                            @if($errors->has('foto'))
                                <p class="help-block">
                                    {{ $errors->first('foto') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.murid.fields.foto_helper') }}
                            </p>
                        </div>-->
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

