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
                <h1 class="text-center">MODIFIER un Habitant</h1>
                <hr>

                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

                <form action="/lister-quartier/{{$commune->IdCommune}}/lister-maison/{{$quartier->IdQuartier}}/lister-habitant/{{$maison->IdMaison}}/update-habitant/{{$habitant->IdHabitant}}/traitement" method="POST" class="form-group">
                    @csrf
                    @method('POST')

                    <input type="hidden" name="IdHabitant" value="{{ $habitant->IdHabitant}}">


                    <div class="mb-3">
                        <label for="nomHabitant" class="form-label">nom de l'habitant </label>
                        <input type="text" class="form-control" id="nomHabitant" name="nomHabitant" value="{{ $habitant->nomHabitant }}">
                    </div>

                    <div class="mb-3">
                        <label for="PrenomHabitant" class="form-label">Prenom de l'habitant </label>
                        <input type="text" class="form-control" id="PrenomHabitant" name="PrenomHabitant" value="{{ $habitant->PrenomHabitant }}">
                    </div>

                    <div class="mb-3">
                        <label for="telephone" class="form-label">Numéro de téléphone de l'habitant </label>
                        <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $habitant->telephone }}">
                    </div>

                    <input type="hidden" name="IdQuartier" value="{{ $habitant->IdMaison }}">

                    <input type="hidden" name="IdCommune" value="{{ $commune->IdCommune }}">

                    <input type="hidden" name="IdMaison" value="{{ $maison->IdMaison }}">


                    <button type="submit" class="btn btn-primary">MODIFIER l'habitant</button>
                    <a href="/lister-quartier/{{$commune->IdCommune}}/lister-maison/{{$quartier->IdQuartier}}/lister-habitant/{{$maison->IdMaison}}" class="btn btn-danger">Revenir à la liste des habitants</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>