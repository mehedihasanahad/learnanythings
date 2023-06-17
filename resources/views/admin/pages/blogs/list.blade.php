@extends('admin.layout.admin')
@section('admin_title', 'Dashboard')
@section('admin_pages')
    <div class="my-4 flex justify-end">
        <a href="{{route('blogs.create')}}" class="p-2 rounded bg-slate-300 text-bg-slate-800 active:bg-slate-400 active:text-white">Create Blog</a>
    </div>
    <div class="p-4 rounded-xl shadow-[1px_1px_10px_2px_rgba(0,0,0,0.1)] overflow-y-auto">
        <table id="myTable" class="table table-striped table-bordered dt-responsive" style="width: 100%;">
            <thead>
            <tr>
                <th>SL</th>
                <th>Title</th>
                <th>Image</th>
                <th>Content Type</th>
                <th>Template</th>
                <th>Featured</th>
                <th>Status</th>
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
                    url: '{{url("/blogs/list")}}',
                    method: 'GET',
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {data: 'title'},
                    {data: 'image', name: 'image', orderable: false, searchable: false},
                    {data: 'contenttype'},
                    {data: 'template'},
                    {data: 'featured'},
                    {data: 'boolstatus'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        </script>
    @endpush
@endsection
