<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
            <div class="nano">
                <div class="nano-content">
                    <div class="logo"><a href="{{route('index')}}"><!-- <img src="images/logo.png" alt="" /> --><span>GESTACCUEIL</span></a></div>
                    <ul>
                        <!--<li class="active"><a><i class="ti-home"></i> Tableau de bord</a></li>-->
                        <!-- enregistrer une visite en enregistrant tous les intervenants-->
                               <li class="{{set_active_root('visites')}}"><a href="{{route('visites')}}"><i class="fa fa-plus" aria-hidden="true"></i> Créer une visite</a></li>
                               <li class="{{set_active_root('visite_list')}}"><a href="{{route('visite_list')}}"> <i class="fa fa-floppy-o" aria-hidden="true"></i>sortir visite</a></li>
                               <li class="{{set_active_root('visite_of_day')}}"><a href="{{route('visite_of_day')}}"><i class="fa fa-list" aria-hidden="true"></i> Liste du jour</a></li>
                               <li><a class="sidebar-sub-toggle"><i class="ti-calendar"></i> Gestion des visites <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                                    <ul>
                                        <li><a href="{{route('all_visits')}}">Points des visites</a></li>
                                        <li><a href="{{route('statistics')}}">Statistics</a></li>
                                        
                                    </ul>
                              </li>
                        <li> <a href="{{ route('logout') }}"
                                                               onclick="event.preventDefault();
                                                                             document.getElementById('logout-form').submit();"> <i class="ti-power-off"></i>
                                                                {{ __('Logout') }}
                                                            </a></li>
                    </ul>
                </div>
            </div>
</div>