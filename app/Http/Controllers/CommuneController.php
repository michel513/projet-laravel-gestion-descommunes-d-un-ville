<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use Illuminate\Http\Request;

class CommuneController extends Controller
{
    //

    public function liste_commune()
    {
        $communes = Commune::all();
        return view('Quartiers.ajouter_commune', compact('communes'));
    }

    public function ajouter_commune()
    {
        return view('Communes.ajouter_commune');
    }

    public function ajouter_commune_traitement(Request $request)
    {

        $request->validate([
            'IdCommune' => 'required',
            'NomCommune' => 'required',
        ]);


        $existingCommune = Commune::where('IdCommune', $request->IdCommune)->first();

        if ($existingCommune) {
            return redirect('/')->with('error', 'L\'IdCommune existe déjà.');
        } else {
            $commune = new Commune();
            $commune->IdCommune = $request->IdCommune;
            $commune->NomCommune = $request->NomCommune;
            $commune->save();

            return redirect('/')->with('status', 'La Commune a bien été ajoutée avec succès.');
        }
    }

    public function update_commune($IdCommune)
    {
        $commune = Commune::find($IdCommune);
        return view('Communes.update_commune', compact('commune'));
    }

    public function update_commune_traitement(Request $request)
    {
        $request->validate([
            'NomCommune' => 'required',
        ]);

        $commune = Commune::find($request->IdCommune);

        $commune->NomCommune = $request->NomCommune;

        $commune->update();

        return redirect('/')->with('status', 'La Commmune a bien été modifier avec succées.');
    }

    public function delete_commune($IdCommune)
    {
        $commune = Commune::find($IdCommune);
        $commune->delete();

        return redirect('/')->with('status', 'La Commmune a bien été Supprimer avec succées.');
    }
}
