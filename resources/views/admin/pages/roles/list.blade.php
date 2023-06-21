@extends('admin.layout.admin')
@section('admin_title', 'Dashboard')
@section('admin_pages')
    <div class="my-4 flex justify-end">
        <a href="{{route('roles.create')}}" class="p-2 rounded bg-slate-300 text-bg-slate-800 active:bg-slate-400 active:text-white">Create Role</a>
    </div>
    <div class="p-4 rounded-xl shadow-[1px_1px_10px_2px_rgba(0,0,0,0.1)] overflow-y-auto">
        <table id="myTable" class="table table-striped table-bordered dt-responsive" style="width: 100%;">
            <thead>
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Guard</th>
{{--                <th>Status</th>--}}
                <th>Actions</th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    @push('admin_script')
        <script>
            $('#myTable').DataTable( {
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{url("/roles/list")}}',
                    method: 'GET',
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {data: 'name'},
                    {data: 'guard_name'},
                    // {data: 'boolstatus'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        </script>
    @endpush
@endsection
