@extends('layouts.master',['title'=>'créer une visite'])
@section('content')
     <section>
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
    @if ($message = Session::get('danger'))
        <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $message }}</strong>
        </div>
    @endif
         <div class="row">
             <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{route('enregistrer_visite')}}" id="VisitorRegister">
                            {{csrf_field()}}
                                    <!--<h3>Informations du Visiteur</h3>-->
                                        <br/>
                                    <div class="form-group row">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-credit-card"></i></div>
                                            <input type="text" class="form-control autocomplete_txt col-lg-4" placeholder="Numero de la pièce" name="num_piece" 
                                            data-type="num_piece" id="num_piece_1"> 
                                            <div class="col-lg-2"></div>  
                                            <select class="form-control col-lg-4" name="lib_etage" id="lib_etage_1">
                                            <option value="0">Choisir le numero de l'étage</option>
                                            <option value="pompier">Rez de chaussée</option>
                                            <option value="1er">1er</option>
                                            <option value="2e">2e</option>
                                            <option value="3e">3e</option>
                                            <option value="4e">4e</option>
                                            <option value="5e">5e</option>
                                            <option value="6e">6e</option>
                                            <option value="7e">7e</option>
                                            <option value="8e">8e</option>
                                            <option value="9e">9e</option>
                                            <option value="10e">10e</option>
                                            <option value="11e">11e</option>
                                            <option value="12e">12e</option>
                                            <option value="13">13e</option>
                                        </select>            
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <select class="form-control custom-select col-lg-4" name="type_piece" id="type_piece">
                                            <option value="0">Choisir le type de la pièce</option>
                                            <option value="carte nationale d'identité">Carte nationale d'identité</option>
                                            <option value="attestation ">Attestation</option>
                                            <option value="passport">Passport</option>
                                             <option value="permis de conduire "> Permis de conduire</option>
                                        </select>
                                        <div class="col-lg-2"></div>

                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<div class="input-group-addon"><i class="ti-desktop"></i></div>
                                        <input type="text" class="form-control col-lg-4" id="direction_1" placeholder="Nom de la direction" 
                                        name="lib_direction">
                                    </div>
                                    <div class="form-group row"> 
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                            <input type="text" name="nom" class="form-control col-lg-4" placeholder="Nom" id="nom_1">
                                             <span class="help-block nom-error"></span>
                                             <div class="col-lg-2"></div>
                                             <div class="input-group-addon"><i class="ti-mobile"></i></div>
                                             <input type="text" class="form-control col-lg-4" id="contact_direction_1" placeholder="Contact de la direction"
                                             name="contact_direction">
                                        </div>
                                    </div>
                                    <div class="form-group row"> 
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                            <input type="text" class="form-control col-lg-4" placeholder="Prénoms" name="prenoms" id="prenoms_1">
                                             <span class="help-block prenoms-error"></span>
                                             <div class="col-lg-2"></div>
                                             <div class="input-group-addon"><i class="ti-user"></i></div>
                                             <input type="text" class="form-control autocomplete_hote col-lg-4" name="nom_prenom_hote" 
                                             data-type="nom_hote" id="nom_hote_1" placeholder="Nom et Prénoms">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-mobile"></i></div>
                                            <input type="text" class="form-control col-lg-4" placeholder="Contact" name="contact" id="contact_1">
                                             <span class="help-block contact-error"></span>
                                             <div class="col-lg-2"></div>
                                             <div class="input-group-addon"><i class="ti-credit-card"></i></div>
                                             <input type="text" class="form-control col-lg-4" placeholder="Numero de badge" name="badge">
                                             <span class="help-block contact-error"></span>
                                        </div>
                                    </div>
                                    <hr>
                                    
                                    <div class="text-left">
                                         <button type="submit" class="btn btn-success waves-effect waves-light m-r-10 btn-envoyer">Enregistrer</button>
                                         <button type="reset" class="btn btn-inverse waves-effect waves-light">Annuler</button>
                                    </div>
                        </form>
                    </div>
                </div>
                 
             </div>
                
         </div>
     </section>
@stop
@section('script')
    
@stop
