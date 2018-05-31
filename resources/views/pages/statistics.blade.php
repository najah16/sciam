@extends('layouts.master',['title'=>'Recapitulatif'])
@section('content')
		<div class="row">
              <div class="col-lg-6">
                
                  <div class="flot-container">
                    <div id="cpu-load" class="cpu-load">
                    	<canvas id="bar-chart" width="800" height="450"></canvas>
                    </div>
                  </div>
                
                <!-- /# card -->
              </div>
              <!-- /# column -->

             
               <div class="col-lg-6">
                
                  <div class="flot-container">
                    <div id="cpu-load" class="cpu-load">
                    	<canvas id="bar-chart2" width="800" height="450"></canvas>
                    </div>
                  </div>
                
                <!-- /# card -->
              </div>
              <!-- /# column -->
            </div>
            <div class="row">
            	
            </div>
@stop
@section('script')
<script type="text/javascript">
	var janv = '<?php echo $janv; ?>';
  var fev = '<?php echo $fev; ?>';
  var mar = '<?php echo $mar; ?>';
  var avr = '<?php echo $avr; ?>';
  var mai = '<?php echo $mai; ?>';
  var juin = '<?php echo $juin; ?>';
  var juill = '<?php echo $juill; ?>';
  var aout = '<?php echo $aout; ?>';
  var sep = '<?php echo $sep; ?>';
  var oct = '<?php echo $oct; ?>';
  var nov = '<?php echo $nov; ?>';
  var dec = '<?php echo $dec; ?>';
  var rez = '<?php echo $rez; ?>';
  var pre = '<?php echo $quat; ?>';
  var de = '<?php echo $de; ?>';
  
  var quat = '<?php echo $quat; ?>';
  
  var neuf = '<?php echo $neuf; ?>';
  
  // first chart
  new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["Janvier", "Fevrier", "Mars", "Avril", "Mai","Juin","juillet","Aout","Septembre","Octobre","Novembre","Decembre"],
      datasets: [
        {
          label: "Visiteurs",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [janv,fev,mar,avr,mai]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Nombre des visites par mois.'
      }
    }
});
  // second chart
  new Chart(document.getElementById("bar-chart2"), {
    type: 'bar',
    data: {
      labels: ["1er etage", "2e etage", "3e etage", "4e etage", "5e etage","6e etage","7e etage","8e etage","9e etage","10e etage","12e etage","13e etage"],
      datasets: [
        {
          label: "Visiteurs",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#3e95cd", "#8e5ea2","#3cba9f"],
          data: [pre,de,mar,quat,mar,mar,mar,mar,neuf,mar,mar,mar,mar]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Nombre des visites par etages.'
      }
    }
});
</script>
@stop