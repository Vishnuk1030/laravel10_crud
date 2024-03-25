<html>

<head>
    <title>Add</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="contaier">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success"> {{ session('status') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h1 style="text-align: center">Add Category</h1>
                        <a href="{{ route('index') }}" class="btn btn-primary">Back</a>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('create') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="3" value="{{ old('description') }}"></textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Is active</label>
                                <input type="checkbox" name="is_active" {{ old('is_active') == true ? checked : '' }}>
                                @error('is_active')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
