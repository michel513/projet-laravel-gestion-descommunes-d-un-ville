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
                <h1 class="text-center">Ajouter un Delegue de Quartier</h1>
                <hr>

                @if (session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
                @endif


                <form action="/lister-quartier/{{$commune}}/lister-delegueQuartier/{{$quartier->IdQuartier}}/ajouter/quartier/traitement" method="POST" class="from-group">
                    @csrf
                    <div class="mb-3">
                        <label for="IdDelegue" class="form-label">Id Delegue Quartier</label>
                        <input type="text" class="form-control" id="IdDelegue" name="IdDelegue">
                    </div>
                    Id Habitant :

                    <select name="IdHabitant" id="" class="form-select" aria-label="Default select example">

                        @foreach ($habitants as $habitant)

                        <option value="{{ $habitant['IdHabitant'] }}">{{ $habitant['IdHabitant'] }}</option>

                        @endforeach
                    </select>

                    <input type="text" class="form-control" id="commune" name="commune" value="{{$commune}}" hidden>
                    <input type="text" class="form-control" id="IdQuartier" name="IdQuartier" value="{{$quartier->IdQuartier}}" hidden>

                    <br>

                    <button type="submit" class="btn btn-primary">Ajouter un Delegue Quartier</button>
                    <a href="/lister-quartier/{{$commune}}/lister-delegueQuartier/{{$quartier->IdQuartier}}" class="btn btn-danger"> Revenir à la liste du deleque Quartier </a>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>