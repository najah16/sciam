@extends('layouts.master',['title'=>'Sortir_visite'])
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
</div>
@endif
    <section id="main_content">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                   <!-- <h4>LISTE DES VISITES EN COURS</h4><br>-->
                        <div class="float-left m-l-10 m-t-5">
                        <div class="form-group">
                            <div class="input-group input-group-default">

                                <input type="text" name="search" id="chercher" class="form-control" placeholder="Chercher par nom" />
                                
                            </div>
                        </div>
                        </div>
                </div>
                <div class="bootstrap-data-table-panel">
                    <div class="table-responsive" id="tab_div">
                            @if(empty($tab))
                                <div class="alert alert-danger"> Aucune visite pour le moment</div>
                            @else
                                    
                                <table id="row-select" class="display table table-borderd table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nom et prénoms</th>
                                            <th>Nom de la personne visitée</th>
                                            <th>Heure d'entrée</th>
                                            <th>Heure de sortie</th>
                                            <th></th>
                                           <!-- <th>Details</th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($tab as $key1=>$element1)
                                                @foreach ($element1 as $key2 => $element2) 
                                                    
                                                    <tr>
                                                        <form method="POST" action="{{route('modifier')}}" id="ajout">
                                                            {{csrf_field()}}
                                                            <td>{{ $element2["nom"]}}</td>
                                                            <td>{{ $element2["nom_hote"]}}</td>
                                                            <td>{{ $element2["heure"]}}</td>
                                                            <td> Encore à l'intérieur</td>

                                                            <input type="hidden" name="visi_id" value="{{ $element2['id'] }} ">
                                                                <!-- le bouton modifier doit permettre la saisie de l'heure de sortie  et le bouton info de voir tous les details sur la visite-->
                                                           <td><button type="submit" class="btn btn-danger m-b-10 m-l-5">Valider</button></td>
                                                            <!--<td><button type="button" class="btn btn-info m-b-10 m-l-5">Details</button></td>-->
                                                        </form>
                                                   </tr>
                                                @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $tab->links() }}
                            @endif
                    </div>
                </div>
                <div class="bootstrap-data-table-panel hidden" id="second_tab">
                        <div class="table-responsive">
                                  <table id="row-select" class="display table table-borderd table-hover">
                                      <thead>
                                          <tr>
                                              <th>Nom et prénoms</th>
                                              <th>Numero de telephone</th>
                                              <th>Heure d'entrée</th>
                                              <th>Heure de sortie</th>
                                              
                                               <th></th>
                                              
                                          </tr>
                                      </thead>
                                      <tbody id="second_body">
                                          
                                      </tbody>
                                  </table>
                                
                              
                      </div>
                  </div>
            </div>
            <!-- /# card -->
        </div>
    </section>
@endsection
@section('script')
    <script>
         $(document).on('keyup', '#chercher', function(){
          var query = $(this).val();
          $.ajax({
           url:"{{ route('search_ajax') }}",
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
// validate ajx search_live
      $(document).on('click', '.valid', function(e) {
                 e.preventDefault();
                 var id = $(this).attr('data-id');
                 var urls = $(this).attr('href');
                 $.ajax({
                    url: urls,
                    method: 'GET',
                    data:{'id':id},
                    dataType:'json',
                    success: function(data)
                    {
                      window.location.replace("http://localhost:8000/sortir_visite");
                    },
                    error: function(data)
                    {
                      alert('no');
                    }
                 })
              });
    </script>
@stop