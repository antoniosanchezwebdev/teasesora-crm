<!-- contenedor-sidebar -->
<!-- Top Bar Start -->
<div class="topbar">

    <!-- LOGO -->
    @mobile
        <div class="topbar-left" style="margin-bottom: -145px !important;">
            <button class="logo button-menu-mobile open-left waves-effect w-100"
                style="background-color: #fff !important; text-align: center;">
                <span class="logo-light">
                    <img class="img-fluid p-4" src="{{ asset('assets/images/logo-empresa.png') }}" alt="Logo La Fabrica">
                    {{-- <i class="mdi mdi-camera-control"></i> La Fabrica --}}
                </span>
                <span class="logo-sm">
                    <img class="img-fluid p-1" src="{{ asset('assets/images/logo-empresa.png') }}" alt="Logo La Fabrica">
                </span>
            </button>
        </div>
    @elsemobile
        <div class="topbar-left" style="margin-bottom: -145px !important;">
            <button class="logo button-menu-mobile open-left waves-effect w-100 h-100"
                style="background-color: #fff !important; text-align: center;">
                    <span class="logo-light">
                        <img class="img-fluid p-4" src="{{ asset('assets/images/logo-empresa.png') }}"
                            alt="Logo La Fabrica">
                        {{-- <i class="mdi mdi-camera-control"></i> La Fabrica --}}
                    </span>
                    <span class="logo-sm">
                        <img class="img-fluid p-1" src="{{ asset('assets/images/logo-empresa.png') }}"
                            alt="Logo La Fabrica">
                    </span>
            </button>
        </div>
    @endmobile
    <nav class="navbar-custom">
        <ul class="navbar-right list-inline float-right mb-0">
            <!-- language-->
            {{-- <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="https://crm.fabricandoeventosjerez.com/assets/images/flags/us_flag.jpg" class="mr-2" height="12" alt="" /> English <span class="mdi mdi-chevron-down"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated language-switch">
                            <a class="dropdown-item" href="#"><img src="https://crm.fabricandoeventosjerez.com/assets/images/flags/french_flag.jpg" alt="" height="16" /><span> French </span></a>
                            <a class="dropdown-item" href="#"><img src="https://crm.fabricandoeventosjerez.com/assets/images/flags/spain_flag.jpg" alt="" height="16" /><span> Spanish </span></a>
                            <a class="dropdown-item" href="#"><img src="https://crm.fabricandoeventosjerez.com/assets/images/flags/russia_flag.jpg" alt="" height="16" /><span> Russian </span></a>
                            <a class="dropdown-item" href="#"><img src="https://crm.fabricandoeventosjerez.com/assets/images/flags/germany_flag.jpg" alt="" height="16" /><span> German </span></a>
                            <a class="dropdown-item" href="#"><img src="https://crm.fabricandoeventosjerez.com/assets/images/flags/italy_flag.jpg" alt="" height="16" /><span> Italian </span></a>
                        </div>
                    </li> --}}

            <!-- full screen -->
            <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                    <i class="mdi mdi-arrow-expand-all noti-icon"></i>
                </a>
            </li>

            <!-- notification -->
            <li class="dropdown notification-list list-inline-item">
                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="mdi mdi-bell-outline noti-icon"></i>
                    <span class="badge badge-pill badge-danger noti-icon-badge">{{ $user->alertas()->wherePivot('status', 0)->count() }}</span>
                </a>
                @if ($user->alertas()->wherePivot('status', 0)->count() > 0)
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-lg px-1">
                        <!-- item-->
                        <h6 class="dropdown-item-text">
                            Notifications
                        </h6>

                        <div class="slimscroll notification-item-list">
                            @foreach ($user->alertas()->wherePivot('status', 0)->get() as $alerta)
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                <p class="notify-details"><b>{{$alerta->titulo}}</b><span class="text-muted">{{$alerta->descripcion}}</span></p>
                            </a>
                            @endforeach
                        </div>
                        <!-- All-->
                        <a href="{{route('avisos.index')}}" class="dropdown-item text-center notify-all text-primary">
                            Ver Todas <i class="fi-arrow-right"></i>
                        </a>


                    </div>
                @else
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-lg px-1">
                        <!-- item-->
                        <h6 class="dropdown-item-text">
                            No tienes notificaciones
                        </h6>
                    </div>
                @endif
            </li>

            <li class="dropdown notification-list list-inline-item">
                <div class="dropdown notification-list nav-pro-img">
                    <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="https://crm.fabricandoeventosjerez.com/assets/images/users/user-4.jpg"
                            alt="user" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <div class="dropdown-divider"></div>
                        {{-- Formulario invisible para que Laravel detecte el cierre de sesión como POST. --}}
                        @auth
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        @endauth

                        {{-- El mismo enlace, con un evento onclick para que haga submit del formulario y cierre sesión.  --}}
                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                class="mdi mdi-power text-danger"></i>Cerrar sesión</a>
                    </div>
                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>
            {{-- <li class="d-none d-md-inline-block">
                        <form role="search" class="app-search">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" placeholder="Search..">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </li> --}}
        </ul>

    </nav>

</div>
<!-- Top Bar End -->
