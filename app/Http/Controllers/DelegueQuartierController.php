<?php

namespace App\Http\Controllers;

use App\Models\DelegueQuartier;
use App\Models\Habitant;
use App\Models\Maison;
use App\Models\Quartier;
use Illuminate\Http\Request;

class DelegueQuartierController extends Controller
{
    //

    public function liste_delegueQuartier($IdCommune, $IdQuartier)
    {
        $quartier = Quartier::find($IdQuartier);

        if (!$quartier) {
            return redirect("/lister-quartier/$IdCommune")->with('error', 'Le quartier n\'existe pas.');
        }

        $commune = $quartier->commune->IdCommune;

        if (!$commune) {
            return redirect('/')->with('error', 'La commune n\'existe pas.');
        }

        $maisons = Maison::where("IdQuartier", $IdQuartier)->get();

        if ($maisons->isEmpty()) {
            return redirect("/lister-quartier/$IdCommune/lister-maison/$IdQuartier")->with('error', 'Il n\'y a pas de maisons dans ce quartier.');
        }

        $habitants = Habitant::whereIn("IdMaison", $maisons->pluck('IdMaison'))->get();

        if (empty($habitants)) {
            return redirect("/lister-quartier/$IdCommune")->with('error', 'Aucun habitant trouvé dans les maisons de ce quartier.');
        }

        $delegueQuartiers = DelegueQuartier::whereIn("IdHabitant", $habitants->pluck('IdHabitant'))->paginate(10);

        return view('Communes.Quartiers.DelegueQuartier.lister_delegueQuartier', compact('delegueQuartiers', 'commune', 'quartier', 'maisons', 'habitants'));
    }

    public function ajouter_delegueQuartier($IdCommune, $IdQuartier)
    {
        $quartier = Quartier::find($IdQuartier);

        if (!$quartier) {
            return redirect("/lister-quartier/$IdCommune")->with('error', 'Le quartier n\'existe pas.');
        }

        $commune = $quartier->commune->IdCommune;

        if (!$commune) {
            return redirect('/')->with('error', 'La commune n\'existe pas.');
        }

        $maisons = Maison::where("IdQuartier", $IdQuartier)->get();

        if ($maisons->isEmpty()) {
            return redirect("/lister-quartier/$IdCommune/lister-maison/$IdQuartier")->with('error', 'Il n\'y a pas de maisons dans ce quartier.');
        }

        $habitants = [];

        foreach ($maisons as $maison) {
            $habitantsDeLaMaison = $maison->habitants;
            if ($habitantsDeLaMaison->isNotEmpty()) {
                $habitants = array_merge($habitants, $habitantsDeLaMaison->toArray());
            }
        }

        if (empty($habitants)) {
            return redirect("/lister-quartier/$IdCommune")->with('error', 'Aucun habitant trouvé dans les maisons de ce quartier.');
        }

        return view('Communes.Quartiers.DelegueQuartier.ajouter_delegueQuartier', compact('commune', 'maisons', 'quartier', 'habitants'));
    }

    public function ajouter_delegueQuartier_traitement(Request $request)
    {
        $request->validate([
            'IdDelegue' => 'required',
            'IdHabitant' => 'required',
            'commune' => 'required',
            'IdQuartier' => 'required',
        ]);

        $delegueQuartier = new DelegueQuartier();

        $delegueQuartier->IdDelegue = $request->IdDelegue;
        $delegueQuartier->IdHabitant = $request->IdHabitant;

        $delegueQuartier->save();

        return redirect("/lister-quartier/$request->commune/lister-delegueQuartier/$request->IdQuartier")->with('status', 'Le délégué quartier a bien été ajouté avec succès.');
    }

    public function update_delegueQuartier($IdCommune, $IdQuartier, $IdDelegue)
    {
        $quartier = Quartier::find($IdQuartier);

        if (!$quartier) {
            return redirect("/lister-quartier/$IdCommune")->with('error', 'Le quartier n\'existe pas.');
        }

        $commune = $quartier->commune->IdCommune;

        if (!$commune) {
            return redirect('/')->with('error', 'La commune n\'existe pas.');
        }

        $maisons = Maison::where("IdQuartier", $IdQuartier)->get();

        if ($maisons->isEmpty()) {
            return redirect("/lister-quartier/$IdCommune/lister-maison/$IdQuartier")->with('error', 'Il n\'y a pas de maisons dans ce quartier.');
        }

        $habitants = [];

        foreach ($maisons as $maison) {
            $habitantsDeLaMaison = $maison->habitants;
            if ($habitantsDeLaMaison->isNotEmpty()) {
                $habitants = array_merge($habitants, $habitantsDeLaMaison->toArray());
            }
        }

        if (empty($habitants)) {
            return redirect("/lister-quartier/$IdCommune")->with('error', 'Aucun habitant trouvé dans les maisons de ce quartier.');
        }

        $delegueQuartier = DelegueQuartier::find($IdDelegue);

        return view('Communes.Quartiers.DelegueQuartier.update_delegueQuartier', compact('commune', 'habitants', 'quartier', 'maisons', 'delegueQuartier'));
    }



    public function update_delegueQuartier_traitement(Request $request)
    {
        $request->validate([
            'IdDelegue' => 'required',
            'IdHabitant' => 'required',
            'commune' => 'required',
            'IdQuartier' => 'required',
        ]);

        $delegueQuartier = DelegueQuartier::where('IdDelegue', $request->IdDelegue)->first();

        if (!$delegueQuartier) {
            return redirect("/lister-quartier/$request->commune/lister-delegueQuartier/$request->IdQuartier")->with('error', 'L\'habitant n\'existe pas.');
        }

        $delegueQuartier->IdDelegue = $request->IdDelegue;
        $delegueQuartier->IdHabitant = $request->IdHabitant;


        $delegueQuartier->save();

        return redirect("/lister-quartier/$request->commune/lister-delegueQuartier/$request->IdQuartier")->with('status', 'Le delegue quartier a bien été modifiée avec succès.');
    }


    public function delete_delegueQuartier($IdCommune, $IdQuartier, $IdDelegue)
    {
        $quartier = Quartier::find($IdQuartier);

        if (!$quartier) {
            return redirect("/lister-quartier/$IdCommune")->with('error', 'Le quartier n\'existe pas.');
        }

        $commune = $quartier->commune->IdCommune;

        if (!$commune) {
            return redirect('/')->with('error', 'La commune n\'existe pas.');
        }

        $maisons = Maison::where("IdQuartier", $IdQuartier)->get();

        if ($maisons->isEmpty()) {
            return redirect("/lister-quartier/$IdCommune/lister-maison/$IdQuartier")->with('error', 'Il n\'y a pas de maisons dans ce quartier.');
        }

        $habitant = Habitant::whereIn("IdMaison", $maisons->pluck('IdMaison'))->get();

        if (empty($habitant)) {
            return redirect("/lister-quartier/$IdCommune")->with('error', 'Aucun habitant trouvé dans les maisons de ce quartier.');
        }

        $delegueQuartier = DelegueQuartier::find($IdDelegue);

        if ($delegueQuartier) {
            $delegueQuartier->delete();
            return redirect("/lister-quartier/$commune/lister-delegueQuartier/$quartier->IdQuartier")->with('status', 'Le délégué quartier a bien été supprimé avec succès.');
        } else {
            return redirect("/lister-quartier/$commune/lister-delegueQuartier/$quartier->IdQuartier")->with('error', 'Le délégué quartier n\'existe pas.');
        }
    }
}
