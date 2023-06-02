@extends('admin.layout.admin')
@section('admin_title', 'Dashboard')
@section('admin_pages')
    <div class="my-4 flex justify-end">
        <a href="{{route('users.create')}}" class="p-2 rounded bg-slate-300 text-bg-slate-800 active:bg-slate-400">Create User</a>
    </div>
    <div class="p-4 rounded-xl shadow-[1px_1px_10px_2px_rgba(0,0,0,0.1)]">
        <table id="myTable" class="table table-striped table-bordered dt-responsive" style="width: 100%;">
            <thead>
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Email</th>
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
                    url: '{{url("/users/list")}}',
                    method: 'GET',
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {data: 'name'},
                    {data: 'email'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        </script>
    @endpush
@endsection
