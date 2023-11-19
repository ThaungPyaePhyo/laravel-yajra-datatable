@extends('welcome')
@section('content')
    <div class="container-2xl mx-40 my-40">
        <table class="table-auto" id="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Content</th>
                    <th width="105px">Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            let table = $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('blog.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'content',
                        name: 'content'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                        var editUrl = "{{ url('blog') }}/" + row.id + "/edit";
                        return `
                            <div class="flex justify-between">
                                <a href="${editUrl}" class="bg-blue-800 text-white rounded p-3">Edit</a>
                                <button class="bg-red-800 text-white rounded p-3" onclick="deleteRecord(${row.id})">Delete</button>
                            </div>
                        `;
                    }
                    },
                ]
            })
        })
    </script>
@endsection
