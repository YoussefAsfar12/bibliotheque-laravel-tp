<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BibliothequeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function rechercher($auteurId)
    {
        $livres = Livre::with('auteur')->where('auteur_id', $auteurId)->paginate(10);
        return view('rechercher', compact('livres'));
    }

    public function editer($id)
    {

        $livre = Livre::find($id);


        return view('editer', compact('livre'));
    }

    public function modifier(Request $request, $id)
    {
        $rules = [
            'titre' => 'required|string|starts_with:1',
            'annee_publication' => 'required|integer|min:2001',
            'nombre_pages' => 'required|integer|min:50',
        ];
    

        $validator = Validator::make($request->all(), $rules);
    
        

        $livre = Livre::findOrFail($id);

        $livre->titre = $request->input('titre');
        $livre->annee_publication = $request->input('annee_publication');
        $livre->nombre_pages = $request->input('nombre_pages');
        $livre->save();
    
        return redirect()->route("livre.rechercher", $livre->auteur_id)->with('success', 'Livre modifié avec succès.');
    }

}
