@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.mentor.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.mentors.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('cruds.mentor.fields.name') }}*</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($mentor) ? $mentor->name : '') }}" required>
                            @if($errors->has('name'))
                                <p class="help-block">
                                    {{ $errors->first('name') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.mentor.fields.name_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label for="password">{{ trans('cruds.mentor.fields.password') }}</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                            @if($errors->has('password'))
                                <p class="help-block">
                                    {{ $errors->first('password') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.mentor.fields.password_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">{{ trans('cruds.mentor.fields.email') }}*</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($mentor) ? $mentor->email : '') }}" required>
                            @if($errors->has('email'))
                                <p class="help-block">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.mentor.fields.email_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('jenis_kelamin') ? 'has-error' : '' }}">
                            <label for="jenis_kelamin">{{ trans('cruds.mentor.fields.jenis_kelamin') }}*</label>
                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
                                <option value="" disabled {{ old('jenis_kelamin', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Mentor::JENIS_KELAMIN_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('jenis_kelamin', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('jenis_kelamin'))
                                <p class="help-block">
                                    {{ $errors->first('jenis_kelamin') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
                            <label for="alamat">{{ trans('cruds.mentor.fields.alamat') }}*</label>
                            <input type="text" id="alamat" name="alamat" class="form-control" value="{{ old('alamat', isset($mentor) ? $mentor->alamat : '') }}" required>
                            @if($errors->has('alamat'))
                                <p class="help-block">
                                    {{ $errors->first('alamat') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.mentor.fields.alamat_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('roles_id') ? 'has-error' : '' }}">
                            <label for="roles">{{ trans('cruds.mentor.fields.roles') }}*</label>
                            <select name="roles_id" id="roles" class="form-control select2" required>
                                @foreach($roles as $id => $roles)
                                    <option value="{{ $id }}" {{ (isset($mentor) && $mentor->roles ? $mentor->roles->id : old('roles_id')) == $id ? 'selected' : '' }}>{{ $roles }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('roles_id'))
                                <p class="help-block">
                                    {{ $errors->first('roles_id') }}
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