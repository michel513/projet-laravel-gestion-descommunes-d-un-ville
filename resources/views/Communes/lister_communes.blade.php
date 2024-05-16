<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD APP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    @php
    use App\Models\Commune;

    $communes = Commune::paginate();
    @endphp

    <div class="container-fluid text-center mt-3 ">
        <div class="row">
            <div class="col s12">
                <h1>Gestion des Communes et des Habitants</h1>
                <br>
                <br>
                <hr>
                <a href="/ajouter/commune" class="btn btn-primary">Ajouter un Commune</a>
                <br>
                <br>
                @if (session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
                @endif


                @if (session('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
                @endif


                <table class="table w-100 ">
                    <thead class="table-dark">
                        <tr>
                            <th># Numéro Commune</th>
                            <th>Nom Commune</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($communes as $commune)
                        <tr>
                            <td>{{$commune->IdCommune}}</td>
                            <td>{{$commune->NomCommune}}</td>
                            <td>
                                <a href="/lister-quartier/{{$commune->IdCommune}}" class="btn btn-secondary">Voir les Quartiers</a>
                                <a href="/update-commune/{{$commune->IdCommune}}" class="btn btn-info">Update</a>
                                <a href="/delete-commune/{{$commune->IdCommune}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $communes->links()}}
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>