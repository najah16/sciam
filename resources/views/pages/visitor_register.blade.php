@extends('layouts.master',['title'=>'Visitor_Register'])
@section('content')
        <section id="main-content">
        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div id="msg" class="alert  "> 
                                                
                                            </div>
                        <div class="row">
                            <!-- debut de la zone visiteur -->
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">VISITEUR</h3>
                                        <!--@if(session()->has('message.level'))
                                            <div class="alert alert-{{ session('message.level') }}"> 
                                                Visiteur enregistré avec succès.
                                            </div>
                                       @endif
                                       @if(session()->has('message.update'))
                                            <div class="alert alert-{{ session('message.update') }}"> 
                                                Visiteur reenregistré avec succès.
                                            </div>
                                       @endif-->
                                       
                                        <form class="form p-t-20" method="POST" action="{{route('visitor_register')}}" id="VisitorRegister">
                                                {{ csrf_field() }}
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-credit-card"></i></div>
                                                    <input type="text" class="form-control autocomplete_txt" placeholder="Numero de la pièce" name="num_piece" 
                                                    data-type="num_piece" id="num_piece_1">
                                                     <span class="help-block num_piece-error"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control custom-select" name="type_piece" id="type_piece">
                                                    <option value="0">Choisir le type de la pièce</option>
                                                    <option value="carte nationale d'identité">Carte nationale d'identité</option>
                                                    <option value="attestation ">Attestation</option>
                                                    <option value="passport">Passport</option>
                                                     <option value="permis de conduire "> Permis de conduire</option>
                                                </select>
                                            </div>
                                            <div class="form-group"> 
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-user"></i></div>
                                                    <input type="text" name="nom" class="form-control" placeholder="Nom" id="nom_1">
                                                     <span class="help-block nom-error"></span>
                                                </div>
                                            </div>
                                            <div class="form-group"> 
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-user"></i></div>
                                                    <input type="text" class="form-control" placeholder="Prénoms" name="prenoms" id="prenoms_1">
                                                     <span class="help-block prenoms-error"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-mobile"></i></div>
                                                    <input type="text" class="form-control" placeholder="Contact" name="contact" id="contact_1">
                                                     <span class="help-block contact-error"></span>
                                                </div>
                                            </div>
                                            <div class="text-left">
                                                 <button type="submit" class="btn btn-success waves-effect waves-light m-r-10 btn-envoyer" id="envoyer">Envoyer
                                                 </button>
                                                 <button type="submit" class="btn btn-inverse waves-effect waves-light" id="annuler">Annuler</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- fin de la zone visiteur -->
                            <!-- debut zone hôte -->
                              <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h3 class="card-title">HÔTE</h3>
                                                <form class="form p-t-20" method="POST" action="{{route('hote_register')}}">
                                                        {{csrf_field()}}
                                                    <div class="form-group">
                                                        <select class="form-control custom-select" name="lib_etage">
                                                            <option value="0">Choisir le numero de l'étage</option>
                                                            <option value="pompier">Rez de chaussée</option>
                                                            <option value="Premier etage">1er</option>
                                                            <option value="Deuxieme etage">2e</option>
                                                            <option value="Troisieme etage">3e</option>
                                                            <option value="Quatrieme etage">4e</option>
                                                            <option value="Cinquieme etage">5e</option>
                                                            <option value="Sixieme etage">6e</option>
                                                            <option value="Septieme etage">7e</option>
                                                            <option value="Huitieme etage">8e</option>
                                                            <option value="Neuvieme etage">9e</option>
                                                            <option value="Dixieme etage">10e</option>
                                                            <option value="Onzieme etage">11e</option>
                                                            <option value="Douzieme etage">12e</option>
                                                            <option value="Treizieme etage">13e</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="ti-desktop"></i></div>
                                                            <input type="text" class="form-control" id="direction_1" placeholder="Nom de la direction" 
                                                            name="lib_direction">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="ti-mobile"></i></div>
                                                            <input type="text" class="form-control" id="contact_direction_1" placeholder="Contact"
                                                             name="contact_direction">
                                                        </div>
                                                    </div>
                                                   <div class="form-group"> 
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                                            <input type="text" class="form-control autocomplete_hote" data-type="nom_hote" 
                                                            id="nom_hote_1" placeholder="Nom" name="nom_hote">
                                                        </div>
                                                    </div>
                                                    <div class="form-group"> 
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                                            <input type="text" class="form-control" id="prenoms_hote_1" placeholder="Prénom" name="prenoms_hote">

                                                        </div>
                                                    </div>
                                                    <div class="text-left">
                                                         <button type="submit" class="btn btn-success waves-effect waves-light m-r-10 btn-envoyer">Envoyer</button>
                                                         <button type="submit" class="btn btn-inverse waves-effect waves-light">Annuler</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                            </div>
                            <!-- fin zone hôte -->
                        </div>
                        <!-- debut de la ligne hôtesse -->
                        
                        <!-- fin de la ligne hôtesse -->
                    </section>

@stop
@section('script')
    <script type="text/javascript">
    // autocomplete visitor script 
     
            $(document).on('focus','.autocomplete_txt',function(){
              var type = $(this).data('type');
              var autoType = 'num_piece';
               $(this).autocomplete({
                   minLength: 2,
                   source: function( request, response ) {
                        $.ajax({
                            url: "{{ route('search') }}",
                            dataType: "json",
                            data: {
                                term : request.term,
                                type : type,
                            },
                            success: function(data) {
                                var array = $.map(data, function (item) {
                                   return {
                                       label: item[autoType],
                                       value: item[autoType],
                                       data : item
                                   }
                               });
                                response(array)
                            },
                           error: function(data) {
                            alert('no');
                           }
                        });
                   },
                   select: function( event, ui ) {
                       var data = ui.item.data;           
                       id_arr = $(this).attr('id');
                       id = id_arr.split("_");
                       elementId = id[id.length-1];
                       $('#num_piece_'+elementId).val(data.num_piece);
                       $('#nom_'+elementId).val(data.nom);
                       $('#prenoms_'+elementId).val(data.prenoms);
                       $('#contact_'+elementId).val(data.contact);
                   }
               });
               
               
            });

    // end script 
    
    // hote autocomplete script 
    


    // end script 
        $(document).on('submit',"#VisitorRegister", function(e){
                e.preventDefault();
                var urls = $(this).attr('action');
                var  token = $('input[name=_token]').val();
                var num_piece = $('#num_piece_1').val();
                var type_piece = $('#type_piece').val();
                var nom = $('#nom_1').val();
                var prenoms = $('#prenoms_1').val();
                var contact = $('#contact_1').val();
            
                $.ajax({
                    type: 'POST',
                    url: urls,
                    data: {
                        '_token': token, 
                        'num_piece': num_piece, 
                        'type_piece': type_piece,
                         'nom': nom, 
                         'prenoms': prenoms,
                          'contact': contact
                      },
                    dataType: 'json',
                    success: function(response){
                         $('#msg').removeClass('alert-danger');
                        $('#msg').addClass('alert-success');
                        $('#msg').html('Visiteur enregistré avec succès');

                    },
                    error: function(response)
                    {
                        if(response===422){
                            var errors = response.responseJSON;
                            $.each(json.responseJSON, function (key, value){
                                $('.'+key+'-error').html(value);
                            });
                        } else {
                            $('#msg').removeClass('alert-success');
                            $('#msg').addClass('alert-danger');
                            $('#msg').html('Données mal renseignées, veuillez recommencer.');
                        }
                    }
                });
        });
    </script>
@stop
