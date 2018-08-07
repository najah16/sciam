<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use Illuminate\Support\Facades\DB;
use App\Visiteur;
use App\Visite;
use App\Direction;
use App\Etage;
use App\DirectionEtage;
use App\Hote;
use Illuminate\Support\Facades\Auth;

class creer_visiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
    	return view ('pages.creer_visite');
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
     // fonction ajax pour recuperer les informations de l'hote
    public function hote(Request $request)
    {
        $query = $request->get('term','');
        $hotes = Hote::where('nom_prenom_hote','LIKE','%'.$query.'%')->get();      
        $data=array();
        foreach ($hotes as $hote) {
                $direction_hote = Direction::find($hote->direction_id);
                $data[]=array('nom_hote'=>$hote->nom_prenom_hote,
                    'direction'=>$direction_hote->lib_direction);
        }
        return response()->json($data);
    }
    // enregistrer les visites
    public function store(StoreRequest $request)
    {
    	   
            $jour = date("Y-m-d");
            $heure = date("H:i:s");
            // enregsiter un etage
            $etage = Etage::where('lib_etage','=',$request->lib_etage)->first();
            if(empty($etage))   
            {
                $etage = Etage::create([
                'lib_etage' => $request->lib_etage
                ]);
                $max_etage = Etage::max('id');
                 session(['nouveauEtage_id' => $max_etage
                ]);
            } 
             else 
            {
                
                $etage_p = Etage::find($etage->id);
                $etage_p->updated_at = date("Y-m-d H:i:s");
                $etage_p->save();
                session(['nouveauEtage_id' => $etage->id
                ]);
            }
            // enregistrer une direction
            $direction = Direction::where('lib_direction','=',$request->lib_direction)->first();
                if(empty($direction))
                {
                    
                    $direction = Direction::create([
                    'lib_direction' => $request->lib_direction,
                    'contact_direction' =>$request->contact_direction 
                    ]);
                    $max_direction = Direction::max('id');
                    session(['nouvelDirection_id' => $max_direction
                    ]);
                    // liaison des deux migrations directions et etages 
                    $direction_etage_id = DB::table('direction_etage')->insert(
                            ['etage_id' => session('nouveauEtage_id'),
                            'direction_id' => session('nouvelDirection_id'),
                            'created_at' => date("Y-m-d H:i:s"),
                            'updated_at' => date("Y-m-d H:i:s")]
                        );
                }
                else
                {
                    
                    $direction_p = Direction::find($direction->id);
                    $direction_p->updated_at = date("Y-m-d H:i:s");
                    $direction_p->save();
                    session(['nouvelDirection_id' => $direction->id
                    ]);
                    $direction_etage = DB::table('direction_etage')->where('etage_id','=',session('nouveauEtage_id'))
                                        ->where('direction_id','=',session('nouvelDirection_id'))->first();
                    if(empty($direction_etage))
                    {
                        // liaison des deux migrations directions et etages 
                    $direction_etage = DB::table('direction_etage')->insert(
                            ['etage_id' => session('nouveauEtage_id'),
                            'direction_id' => session('nouvelDirection_id'),
                            'created_at' => date("Y-m-d H:i:s"),
                            'updated_at' => date("Y-m-d H:i:s")]
                        );
                    }
                    else
                    {
                        $direction_etage_p = DB::table('direction_etage')->where('id','=',$direction_etage->id)
                                                  ->update(['updated_at' => date("Y-m-d H:i:s")]);
                         
                    }
                }
            // enregistrer un hote
            $hote = Hote::where('direction_id','=',session('nouvelDirection_id'))
                        ->where('nom_prenom_hote','=',$request->nom_prenom_hote)->first();
               if(empty($hote))
               {
                $hote = Hote::create([
                                    'nom_prenom_hote' =>$request->nom_prenom_hote
                                ]);
                           $max_hote = Hote::max('id');
                           session(['hote_id' => $max_hote
                            ]);
                           $hote_max = Hote::find($max_hote);
                           $hote_max->direction_id = session('nouvelDirection_id');
                           $hote_max->save();
                           $visite_hote = Visite::create([
                                'date_visite' => $jour,
                               'heure_entre' => $heure,
                               'hote_id' => $max_hote
                            ]);
               }
               else
               {
                $hote_p = Hote::find($hote->id);
                $hote_p->updated_at = date("Y-m-d H:i:s");
                $hote_p->save();
                session(['hote_id' => $hote->id
                            ]);
                $visite_hote = Visite::create([
                                'date_visite' => $jour,
                               'heure_entre' => $heure,
                               'hote_id' => $hote->id
                            ]);
               }
            // enregistrer un visiteur
            $visiteur_trouve =  Visiteur::where('num_piece','=',$request->num_piece)->first();
                if(empty($visiteur_trouve))
                {
                    $nouveau_visiteur = Visiteur::create([
                            'num_piece' => $request->num_piece,
                            'type_piece' => $request->type_piece,
                            'nom' => $request->nom,
                            'prenoms' => $request->prenoms,
                            'contact' => $request->contact,
                            'badge' => $request->badge
                        ]);
                    $max_visiteur = Visiteur::max('id');
                     session(['visiteur_id' => $max_visiteur
                    ]);
                    $visite = Visite::where('visiteur_id','=',NULL)->where('hote_id','=',session('hote_id'))->first();
                    $visite->visiteur_id = session('visiteur_id');
                    $visite->nom_hotesse = Auth::user()->name;
                    $visite->save();
                   //$request->session()->flash('message.level', 'success');
                  
                   }
                   else
                {
                   session(['visiteur_id' => $visiteur_trouve->id,
                        'num_piece' => $visiteur_trouve->num_piece,
                        'type_piece' => $visiteur_trouve->type_piece,
                        'nom' => $visiteur_trouve->nom,
                        'prenoms' => $visiteur_trouve->prenoms,
                        'contact' => $visiteur_trouve->contact,
                        'badge' => $visiteur_trouve->badge
                    ]);
                   $visiteur = Visiteur::find($visiteur_trouve->id);
                   $visiteur->updated_at = date("Y-m-d H:i:s");
                   $visiteur->save();
                    $visite = Visite::where('visiteur_id','=',NULL)->where('hote_id','=',session('hote_id'))->first();
                    $visite->visiteur_id = session('visiteur_id');
                    $visite->nom_hotesse = Auth::user()->name;
                    $visite->save();
                   //$request->session()->flash('message.update', 'success');
                   
                }
            return back();
    }
}
