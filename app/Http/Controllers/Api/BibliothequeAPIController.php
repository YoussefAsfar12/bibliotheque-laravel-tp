<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Emprunt;
use App\Models\Livre;
use Illuminate\Http\Request;

class BibliothequeAPIController extends Controller
{
    public function rechercher($auteurId)
    {
        $livres = Livre::where('auteur_id', $auteurId)->get();
        if($livres->isEmpty()) {
            return response()->json(['message' => 'Auteur non trouvé'], 404);
        }
        return response()->json($livres, 200);
    }

    public function emprunter(Request $request)
    {
        $request->validate([
            'livre_id' => 'required|exists:livres,id',
            'date_emprunt' => 'required|date',
            'date_retour' => 'required|date',
        ]);
    if(Emprunt::where('livre_id', $request->livre_id)->exists()) {
        return response()->json(['message' => 'Livre déjà emprunte'], 409);
    }
        Emprunt::create([
            'livre_id' => $request->livre_id,
            'date_emprunt' => $request->date_emprunt,
            'date_retour' => $request->date_retour,
        ]);
    
        return response()->json(['message' => 'Emprunt ajouté avec succès'], 201);
    }
}
