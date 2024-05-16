<!doctype html>
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
                <h1 class="text-center">Ajouter une Maison</h1>
                <hr>

                @if (session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
                @endif


                <form action="/lister-quartier/{{$IdCommune}}/lister-maison/{{$quartier->IdQuartier}}/ajouter/maison/traitement" method="POST" class="from-group">
                    @csrf
                    <div class="mb-3">
                        <label for="IdMaison" class="form-label">Id Maison</label>
                        <input type="text" class="form-control" id="IdMaison" name="IdMaison">
                    </div>

                    <div class="mb-3">
                        <label for="surface" class="form-label">Surface</label>
                        <input type="text" class="form-control" id="surface" name="surface">
                    </div>

                    <div class="mb-3">
                        <label for="rue" class="form-label">rue</label>
                        <input type="text" class="form-control" id="rue" name="rue">
                    </div>

                    <div class="mb-3">
                        <label for="IdQuartier" class="form-label">ID Quartier</label>
                        <input type="text" class="form-control" id="IdQuartier" name="IdQuartier" value="{{ $quartier->IdQuartier }}" readonly>
                    </div>

                    <button type="submit" class="btn btn-primary">Ajouter un Maison</button>
                    <a href="/lister-quartier/{{$IdCommune}}/lister-maison/{{$quartier->IdQuartier}}" class="btn btn-danger"> Revenir à la liste des Maisons </a>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>