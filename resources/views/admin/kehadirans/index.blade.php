@extends('layouts.admin')
@section('content')
<div class="content">
    @can('kehadiran_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.kehadirans.create") }}">
                  Tambah Daftar Kehadiran
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.kehadiran.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.kehadiran.fields.jadwal') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.jadwal.fields.jam_mulai') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.jadwal.fields.jam_selesai') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.jadwal.fields.ruangan') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.jadwal.fields.mapel') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.kehadiran.fields.peserta') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kehadirans as $key => $kehadiran)
                                    <tr data-entry-id="{{ $kehadiran->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $kehadiran->jadwal->hari ?? '' }}
                                        </td>
                                        <td>
                                            {{ $kehadiran->jadwal->jam_mulai ?? '' }}
                                        </td>
                                        <td>
                                            {{ $kehadiran->jadwal->jam_selesai ?? '' }}
                                        </td>
                                        <td>
                                            {{ $kehadiran->jadwal::RUANGAN_SELECT[$kehadiran->jadwal->ruangan] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $kehadiran->jadwal::MAPEL_SELECT[$kehadiran->jadwal->mapel] ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($kehadiran->pesertas as $key => $item)
                                                <span class="label label-info label-many">{{ $item->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @can('kehadiran_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.kehadirans.show', $kehadiran->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan
                                            @can('kehadiran_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.kehadirans.edit', $kehadiran->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan
                                            @can('kehadiran_delete')
                                                <form action="{{ route('admin.kehadirans.destroy', $kehadiran->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.kehadirans.massDestroy') }}",
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
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('kehadiran_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection