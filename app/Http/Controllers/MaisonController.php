<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Maison;
use App\Models\Commune;
use App\Models\Quartier;

class MaisonController extends Controller
{
    //

    public function liste_maison($IdCommune, $IdQuartier)
    {
        $quartier = Quartier::find($IdQuartier);

        if (!$quartier) {
            return redirect('/')->with('error', 'Le quartier n\'existe pas.');
        }

        $IdCommune = $quartier->commune->IdCommune;

        $maisons = Maison::where("IdQuartier", $IdQuartier)->paginate(10);

        return view('Communes.Quartiers.Maisons.lister_maisons', compact('maisons', 'quartier', 'IdCommune'));
    }



    public function ajouter_maison($IdCommune, $IdQuartier)
    {
        $quartier = Quartier::find($IdQuartier);


        $IdCommune = isset($quartier->IdCommune) ? $quartier->IdCommune : null;

        return view('Communes.Quartiers.Maisons.ajouter_maison', compact('quartier', 'IdCommune'));
    }

    public function ajouter_maison_traitement(Request $request)
    {
        $request->validate([
            'IdQuartier' => 'required',
            'IdMaison' => 'required',
            'surface' => 'required',
            'rue' => 'required',
        ]);


        $quartier = Quartier::find($request->IdQuartier);


        if (!$quartier) {
            return redirect('/')->with('error', 'Le quartier n\'existe pas.');
        }

        $maison = $quartier->maisons()->create([
            'IdMaison' => $request->IdMaison,
            'surface' => $request->surface,
            'rue' => $request->rue,
        ]);

        $IdCommune = isset($quartier->IdCommune) ? $quartier->IdCommune : null;

        return redirect("/lister-quartier/$IdCommune/lister-maison/$request->IdQuartier")->with('status', 'La Maison a bien été ajoutée avec succès.');
    }


    public function update_maison($IdCommune, $IdQuartier, $IdMaison)
    {
        $commune = Commune::find($IdCommune);

        if (!$commune) {
            return redirect('/')->with('error', 'La Commune n\'existe pas.');
        }


        $quartier = Quartier::find($IdQuartier);

        if (!$quartier) {
            return redirect("/lister-quartier/$commune->IdCommune")->with('error', 'Le Quartier n\'existe pas.');
        }

        $maison = Maison::find($IdMaison);

        if (!$maison) {
            return redirect("/lister-quartier/$commune->IdCommune/lister-maison/$IdQuartier")->with('error', 'La maison n\'existe pas.');
        }

        return view('Communes.Quartiers.Maisons.update_maison', compact('commune', 'quartier', 'maison'));
    }



    public function update_maison_traitement(Request $request)
    {
        $request->validate([
            'rue' => 'required',
            'surface' => 'required',
            'IdMaison' => 'required',
            'IdQuartier' => 'required',
            'IdCommune' => 'required',
        ]);

        $maison = Maison::where('IdQuartier', $request->IdQuartier)
            ->where('IdMaison', $request->IdMaison)
            ->first();

        if (!$maison) {
            return redirect("/lister-quartier/$request->IdCommune/lister-maison/$request->IdQuartier")->with('error', 'La maison n\'existe pas.');
        }

        $maison->rue = $request->rue;
        $maison->surface = $request->surface;

        $maison->save();

        return redirect("/lister-quartier/$request->IdCommune/lister-maison/$request->IdQuartier")->with('status', 'La Maison a bien été modifiée avec succès.');
    }




    public function delete_maison($IdCommune, $IdQuartier, $IdMaison)
    {
        $commune = Commune::find($IdCommune);

        if (!$commune) {
            return redirect('/')->with('error', 'La Commune n\'existe pas.');
        }


        $quartier = Quartier::find($IdQuartier);

        if (!$quartier) {
            return redirect("/lister-quartier/$IdCommune")->with('error', 'Le Quartier n\'existe pas.');
        }

        $maison = Maison::find($IdMaison);

        if (!$maison) {
            return redirect("/lister-quartier/$IdCommune/lister-maison/$IdQuartier")->with('error', 'La maison n\'existe pas.');
        }

        $maison->delete();

        return redirect("/lister-quartier/$IdCommune/lister-maison/$IdQuartier")->with('status', 'Le Quartier a bien été supprimé avec succès.');
    }
}
