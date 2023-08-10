@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.donatur.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.donaturs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.donatur.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.donatur.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama">{{ trans('cruds.donatur.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', '') }}" required>
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.donatur.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.donatur.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', '') }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.donatur.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nohp">{{ trans('cruds.donatur.fields.nohp') }}</label>
                <input class="form-control {{ $errors->has('nohp') ? 'is-invalid' : '' }}" type="number" name="nohp" id="nohp" value="{{ old('nohp', '') }}" step="1" required>
                @if($errors->has('nohp'))
                    <span class="text-danger">{{ $errors->first('nohp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.donatur.fields.nohp_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="jumlah">{{ trans('cruds.donatur.fields.jumlah') }}</label>
                <input class="form-control {{ $errors->has('jumlah') ? 'is-invalid' : '' }}" type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', '') }}" step="0.01" required>
                @if($errors->has('jumlah'))
                    <span class="text-danger">{{ $errors->first('jumlah') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.donatur.fields.jumlah_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pesan">{{ trans('cruds.donatur.fields.pesan') }}</label>
                <textarea class="form-control {{ $errors->has('pesan') ? 'is-invalid' : '' }}" name="pesan" id="pesan">{{ old('pesan') }}</textarea>
                @if($errors->has('pesan'))
                    <span class="text-danger">{{ $errors->first('pesan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.donatur.fields.pesan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kampanye_id">{{ trans('cruds.donatur.fields.kampanye') }}</label>
                <select class="form-control select2 {{ $errors->has('kampanye') ? 'is-invalid' : '' }}" name="kampanye_id" id="kampanye_id">
                    @foreach($kampanyes as $id => $entry)
                        <option value="{{ $id }}" {{ old('kampanye_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('kampanye'))
                    <span class="text-danger">{{ $errors->first('kampanye') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.donatur.fields.kampanye_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection