@extends('layouts.frontend')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        {{ trans('cruds.donasi.title_singular') }} {{ trans('global.list') }}
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class=" table table-bordered table-striped table-hover datatable datatable-Donasi">
                                <thead>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.donasi.fields.id') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.donasi.fields.full_name') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.donasi.fields.email') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.donasi.fields.jumlah') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.donasi.fields.note') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.donasi.fields.kampanye') }}
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            &nbsp;
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($donasis as $key => $donasi)
                                        <tr data-entry-id="{{ $donasi->id }}">
                                            <td>
                                                {{ $donasi->id ?? '' }}
                                            </td>
                                            <td>
                                                {{ $donasi->full_name ?? '' }}
                                            </td>
                                            <td>
                                                {{ $donasi->email ?? '' }}
                                            </td>
                                            <td>
                                                {{ $donasi->jumlah ?? '' }}
                                            </td>
                                            <td>
                                                {{ $donasi->note ?? '' }}
                                            </td>
                                            <td>
                                                {{ $donasi->kampanye->nama_kampanye ?? '' }}
                                            </td>
                                            <td>
                                                <span
                                                    class="badge @if ($donasi->status === 'pending') badge-secondary
                                                @elseif($donasi->status === 'cancel')
                                                badge-danger 
                                                @else
                                                badge-success @endif">{{ $donasi->status ?? '' }}</span>
                                            </td>
                                            <td>
                                                <a class="btn btn-xs btn-primary"
                                                    href="{{ route('frontend.donasi.detail', $donasi->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 100,
            });
            let table = $('.datatable-Donasi:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
