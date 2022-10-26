<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Classe;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    //
   public function index() {
    //on recupere la liste des etudiant par ordre alphabetique
    $etudiants=Etudiant::orderBy("nom","asc")->paginate(5);
        return view('etudiant',compact("etudiants"));
    }
    public function create() {
     $classes=Classe::all();
         return view('createEtudiant',compact("classes"));
     }
     public function store(Request $request){
        $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "classe_id"=>"required"
        ]);
        //une facon d'insere les donner en utilisant le filable dans la table etudiant
        //Etudiants::create($request->all());
        //une autre facon de faire simple
        Etudiant::create([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "classe_id"=>$request->classe_id
        ]);
        return back()->with("success","etudiant ajouter avec success!");
     }

        public function delete(Etudiant $etudiant){
            $nom_complet=$etudiant->nom." ".$etudiant->prenom;
            $etudiant->delete();
            return back()->with("successDelete","L'etudiant '$nom_complet' suprimer avec success!");
        }
        
     public function update(Request $request,Etudiant $etudiant){
        $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "classe_id"=>"required"
        ]);
        //une facon d'insere les donner en utilisant le filable dans la table etudiant
        //Etudiants::create($request->all());
        //une autre facon de faire simple
        $etudiant->update([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "classe_id"=>$request->classe_id
        ]);
        return back()->with("success","etudiant mis a jour avec success!");
     }
     //fonction edit lorsqu'on clic sur le bouton editer
     
    public function edit(Etudiant $etudiant) {
        $classes=Classe::all();
        return view('editEtudiant',compact("etudiant","classes"));
    }
}
