<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="{{ route('dashboard.index') }}">Inicio</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Libro de diario
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Ingresar</a>
                  <a class="dropdown-item" href="#">Modificar</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Eliminar</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Nuevo
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('proveedores.create') }}">Proveedores</a>
                  <a class="dropdown-item" href="{{ route('cuentasProveedores.create') }}">Servicios</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ route('residencias.create') }}">Residencias</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Modificar
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('proveedores.index') }}">Proveedores</a>
                <a class="dropdown-item" href="{{ route('cuentasProveedores.index') }}">Servicios</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
