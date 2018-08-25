@extends('layouts.master',['title'=>'Bilan des visites'])
@section('content')
    <section id="main_content">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <!--<h4>Toutes les visites</h4>-->
                    <div class="float-left m-l-10 m-t-5">
                        <div class="form-group">
                            <div class="input-group input-group-default">

                                <input type="text" name="search" id="chercher" class="form-control" placeholder="Chercher par nom" />
                                
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="/all_visits">
                      {{csrf_field()}}
                        <div class="float-left m-l-10 m-t-5">
                            <div class="form-group">
                                <div class="input-group input-group-default">

                                    <input type="text" name="date" id="date" class="form-control datepicker" placeholder="JJ/MM/AAAA" />
                                    
                                </div>
                            </div>
                        </div>
                        <div class="float-left m-l-10 m-t-5">
                            <div class="form-group">
                                <div class="input-group input-group-default">

                                    <input type="text" name="hstart" id="hstart" class="form-control timepicker"/>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="float-left m-l-10 m-t-5">
                            <div class="form-group">
                                <div class="input-group input-group-default">

                                    <input type="text" name="hend" id="hend" class="form-control timepicker"/>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="float-left m-l-10 m-t-5">
                          <button type="submit" class="btn btn-success waves-effect waves-light m-r-10 btn-envoyer" id="dateSearch"> Lancez</button>
                        </div>
                    </form>
                    <div class="float-left m-l-10 m-t-5">
                        <a href="{{url('/all_visits_pdf')}}"><button class="btn btn-success waves-effect waves-light m-r-10 btn-envoyer"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></button></a>
                    </div>
                </div>
                 <div class="bootstrap-data-table-panel">
                      <div class="table-responsive" id="tab_div">
                                  <table id="row-select" class="display table table-borderd table-hover">
                                      <thead>
                                          <tr>
                                              <th>Nom et prénoms</th>
                                              <th>Nom de la personne visitée</th>
                                              <th>Heure d'entrée</th>
                                              <th>Heure de sortie</th>
                                              <th>Date</th>
                                               <th></th>
                                              
                                          </tr>
                                      </thead>
                                      <tbody>
                                          @foreach($tab as $key1=>$element1)
                                                  @foreach ($element1 as $key2 => $element2) 
                                                      
                                                      <tr>
                                                              <td>{{ $element2["nom"]}}</td>
                                                              <td>{{ $element2["nom_hote"]}}</td>
                                                              <td>{{ $element2["heure"]}}</td>
                                                              <td>{{ $element2["heure_sortie"]}}</td>
                                                              <td>{{ $element2["date_visite"]}}</td>
                                                              <td>
                                                                  <a href="{{url('/all_visits/'.$element2['id'])}}" class="show-modal btn btn-info btn-sm" 
                                                                  data-id="{{$element2['id']}}" > 
                                                                  Details </a>
                                                              </td>
                                                     </tr>
                                                  @endforeach
                                          @endforeach

                                        </tbody>
                                  </table>
                                  
                                  {{ $tab->links() }}
                              
                      </div>
                  </div>
                  <!-- ajax name search table -->
                  <div class="bootstrap-data-table-panel hidden" id="second_tab">
                        <div class="table-responsive">
                                  <table id="row-select" class="display table table-borderd table-hover">
                                      <thead>
                                          <tr>
                                              <th>Nom et prénoms</th>
                                              <th>Nom de la personne visitée</th>
                                              <th>Heure d'entrée</th>
                                              <th>Heure de sortie</th>
                                              <th>Date</th>
                                               <th></th>
                                              
                                          </tr>
                                      </thead>
                                      <tbody id="second_body">
                                          
                                      </tbody>
                                  </table>
                                
                              
                      </div>
                  </div>
                  <!-- ajax date search table -->
                  <div class="bootstrap-data-table-panel hidden" id="third_tab">
                        <div class="table-responsive">
                                  <table id="row-select" class="display table table-borderd table-hover">
                                      <thead>
                                          <tr>
                                              <th>Nom et prénoms</th>
                                              <th>Nom de la personne visitée</th>
                                              <th>Heure d'entrée</th>
                                              <th>Heure de sortie</th>
                                              <th>Date</th>
                                               <th></th>
                                              
                                          </tr>
                                      </thead>
                                      <tbody id="third_body">
                                          
                                      </tbody>

                                  </table>
                                
                              
                      </div>
                  </div>
            </div>  
            <!-- card -->
              <div id="show" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                  <div class="modal-header">
                                    
                                     <h3 class="modal-title" style="text-align: center;">Fiche de Visite</h3>
                                  </div>
                                  <div class="modal-body">                          
                                          
                                          <h4 style="text-align: center;">Visiteur</h4>
                                             <span class="font-weight-bold">Nom:</span> <span id="nom_visiteur" class="text-right text-uppercase">
                                             </span></br>     
                                               <span class="font-weight-bold"> Prenoms:</span> <span id="prenom_visiteur" class="text-right text-capitalize"></span>
                                               </br>
                                                  <span class="font-weight-bold">Type de la piece:</span> <span id="type_piece" class="text-right text-capitalize">
                                                    
                                                  </span></br>
                                                  <span class="font-weight-bold">Numero de la piece:</span> <span id="num_piece" class="text-right text-capitalize">
                                                    
                                                  </span></br>
                                                  <span class="font-weight-bold">Contact: </span><span id="contact" class="font-weight-bold"></span></br>
                                                  <hr>
                                                  <h4 style="text-align: center;">Hote</h4>
                                                  <span class="font-weight-bold">Nom: </span> <span id="nom_hote" class="text-right text-uppercase"></span></br>
                                                  <span class="font-weight-bold">Direction:</span> <span id="direction" class="text-right text-capitalize"></span></br>
                                                  <span class="font-weight-bold">Contact: </span> <span id="direction_contact" class="font-weight-bold"></span></br>
                                                  <span class="font-weight-bold">Etage:</span> <span id="etage" class="text-right text-capitalize"></span>
                                                  <hr>  
                                                  <h4 style="text-align: center;">Hotesse en charge de la visite</h4>
                                                    <span class="font-weight-bold">Nom:</span> <span id="nom_hotesse" class="text-right text-uppercase">
                                                    </span>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"> Fermer</button>
                                    
                                  </div>
                           </div>
                      </div>
              </div>


        </div>
    </section>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).on('click', '.show-modal', function(e) {
           e.preventDefault();
           var id = $(this).attr('data-id');
           var urls = $(this).attr('href');
           $.ajax({
                type: 'GET',
                url: urls,
                data: {'id':id},
                success: function(data){
                  $('#show').modal('show');
                  $('#nom_visiteur').html('');
                  $('#nom_visiteur').append(data.nom_visiteur);
                  $('#prenom_visiteur').html('');
                  $('#prenom_visiteur').append(data.prenom_visiteur);
                  $('#type_piece').html('');
                  $('#type_piece').append(data.type_piece);
                  $('#num_piece').html('');
                  $('#num_piece').append(data.num_piece);
                  $('#contact').html('');
                  $('#contact').append(data.contact);
                  $('#nom_hote').html('');
                  $('#nom_hote').append(data.nom_hote);
                  $('#prenoms_hote').html('');
                  $('#prenoms_hote').append(data.prenoms_hote);
                  $('#direction').html('');
                  $('#direction').append(data.direction);
                  $('#direction_contact').html('');
                  $('#direction_contact').append(data.direction_contact);
                  $('#etage').html('');
                  $('#etage').append(data.etage);
                  $('#nom_hotesse').html('');
                  $('#nom_hotesse').append(data.nom_hotesse);
                  //alert(data.nom_visiteur);
                }
           });

        });
        // ajax_search
        $(document).on('keyup', '#chercher', function(){
          var query = $(this).val();
          $.ajax({
           url:"{{ route('all_visits_search') }}",
           method:'GET',
           data:{query:query},
           dataType:'json',
           success:function(data)
           {
            $('#tab_div').remove();
            $('#second_tab').removeClass("hidden");
            $('#second_body').html(data.table_data);
           }
          })
         });
    </script>
@endsection