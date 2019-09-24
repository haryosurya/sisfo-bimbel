@extends('layouts.admin')
@section('content')
<div class="content">
    @can('jadwal_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.jadwals.create") }}">
                   Tambah Jadwal Baru
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.jadwal.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.jadwal.fields.hari') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.jadwal.fields.jam_mulai') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.jadwal.fields.jam_selesai') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.jadwal.fields.mapel') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.jadwal.fields.level_paket') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paket.fields.nama_paket') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.jadwal.fields.mentor') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.jadwal.fields.ruangan') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jadwals as $key => $jadwal)
                                    <tr data-entry-id="{{ $jadwal->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $jadwal->hari ?? '' }}
                                        </td>
                                        <td>
                                            {{ $jadwal->jam_mulai ?? '' }}
                                        </td>
                                        <td>
                                            {{ $jadwal->jam_selesai ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Jadwal::MAPEL_SELECT[$jadwal->mapel] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $jadwal->level_paket->level_paket ?? '' }}
                                        </td>
                                        <td>
                                            {{ $jadwal->level_paket->nama_paket ?? '' }}
                                        </td>
                                        <td>
                                            {{ $jadwal->mentor->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Jadwal::RUANGAN_SELECT[$jadwal->ruangan] ?? '' }}
                                        </td>
                                        <td>
                                            @can('jadwal_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.jadwals.show', $jadwal->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan
                                            @can('jadwal_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.jadwals.edit', $jadwal->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan
                                            @can('jadwal_delete')
                                                <form action="{{ route('admin.jadwals.destroy', $jadwal->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.jadwals.massDestroy') }}",
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
@can('jadwal_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection