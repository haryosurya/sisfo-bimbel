@extends('layouts.admin')
@section('content')
<div class="content">
    @can('murid_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.murids.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.murid.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.murid.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable">
                            <thead>
                                <tr>
                                    <th width="10">
                                    </th>
                                    <th>
                                        {{ trans('cruds.murid.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.murid.fields.roles') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.murid.fields.jenis_kelamin') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.murid.fields.alamat') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.murid.fields.sekolah_asal') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.murid.fields.tempat_lahir') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.murid.fields.tanggal_lahir') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.murid.fields.paket') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paket.fields.level_paket') }}
                                    </th>
                                    
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($murids as $key => $murid)
                                    <tr data-entry-id="{{ $murid->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $murid->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $murid->roles->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Murid::JENIS_KELAMIN_SELECT[$murid->jenis_kelamin] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $murid->alamat ?? '' }}
                                        </td>
                                        <td>
                                            {{ $murid->sekolah_asal ?? '' }}
                                        </td>
                                        <td>
                                            {{ $murid->tempat_lahir ?? '' }}
                                        </td>
                                        <td>
                                            {{ $murid->tanggal_lahir ?? '' }}
                                        </td>
                                        <td>
                                            {{ $murid->paket->level_paket ?? '' }}
                                        </td>
                                        <td>
                                            {{ $murid->paket::LEVEL_PAKET_SELECT[$murid->paket->level_paket] ?? '' }}
                                        </td>
                                       
                                        <td>
                                            @can('murid_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.murids.show', $murid->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan
                                            @can('murid_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.murids.edit', $murid->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan
                                            @can('murid_delete')
                                                <form action="{{ route('admin.murids.destroy', $murid->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.murids.massDestroy') }}",
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
@can('murid_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection