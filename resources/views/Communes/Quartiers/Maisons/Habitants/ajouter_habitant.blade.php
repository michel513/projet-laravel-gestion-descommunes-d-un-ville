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
                <h1 class="text-center">Ajouter un Habitant </h1>
                <hr>

                @if (session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
                @endif


                <form action="/lister-quartier/{{$commune->IdCommune}}/lister-maison/{{$quartier->IdQuartier}}/lister-habitant/{{$maison->IdMaison}}/ajouter/habitant/traitement" method="POST" class="from-group">
                    @csrf

                    @method('POST')

                    <div class="mb-3">
                        <label for="IdHabitant" class="form-label">id Habitant</label>
                        <input type="text" class="form-control" id="IdHabitant" name="IdHabitant">
                    </div>
                    <div class="mb-3">
                        <label for="nomHabitant" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nomHabitant" name="nomHabitant">
                    </div>

                    <div class="mb-3">
                        <label for="PrenomHabitant" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="PrenomHabitant" name="PrenomHabitant">
                    </div>

                    <div class="mb-3">
                        <label for="telephone" class="form-label">telephone</label>
                        <input type="text" class="form-control" id="telephone" name="telephone">
                    </div>

                    <div class="mb-3">
                        <label for="IdMaison" class="form-label">IdMaison</label>
                        <input type="text" class="form-control" id="IdMaison" name="IdMaison" value="{{$maison->IdMaison}}" readonly>
                    </div>

                    <input type="text" name="IdCommune" id="IdCommune" value="{{$commune->IdCommune}}" hidden>

                    <input type="text" name="IdQuartier" id="IdQuartier" value="{{$quartier->IdQuartier}}" hidden>

                    <button type="submit" class="btn btn-primary">Ajouter un Habitant</button>
                    <a href="/lister-quartier/{{$commune->IdCommune}}/lister-maison/{{$quartier->IdQuartier}}/lister-habitant/{{$maison->IdMaison}}" class="btn btn-danger"> Revenir à la liste des Habitants </a>


                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>