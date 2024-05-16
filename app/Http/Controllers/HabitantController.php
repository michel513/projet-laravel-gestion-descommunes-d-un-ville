<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Habitant;
use App\Models\Commune;
use App\Models\Maison;
use App\Models\Quartier;

class HabitantController extends Controller
{
    //

    public function liste_habitant($IdCommune, $IdQuartier, $IdMaison)
    {
        $maison = Maison::find($IdMaison);

        if (!$maison) {
            return redirect()->back()->with('error', 'La maison n\'existe pas.');
        }

        $quartier = Quartier::find($IdQuartier);

        if (!$quartier) {
            return redirect()->back()->with('error', 'Le quartier n\'existe pas.');
        }

        $commune = Commune::find($IdCommune);

        if (!$commune) {
            return redirect()->back()->with('error', 'La commune n\'existe pas.');
        }

        $habitants = Habitant::where("IdMaison", $IdMaison)->paginate(10);

        return view('Communes.Quartiers.Maisons.Habitants.lister_habitants', compact('habitants', 'maison', 'quartier', 'commune'));
    }


    public function ajouter_habitant($IdCommune, $IdQuartier, $IdMaison)
    {
        $maison = Maison::find($IdMaison);

        if (!$maison) {
        }

        $quartier = Quartier::find($IdQuartier);

        if (!$quartier) {
        }

        $commune = Commune::find($IdCommune);

        if (!$commune) {
        }


        return view('Communes.Quartiers.Maisons.Habitants.ajouter_habitant', compact("maison", "commune", 'quartier'));
    }



    public function ajouter_habitant_traitement(Request $request)
    {

        $request->validate([
            'IdHabitant' => 'required',
            'nomHabitant' => 'required',
            'PrenomHabitant' => 'required',
            'telephone' => 'required',
            'IdMaison' => 'required',
            'IdCommune' => 'required',
            'IdQuartier' => 'required'
        ]);

        $habitant = new Habitant();
        $habitant->IdHabitant = $request->IdHabitant;
        $habitant->nomHabitant = $request->nomHabitant;
        $habitant->PrenomHabitant = $request->PrenomHabitant;
        $habitant->telephone = $request->telephone;
        $habitant->IdMaison = $request->IdMaison;


        if (!Habitant::where('IdHabitant', $habitant->IdHabitant)->exists()) {
            $habitant->save();
            return redirect("/lister-quartier/$request->IdCommune/lister-maison/$request->IdQuartier/lister-habitant/$request->IdMaison")->with('status', 'L\'habitant a bien été modifiée avec succès.');
        } else {
            return redirect("/lister-quartier/$request->IdCommune/lister-maison/$request->IdQuartier/lister-habitant/$request->IdMaison/ajouter/habitant")->with('error', 'L\'Habitant avec cet IdHabitant existe déjà.');
        }

        return redirect("/lister-quartier/$request->IdCommune/lister-maison/$request->IdQuartier/lister-habitant/$request->IdMaison")->with('status', 'L\'Habitant a bien été ajouté avec succées.');
    }

    public function update_habitant($IdCommune, $IdQuartier, $IdMaison, $IdHabitant)
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

        $habitant = Habitant::find($IdHabitant);

        if (!$habitant) {
            return redirect("/lister-quartier/$commune->IdCommune/lister-maison/$IdQuartier/lister-habitant/$IdMaison")->with('error', 'L\'habitant n\'existe pas.');
        }

        return view('Communes.Quartiers.Maisons.Habitants.update_habitant', compact('commune', 'quartier', 'maison', 'habitant'));
    }

    public function update_habitant_traitement(Request $request)
    {

        $request->validate([
            'IdHabitant' => 'required',
            'nomHabitant' => 'required',
            'PrenomHabitant' => 'required',
            'telephone' => 'required',
            'IdQuartier' => 'required',
            'IdCommune' => 'required',
        ]);

        $habitant = Habitant::where('IdMaison', $request->IdMaison)->first();

        if (!$habitant) {
            return redirect("/lister-quartier/$request->IdCommune/lister-maison/$request->IdQuartier/lister-habitant/$request->IdMaison")->with('error', 'L\'habitant n\'existe pas.');
        }

        $habitant->nomHabitant = $request->nomHabitant;
        $habitant->PrenomHabitant = $request->PrenomHabitant;
        $habitant->telephone = $request->telephone;

        $habitant->save();

        return redirect("/lister-quartier/$request->IdCommune/lister-maison/$request->IdQuartier/lister-habitant/$request->IdMaison")->with('status', 'L\'habitant a bien été modifiée avec succès.');
    }

    public function delete_habitant($IdCommune, $IdQuartier, $IdMaison, $IdHabitant)
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

        $habitant = Habitant::find($IdHabitant);

        if (!$habitant) {
            return redirect("/lister-quartier/$IdCommune/lister-maison/$IdQuartier/lister-habitant/$IdMaison")->with('error', 'L\'habitant n\'existe pas.');
        }

        $habitant->delete();

        return redirect("/lister-quartier/$IdCommune/lister-maison/$IdQuartier/lister-habitant/$IdMaison")->with('status', 'L\'habitant a bien été supprimé avec succès.');
    }
}
