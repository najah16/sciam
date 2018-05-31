<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visite;
use App\Etage;
use App\Direction;
use App\Hote;
//use App\DirectionEtage;
use DB;
class statController extends Controller
{
    public function show(Request $request)
    { 
    	
    	$hote = array();
    	$direction = array();
    	$etages = array();
    	$occurence = array();
    	$mois = (date('m'));
    	$nb = 0;
    	$nbr=0;
    	$janv = Visite::whereMonth('updated_at','01')->whereNotNull('heure_sortie')->count();
    	$fev = Visite::whereMonth('updated_at','02')->whereNotNull('heure_sortie')->count();
    	$mar = Visite::whereMonth('updated_at','03')->whereNotNull('heure_sortie')->count();
    	$avr = Visite::whereMonth('updated_at','04')->whereNotNull('heure_sortie')->count();
    	$mai = Visite::whereMonth('updated_at','05')->whereNotNull('heure_sortie')->count();
    	$juin = Visite::whereMonth('updated_at','06')->whereNotNull('heure_sortie')->count();
    	$juill = Visite::whereMonth('updated_at','07')->whereNotNull('heure_sortie')->count();
    	$aout = Visite::whereMonth('updated_at','08')->whereNotNull('heure_sortie')->count();
    	$sep = Visite::whereMonth('updated_at','09')->whereNotNull('heure_sortie')->count();
    	$oct = Visite::whereMonth('updated_at','10')->whereNotNull('heure_sortie')->count();
    	$nov = Visite::whereMonth('updated_at','11')->whereNotNull('heure_sortie')->count();
    	$dec = Visite::whereMonth('updated_at','12')->whereNotNull('heure_sortie')->count();
    	$visite_etages = DB::table('direction_etage')->whereMonth('updated_at',$mois)->get();
    	$nbr_etage = $visite_etages->count();
    	
    	foreach($visite_etages as $visite_etage)
    	{
    		$etage = Etage::find($visite_etage->etage_id);
    		$nb++;
			$data= "data".$nb;
    		$$data = array([
    				"lib_etage"=>$etage->lib_etage
    			]);
    		
    		$etages[] = $$data;
    	}
    	foreach($etages as $etage)
    	{
    		foreach($etage as $etage2)
    		{
    			$occurence[$nbr] = $etage2['lib_etage'];
    			$nbr++;
    		}
    	}
        $counts = array_count_values($occurence);
            $rez = $counts['pompier'];
            $pre = $counts['Premier etage'];
            $de = $counts['Deuxieme etage'];
           // $troi = $counts['Troisieme etage'];
            $quat = $counts['Quatrieme etage'];
           // $cinq = $counts['Cinquieme etage'];
            //$six = $counts['Sixieme etage'];
           // $sept = $counts['Septieme etage'];
            //$hui = $counts['Huitieme etage'];
            $neuf = $counts['Neuvieme etage'];
            //$dix = $counts['Dixieme etage'];    
           // $onz = $counts['Onzieme etage'];
            //$douz = $counts['Douzieme etage'];
            //$treiz = $counts['Treizieme etage'];
    	return view('pages.statistics')->with([
    			'janv'=>$janv,
    			'fev'=>$fev,
    			'mar'=>$mar,
    			'avr'=>$avr,
    			'mai'=>$mai,
    			'juin'=>$juin,
    			'juill'=>$juill,
    			'aout'=>$aout,
    			'sep'=>$sep,
    			'oct'=>$oct,
    			'nov'=>$nov,
    			'dec'=>$dec,
                'rez'=>$rez,
                'pre'=>$pre,
                'de'=>$de,
               // 'troi'=>$troi,
                'quat'=>$quat,
                //'cinq'=>$cinq,
                //'sept'=>$sept
                'neuf'=>$neuf,
                //'onz'=>$onz
    		]);
    }
}
