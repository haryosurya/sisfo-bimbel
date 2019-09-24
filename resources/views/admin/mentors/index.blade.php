@extends('layouts.admin')
@section('content')
<div class="content">
    @can('mentor_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.mentors.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.mentor.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.mentor.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.mentor.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.mentor.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.mentor.fields.jenis_kelamin') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.mentor.fields.alamat') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.mentor.fields.roles') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mentors as $key => $mentor)
                                    <tr data-entry-id="{{ $mentor->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $mentor->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $mentor->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Mentor::JENIS_KELAMIN_SELECT[$mentor->jenis_kelamin] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $mentor->alamat ?? '' }}
                                        </td>
                                        <td>
                                            {{ $mentor->roles->title ?? '' }}
                                        </td>
                                        <td>
                                            @can('mentor_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.mentors.show', $mentor->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan
                                            @can('mentor_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.mentors.edit', $mentor->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan
                                            @can('mentor_delete')
                                                <form action="{{ route('admin.mentors.destroy', $mentor->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.mentors.massDestroy') }}",
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
@can('mentor_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection