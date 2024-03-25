<html>

<head>
    <title>Laravel_Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="contaier">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 style="text-align: center">Category</h1>
                        <a href="{{ route('create') }}" class="btn btn-primary">Add Category</a>

                    </div>
                    <div class="card-body">
                        <table class="text-center table table-striped center">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $item)
                                    <tr>
                                        <th scope="row">{{ $categories->firstItem() + $loop->index}}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>
                                            @if ($item->is_active)
                                                Active
                                            @else
                                                Inactive
                                            @endif

                                        </td>
                                        <td>
                                            <a class="btn btn-success"
                                                href="{{ url('categories/' . encrypt($item->id) . '/edit') }}">edit</a>
                                            <a class="btn btn-danger"
                                                href="{{ url('categories/' . $item->id . '/delete') }}"
                                                onclick="return confirm('Are you sure want to delete?')">delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div>
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
