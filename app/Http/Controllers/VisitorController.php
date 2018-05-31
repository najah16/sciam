<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VisiteurRequest;
use App\Visiteur;
use App\Visite;
use Validator;
class VisitorController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    // afficher la vue 
     public function show()
    {
    	return view('pages.visitor_register');
    }
    // fontion ajax pour recherher les visiteurs 
    public function search(Request $request)
    {
        $query = $request->get('term','');
        $visiteurs = Visiteur::where('num_piece','LIKE','%'.$query.'%')->get();      
        $data=array();
        foreach ($visiteurs as $visiteur) {
                $data[]=array('num_piece'=>$visiteur->num_piece,'nom'=>$visiteur->nom,'prenoms'=>$visiteur->prenoms,'contact'=>$visiteur->contact);
        }
        return response()->json($data);
    }
    // enregistrer une visite 
     public function store(VisiteurRequest $request)
    {
           
           $jour = date("Y-m-d");
            $heure = date("H:i:s");
            $visiteur_trouve =  Visiteur::where('num_piece','=',$request->num_piece)->first();
            if(empty($visiteur_trouve))
            {
                $nouveau_visiteur = Visiteur::create([
                        'num_piece' => $request->num_piece,
                        'type_piece' => $request->type_piece,
                        'nom' => $request->nom,
                        'prenoms' => $request->prenoms,
                        'contact' => $request->contact
                    ]);
                $max = Visiteur::max('id');
                 session(['visiteur_id' => $max
                ]);
                $nouvelle_visite = Visite::create([
                   // 'code_visite' => NULL,
                    'date_visite' => $jour,
                    'heure_entre' => $heure,
                    'visiteur_id' => $max
                    ]);
               //$request->session()->flash('message.level', 'success');
               return response()->json($nouveau_visiteur);
               }
            else
            {
               session(['visiteur_id' => $visiteur_trouve->id,
                    'num_piece' => $visiteur_trouve->num_piece,
                    'type_piece' => $visiteur_trouve->type_piece,
                    'nom' => $visiteur_trouve->nom,
                    'prenoms' => $visiteur_trouve->prenoms,
                    'contact' => $visiteur_trouve->contact
                ]);
                $nouvelle_visite = Visite::create([
                    'date_visite' => $jour,
                    'heure_entre' => $heure,
                         'visiteur_id' => $visiteur_trouve->id
                    ]);
               //$request->session()->flash('message.update', 'success');
               return response()->json();
            }
    }

}
