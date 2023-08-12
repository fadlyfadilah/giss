@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.donasi.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Donasi">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.donasi.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.donasi.fields.user') }}
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
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($donasis as $key => $donasi)
                        <tr data-entry-id="{{ $donasi->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $donasi->id ?? '' }}
                            </td>
                            <td>
                                {{ $donasi->user->name ?? '' }}
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



                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Donasi:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection