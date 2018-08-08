<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visiteur;
use App\Visite;
use App\direction;
use App\Hote;
use App\Badge;
use Illuminate\Pagination\LengthAwarePaginator;

class VisiteController extends Controller
{
    public function show(Request $request)
    {
    	$jour = date('Y-m-d');
        $visites = Visite::whereNull('heure_sortie')->whereNotNull('visiteur_id')->whereDate('updated_at', '=', $jour)->get();
        $nb=0;
        $tab = array();
        foreach($visites as $visite)
        {
            $visite_hote = Visite::find($visite->id);
            $nb++;
            $data= "data".$nb;
            $visiteurs = Visiteur::find($visite->visiteur_id);
            $$data = array([
                    "id"=>$visiteurs->id,
                    "nom"=>$visiteurs->nom.' '.$visiteurs->prenoms,
                    "nom_hote"=>$visite_hote->hote->nom_prenom_hote,
                    "heure" => $visite->heure_entre
                ]);
            $tab [] = $$data;
        }
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $tabCollection = collect($tab);
        $perPage = 5;
        $currentPageItems = $tabCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($tabCollection), $perPage);
        $paginatedItems->setPath($request->url());
        return view('pages.visite_en_attente', ['tab' => $paginatedItems]);
        
    }
   public function modifier(Request $request)
    {
        $visite_update = Visite::where('visiteur_id','=',$request->visi_id)->whereNull('heure_sortie')->first();
        $hote_badge = Hote::find($visite_update->hote_id);
        $hote_badge = $hote_badge->direction->id;
        $badge_direction = Badge::where('direction_id','=',$hote_badge)
                            ->where('status','=','en cours')->first();
        $badge_direction->status = 'en arret';
        $badge_direction->save();
        $visite_update->heure_sortie = date("H:i:s");
        $visite_update->save();
        return redirect()->route('visite_list')->with('success','Sortie validée avec succès.');
        
    }
    public function search_ajax(Request $request)
    {
        if($request->ajax())
        {
             $output = '';
             $query = $request->get('query');
             $jour = date('Y-m-d');
             if($query != '')
             {
                $data = Visiteur::whereDate('updated_at','=',$jour)->where('nom','LIKE','%'.$query.'%')->get();
             }
             else
             {
                $data = '';
             }
             $total_row = $data->count();
             if($total_row > 0)
             {
                foreach($data as $row)
                 {
                    $visites = Visite::where('visiteur_id','=',$row->id)->whereNull('heure_sortie')->first();
                    $visite = $visites::find($visites->id);
                    $output .= '
                        <tr>
                             <td>'.$row->nom.' '.$row->prenoms.'</td>
                             <td>'.$visite->hote->nom_hote.' '.$visite->hote->prenoms_hote.'</td>
                             <td>'.$visite->heure_entre.' </td>
                             <td> Encore à l\'interieur</td>
                           <td><a class="valid btn btn-danger btn-sm-5" data-id="'.$visite->id.'" href="/sortir_visite/'.$visite->id.'"> valider</td>
                       </tr>
                    ';
                }
             }
             else
             {
                $output = '
                   <tr>
                    <td align="center" colspan="5">No Data Found</td>
                   </tr>
                   ';
             }
             
            $data = array(
               'table_data'  => $output,
              );
            
            return response()->json($data);
        }
    }

    public function valider_ajax(Request $request, $id)
    {
        
        $visite_update = Visite::find($id);
        $visite_update->heure_sortie = date("H:i:s");
        $visite_update->save();
        return response()->json($visite_update);
        
    }
 }
