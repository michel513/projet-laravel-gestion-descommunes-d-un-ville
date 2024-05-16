<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD APP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="d-flex flex-column ">
    <div class="d-flex justify-content-between bg-body-tertiary p-100">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Commune</a>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="#">Quartier</a>
                        <a class="nav-link" href="#">Maison</a>
                        <a class="nav-link" href="#">Delegue Quartier</a>
                        <a class="nav-link " href="#">Habitants</a>
                    </div>
                </div>
            </div>
        </nav>
        <nav class="navbar">
            <div class="container-fluid">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </div>

    <div class="container-fluid text-center mt-3 ">
        <div class="row">
            <div class="col s12">

                <h1>Liste des quartiers de la commune {{$commune->IdCommune}}</h1>
                <hr>
                <br>
                <a href="/lister-quartier/{{$commune->IdCommune}}/ajouter/quartier" class="btn btn-primary">Ajouter un Quartier </a>
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

                <table class="table w-100">
                    <thead class="table-dark">
                        <tr>
                            <th># Numéro Quartier</th>
                            <th>Nom Quartier</th>
                            <th>Numéro de la commune</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($quartiers as $quartier)
                        <tr>
                            <td>{{$quartier->IdQuartier}}</td>
                            <td>{{$quartier->nomQuartier}}</td>
                            <td>{{$quartier->IdCommune}}</td>
                            <td>
                                <a href="/lister-quartier/{{$commune->IdCommune}}/lister-maison/{{$quartier->IdQuartier}}" class="btn btn-secondary">Voir les maisons</a>
                                <a href="/lister-quartier/{{$commune->IdCommune}}/lister-delegueQuartier/{{$quartier->IdQuartier}} " class="btn btn-primary">Voir le Delegue de quariter</a>
                                <a href="/lister-quartier/{{$commune->IdCommune}}/update-quartier/{{$quartier->IdQuartier}}" class="btn btn-info">Update</a>
                                <a href="/lister-quartier/{{$commune->IdCommune}}/delete-quartier/{{$quartier->IdQuartier}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $quartiers->links()}}


                <br>
                <a href="/" class="btn btn-primary">Revenir à la liste des Communes </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>