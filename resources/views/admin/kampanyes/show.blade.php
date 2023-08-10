@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.kampanye.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.kampanyes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.kampanye.fields.id') }}
                        </th>
                        <td>
                            {{ $kampanye->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kampanye.fields.nama_kampanye') }}
                        </th>
                        <td>
                            {{ $kampanye->nama_kampanye }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kampanye.fields.slug') }}
                        </th>
                        <td>
                            {{ $kampanye->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kampanye.fields.total') }}
                        </th>
                        <td>
                            {{ $kampanye->total }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kampanye.fields.image') }}
                        </th>
                        <td>
                            {{ $kampanye->image }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kampanye.fields.deskripsi') }}
                        </th>
                        <td>
                            {{ $kampanye->deskripsi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kampanye.fields.lokasi') }}
                        </th>
                        <td>
                            {{ $kampanye->lokasi }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.kampanyes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection