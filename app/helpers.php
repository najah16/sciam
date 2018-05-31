<?php
	if(!function_exists('page_title'))
	{
		function page_title($title)
		{
			if ($title=='') {
				return 'GESTACCUEIL';
			}
			else {
				return config('app.name', 'Laravel').'|'. $title;
			}
			return Route::is($route_path) ? 'active' : '';
		}
	}

	if(!function_exists('set_active_root'))
	{
		function set_active_root($route_path)
		{
			return Route::is($route_path) ? 'active' : '';
		}
	}

	if(!function_exists('etage_occurence'))
	{
		
		function etage_occurence($occurence)
		{
			 $de = '4';
                 
			/*$counts = array_count_values($occurence);
			//$pre = $counts['Premier etage'];
			$de = $counts['Deuxieme etage'];
			//$tro = ['Troisieme etage'];
			//$quat = $counts['Quatrieme etage'];
			$cinq = $counts['Cinquieme etage'];
			//$six = $counts['Sixieme etage'];
			//$sept = $counts['Septieme etage'];
			//$hui = $counts['Huitieme etage'];
			//$neuf = $counts['Neuvieme etage'];
			$dix = $counts['Dixieme etage'];	
			//$onz = $counts['Onzieme etage'];
			$douz = $counts['Douzieme etage'];
			$treiz = $counts['Treizieme etage'];*/
			return $de;
		}
	}
	