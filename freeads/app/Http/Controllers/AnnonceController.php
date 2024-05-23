<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;

class AnnonceController extends Controller
{
    /**
     * Enregistrer une nouvelle annonce.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CreationForm');
    }

    public function store(Request $request)
    {
        //Valide les données du formulaire 
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'photographie' => 'required|image',
            'prix' => 'required|numeric',
        ]);

        // Enregistre une annonce dans la base de données
        $annonce = new Annonce();
        $annonce->titre = $request->titre;
        $annonce->description = $request->description;

        // La photo
        if ($request->hasFile('photographie')) {
            $image = $request->file('photographie');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/photographies', $imageName);
            $annonce->photographie = $imageName;
        }
        $annonce->prix = $request->prix;
        $annonce->save();

        // Amene vers une page de succes 
        return back()->with('success', 'Annonce créée avec succès.');
    }

    // Liste des annonces 
    public function liste()
    {
        // Recupre dtout les annonces dna sla bases de donées
        $annonces = Annonce::all();
        return view('ListAnnonce' , ['annonces' => $annonces]);
    }

    // Affiche les annonces de l'utilisateur 
    public function index()
     {
        $annonces = auth()->user()->annonces;
        return view('ListAnnonce', compact('annonces'));
    }

    // Affich le formulaire pour le modifier 
    public function edit(Annonce $annonce)
    {
        return view('EditAnnonce', compact('annonce'));
    }

    // Mettre à jour une annonce 
    public function update(Request $request, Annonce $annonce)
    {
        $annonce->update($request->all());
        return redirect()->route('ListAnnonce')->with('success', 'Annonce mise à jour avec succès.');
    }

    // Suprrimer une annonce
    public function destroy(Annonce $annonce){
        $annonce->delete();
        return redirect()->route('ListAnnonce')->with('success', 'Annonce supprimée avec succès.');
    }
}
