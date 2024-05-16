<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD APP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1 class="text-center">Ajouter un Quartier</h1>
                <hr>

                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

                <form action="/lister-quartier/{{$commune->IdCommune}}/ajouter/quartier/traitement" method="POST" class="form-group">
                    @csrf

                    <div class="mb-3">
                        <label for="IdQuartier" class="form-label">ID Quartier</label>
                        <input type="text" class="form-control" id="IdQuartier" name="IdQuartier" required>
                    </div>

                    <div class="mb-3">
                        <label for="nomQuartier" class="form-label">Nom Quartier</label>
                        <input type="text" class="form-control" id="nomQuartier" name="nomQuartier" required>
                    </div>

                    <div class="mb-3">
                        <label for="IdCommune" class="form-label">ID Commune</label>
                        <input type="text" class="form-control" id="IdCommune" name="IdCommune" value="{{ $commune->IdCommune }}" readonly>
                    </div>

                    <button type="submit" class="btn btn-primary">Ajouter un Quartier</button>
                    <a href="/lister-quartier/{{ $commune->IdCommune }}" class="btn btn-danger">Revenir à la liste des Quartiers</a>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>