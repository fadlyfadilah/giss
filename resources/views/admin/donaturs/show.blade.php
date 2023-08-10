@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.donatur.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.donaturs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.donatur.fields.id') }}
                        </th>
                        <td>
                            {{ $donatur->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.donatur.fields.user') }}
                        </th>
                        <td>
                            {{ $donatur->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.donatur.fields.nama') }}
                        </th>
                        <td>
                            {{ $donatur->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.donatur.fields.email') }}
                        </th>
                        <td>
                            {{ $donatur->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.donatur.fields.nohp') }}
                        </th>
                        <td>
                            {{ $donatur->nohp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.donatur.fields.jumlah') }}
                        </th>
                        <td>
                            {{ $donatur->jumlah }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.donatur.fields.pesan') }}
                        </th>
                        <td>
                            {{ $donatur->pesan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.donatur.fields.kampanye') }}
                        </th>
                        <td>
                            {{ $donatur->kampanye->nama_kampanye ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.donaturs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection