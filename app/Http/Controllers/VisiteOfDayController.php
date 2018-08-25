<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visiteur;
use App\Visite;
use App\Hote;
use App\Direction;
use App\Etage;
use App\DirectionEtage;
use Illuminate\Pagination\LengthAwarePaginator;

class VisiteOfDayController extends Controller
{
    public function show(Request $request)
    {
    	$jour = date("Y-m-d");
        $visites = Visite::whereNotNull('heure_sortie')->where('date_visite','=',$jour)->get();
        $nb=0;
        $tab = array();
        foreach($visites as $visite)
        {
            $visite_hote = Visite::find($visite->id);
            $nb++;
            $data= "data".$nb;
            $visiteurs = Visiteur::find($visite->visiteur_id);
            $$data = array([
                    "id"=>$visite->id,
                    "nom"=>$visiteurs->nom.' '.$visiteurs->prenoms,
                    "nom_prenom_hote"=>$visite_hote->hote->nom_prenom_hote,
                    "heure" => $visite->heure_entre,
                    "heure_sortie" => $visite->heure_sortie
                ]);
            $tab [] = $$data;
        }
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $tabCollection = collect($tab);
        $perPage = 5;
        $currentPageItems = $tabCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($tabCollection), $perPage);
        $paginatedItems->setPath($request->url());

       // return view('pages.visite_en_attente', ['tab' => $paginatedItems]);
    	return view('pages.visite_of_day', ['tab' =>$paginatedItems]);
    }
    public function detail(Request $request, $id)
    {
          
          
          $visites = Visite::find($id);
          $directions = Direction::find($visites->hote->direction_id);
          $etages = Direction::find($visites->hote->direction_id)->etages()->first();
          $my_data = [
            'nom_visiteur' =>$visites->visiteur->nom,
            'prenom_visiteur' =>$visites->visiteur->prenoms,
            'type_piece' =>$visites->visiteur->type_piece,
            'num_piece' =>$visites->visiteur->num_piece,
            'contact' =>$visites->visiteur->contact,
            'nom_hotesse'=>$visites->nom_hotesse,
            'nom_hote'=>$visites->hote->nom_prenom_hote,
            'direction'=>$directions->lib_direction,
            'direction_contact'=>$directions->contact_direction,
            'etage'=>$etages->lib_etage
          ];
            return response()->json($my_data);
 
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
                    $visites = Visite::where('visiteur_id','=',$row->id)->whereNotNull('heure_sortie')->first();
                    $visite = $visites::find($visites->id);
                    $output .= '
                        <tr>
                             <td>'.$row->nom.' '.$row->prenoms.'</td>
                             <td>'.$visite->hote->nom_prenom_hote.'</td>
                             <td>'.$visite->heure_entre.' </td>
                             <td> '.$visite->heure_sortie.'</td>
                           <td><a class="show-modal btn btn-info btn-sm-5" data-id="'.$visite->id.'" href="/visite_of_day/'.$visite->id.'">Details</td>
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
}
