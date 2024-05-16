<?php

namespace App\Http\Controllers;

use App\Models\Quartier;
use App\Models\Commune;
use Illuminate\Http\Request;

class QuartierController extends Controller
{

    public function liste_quartier($IdCommune)
    {

        $commune = Commune::find($IdCommune);

        if (!$commune) {
            return redirect('/')->with('error', 'La Commune n\'existe pas.');
        }

        $quartiers = Quartier::where('IdCommune', $IdCommune)->paginate(10);

        return view('Communes.Quartiers.lister_quartiers', compact('quartiers', 'commune'));
    }

    public function ajouter_quartier($IdCommune)
    {
        $commune = Commune::find($IdCommune);
        return view('Communes.Quartiers.ajouter_quartier')->with('commune', $commune);
    }


    public function ajouter_quartier_traitement(Request $request)
    {
        $request->validate([
            'IdQuartier' => 'required',
            'nomQuartier' => 'required',
            'IdCommune' => 'required',
        ]);

        $commune = Commune::find($request->IdCommune);

        if (!$commune) {
            return redirect('/ajouter/commune/quartier')->with('error', 'La commune n\'existe pas.');
        }

        $quartier = $commune->quartiers()->create([
            'IdQuartier' => $request->IdQuartier,
            'nomQuartier' => $request->nomQuartier,
        ]);


        return redirect("/lister-quartier/$request->IdCommune")->with('status', 'Le quartier a bien été ajouté avec succès.');
    }

    public function update_quartier($IdCommune, $IdQuartier)
    {
        $commune = Commune::find($IdCommune);
        $quartier = Quartier::find($IdQuartier);
        return view('Communes.Quartiers.update_quartier', compact('commune', 'quartier'));
    }

    public function update_quartier_traitement(Request $request)
    {
        $request->validate([
            'nomQuartier' => 'required',
            'IdCommune' => 'required',
            'IdQuartier' => 'required',
        ]);

        $quartier = Quartier::where('IdQuartier', $request->IdQuartier)
            ->where('IdCommune', $request->IdCommune)
            ->first();

        $quartier->nomQuartier = $request->nomQuartier;

        $quartier->save();

        return redirect("/lister-quartier/$request->IdCommune")->with('status', 'Le Quartier a bien été modifié avec succès.');
    }

    public function delete_quartier($IdCommune, $IdQuartier)
    {

        $commune = Commune::find($IdCommune);

        if (!$commune) {
            return redirect('/')->with('error', 'La Commune n\'existe pas.');
        }


        $quartier = Quartier::find($IdQuartier);

        if (!$quartier) {
            return redirect("/lister-quartier")->with('error', 'Le Quartier n\'existe pas.');
        }

        $quartier->delete();

        return redirect("/lister-quartier/$IdCommune")->with('status', 'Le Quartier a bien été supprimé avec succès.');
    }
}
