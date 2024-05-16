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
                <h1 class="text-center">MODIFIER une Commune LARAVEL 10</h1>
                <hr>

                @if (session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
                @endif


                <form action="/update/traitement" method="POST" class="from-group">
                    @csrf

                    <input type="text" name="IdCommune" style="display: none;" value="{{ $commune->IdCommune }}">

                    <div class="mb-3">
                        <label for="NomCommune" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="NomCommune" name="NomCommune" value="{{ $commune->NomCommune }}">
                    </div>

                    <button type="submit" class="btn btn-primary">MODIFIER une Commune</button>
                    <a href="/" class="btn btn-danger"> Revenir à la liste des Communes </a>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>