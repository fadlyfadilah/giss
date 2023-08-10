@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.kampanye.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.kampanyes.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nama_kampanye">{{ trans('cruds.kampanye.fields.nama_kampanye') }}</label>
                <input class="form-control {{ $errors->has('nama_kampanye') ? 'is-invalid' : '' }}" type="text" name="nama_kampanye" id="nama_kampanye" value="{{ old('nama_kampanye', '') }}" required>
                @if($errors->has('nama_kampanye'))
                    <span class="text-danger">{{ $errors->first('nama_kampanye') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.kampanye.fields.nama_kampanye_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="slug">{{ trans('cruds.kampanye.fields.slug') }}</label>
                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', '') }}" required>
                @if($errors->has('slug'))
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.kampanye.fields.slug_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total">{{ trans('cruds.kampanye.fields.total') }}</label>
                <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number" name="total" id="total" value="{{ old('total', '') }}" step="0.01" required>
                @if($errors->has('total'))
                    <span class="text-danger">{{ $errors->first('total') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.kampanye.fields.total_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="image">{{ trans('cruds.kampanye.fields.image') }}</label>
                <input class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" type="text" name="image" id="image" value="{{ old('image', '') }}">
                @if($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.kampanye.fields.image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="deskripsi">{{ trans('cruds.kampanye.fields.deskripsi') }}</label>
                <textarea class="form-control {{ $errors->has('deskripsi') ? 'is-invalid' : '' }}" name="deskripsi" id="deskripsi">{{ old('deskripsi') }}</textarea>
                @if($errors->has('deskripsi'))
                    <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.kampanye.fields.deskripsi_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="lokasi">{{ trans('cruds.kampanye.fields.lokasi') }}</label>
                <input class="form-control {{ $errors->has('lokasi') ? 'is-invalid' : '' }}" type="text" name="lokasi" id="lokasi" value="{{ old('lokasi', '') }}" required>
                @if($errors->has('lokasi'))
                    <span class="text-danger">{{ $errors->first('lokasi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.kampanye.fields.lokasi_helper') }}</span>
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