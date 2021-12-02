<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>upload your excel </title>
</head>
<body>
    <h2 class="text-center text-capitalize text-black-50">Beta excel upload web app by <strong>MIRVALI</strong></h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="form-control">
        <form action="{{ route('student.excel_upload') }}" method="post" enctype="multipart/form-data" class="form-control">
            @csrf
            <input type="file" name="excel_upload" required>
            <button type="submit" class="btn btn-primary m-3">Upload</button>
        </form>
    </div>
    <hr>

    <table class="table table-dark caption-top">
        <thead>
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Serial_Number</th>
            <th scope="col">Employee_Markme</th>
            <th scope="col">Description</th>
        </tr>
        </thead>
        <tbody>

            @forelse($users as $user)
                <tr>
                 <td>{{ $user->id }}</td>
                 <td>{{ $user->Serial_Number }}</td>
                 <td>{{ $user->Employee_Markme }}</td>
                 <td>{{ $user->Description }}</td>
                </tr>
            @empty
                <H1>Sorry List Of users don't uploaded yet</H1>
           @endforelse
        </tbody>
    </table>

    {{$users->links("pagination::bootstrap-4")}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
