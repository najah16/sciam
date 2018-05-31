<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Etage;
use App\Direction;
use App\DirectionEtage;
use App\Hote;
use App\Visite;
use App\Http\Requests\HoteRequest;

class HoteController extends Controller
{
    protected $fillable = ['lib_etage','lib_direction','contact_direction','nom_hote','prenoms_hote'];

    // autocomplete function 
   /* public function search(Request $request)
    {
      $query = $request->get('term','');
      $hotes = Hote::where('nom_hote','LIKE','%'.$query.'%')->get();
      $data = array();
      foreach ($hotes as $hote) {
        $result[]=array('prenom'=>$hote->prenoms_hote);
      }
      return response()->json($data);
    }*/
    
    // store function 
    public function store(HoteRequest $request)
    {
        
        $etage_trouve =  Etage::where('lib_etage','=',$request->lib_etage)->first();
        if (empty($etage_trouve)) 
            {
                $etage = Etage::create([
                'lib_etage' => $request->lib_etage
                ]);
                $max = Etage::max('id');
                 session(['nouveauEtage_id' => $max
                ]);
                 // rechercher la direction de cet etage 
                $direction_trouve = Direction::where('lib_direction','=',$request->lib_direction)->first();
                if (empty($direction_trouve)) 
                { 
                    // enregistrer la direction 
                    $direction = Direction::create([
                    'lib_direction' => $request->lib_direction,
                    'contact_direction' =>$request->contact_direction 
                    ]);
                    $max_d = Direction::max('id');
                    session(['nouvelDirection_id' => $max_d
                    ]);
                    // liaison des deux migrations directions et etages 
                    $direction_etage = DirectionEtage::create([
                            'etage_id' => session('nouveauEtage_id'),
                            'direction_id' => session('nouvelDirection_id')
                        ]);
                     // verifiez si l'hote existe deja dans la direction car un hote ne peut etre que dans une seule direction 
                        $hote_trouve =  Hote::where('direction_id','=',session('nouvelDirection_id'))
                        ->where('nom_hote','=',$request->nom_hote)
                        ->where('prenoms_hote','=',$request->prenoms_hote)->first();
                        if (empty($hote_trouve)) 
                        {
                            // creation de l'hote
                           $hote = Hote::create([
                                    'nom_hote' =>$request->nom_hote,
                                    'prenoms_hote' =>$request->prenoms_hote,
                                    //'direction_id' =>session('nouvelDirection_id')
                                ]);
                           $max_h = Hote::max('id');
                           session(['hote_id' => $max_h
                            ]);
                           $hote_max = Hote::find($max_h);
                           $hote_max->direction_id = session('nouvelDirection_id');
                           $hote_max->save();
                           $visite_hote = Visite::where('hote_id','=',NULL)->where('visiteur_id','=',session('visiteur_id'))->first();
                           $visite_hote->hote_id = session('hote_id');
                           $visite_hote->save();
                           // $request->session()->flash('message.level', 'success');
                            return redirect()->route('visite_list');
                           
                        }

                }
            }
            else
            {
                $etage = Etage::find($etage_trouve->id);
                $etage->updated_at = date("Y-m-d H:i:s");
                $etage->save();
                $direction_trouve = Direction::where('lib_direction','=',$request->lib_direction)->first();
                if (empty($direction_trouve)) {
                    // enregistrer la direction 
                    $direction = Direction::create([
                    'lib_direction' => $request->lib_direction,
                    'contact_direction' =>$request->contact_direction 
                    ]);
                    $max_d = Direction::max('id');
                    session(['nouvelDirection_id' => $max_d
                    ]);
                    // liaison des deux migrations directions et etages 
                    $direction_etage = DirectionEtage::create([
                            'etage_id' => session('nouveauEtage_id'),
                            'direction_id' => session('nouvelDirection_id')
                        ]);
                    // verifiez si l'hote existe deja dans la direction car un hote ne peut etre que dans une seule direction 
                        $hote_trouve =  Hote::where('direction_id','=',session('nouvelDirection_id'))
                        ->where('nom_hote','=',$request->nom_hote)
                        ->where('prenoms_hote','=',$request->prenoms_hote)->first();
                        if(empty($hote_trouve))
                        {
                                 // creation de l'hote
                           $hote = Hote::create([
                                    'nom_hote' =>$request->nom_hote,
                                    'prenoms_hote' =>$request->prenoms_hote,
                                    //'direction_id' =>session('nouvelDirection_id')
                                ]);
                           $max_h = Hote::max('id');
                           session(['hote_id' => $max_h
                            ]);
                           $hote_max = Hote::find($max_h);
                           $hote_max->direction_id = session('nouvelDirection_id');
                           $hote_max->save();
                           $visite_hote = Visite::where('hote_id','=',NULL)->where('visiteur_id','=',session('visiteur_id'))->first();
                           $visite_hote->hote_id = session('hote_id');
                           $visite_hote->save();
                           // $request->session()->flash('message.level', 'success');
                            return redirect()->route('visite_list');
                        }
                }
                else
                {
                    $direction = Direction::find($direction_trouve->id);
                    $direction->updated_at = date("Y-m-d H:i:s");
                    $direction->save();
                    session(['nouvelDirection_id' => $direction_trouve->id
                    ]);
                    /*$direction_etage = DirectionEtage::create([
                            'etage_id' => session('nouveauEtage_id'),
                            'direction_id' => session('nouvelDirection_id')
                        ]);*/
                    // rechercher l'hote 
                     $hote_trouve =  Hote::where('direction_id','=',session('nouvelDirection_id'))
                        ->where('nom_hote','=',$request->nom_hote)
                        ->where('prenoms_hote','=',$request->prenoms_hote)->first();
                      if(empty($hote_trouve))
                    {
                        $hote = Hote::create([
                                    'nom_hote' =>$request->nom_hote,
                                    'prenoms_hote' =>$request->prenoms_hote,
                                    //'direction_id' =>session('nouvelDirection_id')
                                ]);
                           $max_h = Hote::max('id');
                           session(['hote_id' => $max_h
                            ]);
                           $hote_max = Hote::find($max_h);
                           $hote_max->direction_id = session('nouvelDirection_id');
                           $hote_max->save();
                           $visite_hote = Visite::where('hote_id','=',NULL)->first();
                           $visite_hote->hote_id = session('hote_id');
                           $visite_hote->save();
                               // dd(session('nouvelDirection_id'));
                            return redirect()->route('visite_list');
                    }
                    else 
                    {
                         $hote =  Hote::find($hote_trouve->id);
                            $hote->updated_at = date("Y-m-d H:i:s");
                            $hote->save();
                            session(['hote_id' => $hote_trouve->id
                            ]);
                            return redirect()->route('visite_list');
                    }
                }
            }
    }
        
}
