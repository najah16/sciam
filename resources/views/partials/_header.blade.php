<div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="float-left">
                           <div class="hamburger sidebar-toggle">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="float-right">
                            <ul>
                                <li class="header-icon dib"><span class="user-avatar"> {{ Auth::user()->name }}   <i class="ti-angle-down f-s-10"></i></span>
                                    <div class="drop-down dropdown-profile">
                                        <div class="dropdown-content-heading">
                                            <!--<span class="text-left">Upgrade Now</span>
                                            <p class="trial-day">30 Days Trail</p>-->
                                        </div>
                                        <div class="dropdown-content-body">
                                            <ul>
                                               <!-- <li><a href="#"><i class="ti-user"></i> <span>Profile</span></a></li>

                                                <li><a href="#"><i class="ti-email"></i> <span>Inbox</span></a></li>
                                                <li><a href="#"><i class="ti-settings"></i> <span>Setting</span></a></li>

                                                <li><a href="#"><i class="ti-lock"></i> <span>Lock Screen</span></a></li>-->
                                                @guest
                                                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                                                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                                                @else
                                                    <li>
                                                            <a href="{{ route('logout') }}"
                                                               onclick="event.preventDefault();
                                                                             document.getElementById('logout-form').submit();"> <i class="ti-power-off"></i>
                                                                {{ __('Logout') }}
                                                            </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                @csrf
                                                            </form>
                                                        
                                                    </li>
                                                @endguest
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>