<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background: #3f4d67;color: #a9b7d0;">
    <a class="ml-4 font-weight-bold  text-light " href="home">IMPORTACIONES</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
        <ul class="navbar-nav ml-auto">
            @if(Auth::User()->activeRole()== 1 )
            <li class="nav-item dropdown notification-ui" id="tinkerbell">
                <a class="nav-link dropdown-toggle notification-ui_icon" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                    <i class="fa fa-bell"></i>
                    <span class="" id="count"></span>
                </a>
                <div class="dropdown-menu notification-ui_dd" aria-labelledby="navbarDropdown" id="message_content">
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <i class="fas fa-cog"></i> Configuración
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                    <a class="dropdown-item waves-effect waves-light" href=" {{ route('rol')  }} ">
                        <i class="fas fa-user mr-2"></i> Rol
                    </a>
                    <a class="dropdown-item waves-effect waves-light" href=" {{ route('menu')  }}">
                        <i class="fas fa-user mr-2"></i> Menu
                    </a>
                    <a class="dropdown-item waves-effect waves-light" href=" {{ route('usuario')  }}">
                        <i class="fas fa-user mr-2"></i> Usuarios
                    </a>
                </div>
            </li>
            @endif
            <li class="nav-item active">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()" class="nav-link waves-effect waves-light">
                    <i class="feather icon-log-out mr-2"></i> Salir
                </a>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid ml-auto " style="position: relative; z-index: 1 ; display:none;" id="contain-notify">
    <div class="card" style="position: absolute; top: 0; right: 25px; max-height: 500px; max-width:30%; min-width:30%" data-autohide="false">
        <div class=" card-header">
            <div class="d-flex">
                <div class=" justify-content-start mr-auto">
                    <strong>Notificaciones</strong>
                </div>
                <div class="justify-content-end ml-auto">
                    <h6 class="text-secondary"></h6>
                </div>
            </div>
        </div>
        <div id="No_exist"></div>
        <div class="m-0 p-0" style="overflow-y : scroll !important">
            <ul class="list-group list-group-flush" id="list-notify">
            </ul>
        </div>
    </div>
</div>
</div>