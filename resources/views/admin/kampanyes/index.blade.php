@extends('layouts.admin')
@section('content')
@can('kampanye_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.kampanyes.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.kampanye.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.kampanye.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Kampanye">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.kampanye.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.kampanye.fields.nama_kampanye') }}
                        </th>
                        <th>
                            {{ trans('cruds.kampanye.fields.slug') }}
                        </th>
                        <th>
                            {{ trans('cruds.kampanye.fields.total') }}
                        </th>
                        <th>
                            {{ trans('cruds.kampanye.fields.image') }}
                        </th>
                        <th>
                            {{ trans('cruds.kampanye.fields.deskripsi') }}
                        </th>
                        <th>
                            {{ trans('cruds.kampanye.fields.lokasi') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kampanyes as $key => $kampanye)
                        <tr data-entry-id="{{ $kampanye->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $kampanye->id ?? '' }}
                            </td>
                            <td>
                                {{ $kampanye->nama_kampanye ?? '' }}
                            </td>
                            <td>
                                {{ $kampanye->slug ?? '' }}
                            </td>
                            <td>
                                {{ $kampanye->total ?? '' }}
                            </td>
                            <td>
                                {{ $kampanye->image ?? '' }}
                            </td>
                            <td>
                                {{ $kampanye->deskripsi ?? '' }}
                            </td>
                            <td>
                                {{ $kampanye->lokasi ?? '' }}
                            </td>
                            <td>
                                @can('kampanye_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.kampanyes.show', $kampanye->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('kampanye_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.kampanyes.edit', $kampanye->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('kampanye_delete')
                                    <form action="{{ route('admin.kampanyes.destroy', $kampanye->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

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
@can('kampanye_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.kampanyes.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Kampanye:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection