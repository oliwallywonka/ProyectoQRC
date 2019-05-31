@php
    $r = \Route::current()->getAction();
    $route = (isset($r['as'])) ? $r['as'] : '';
@endphp

<li class="nav-item mT-30">
    <a class="sidebar-link {{ starts_with($route, ADMIN . '.dash') ? 'active' : '' }}" href="{{ route(ADMIN . '.dash') }}">
        <span class="icon-holder">
            <i class="c-blue-500 ti-home"></i>
        </span>
        <span class="title">Dashboard</span>
    </a>
</li>
<li class="nav-item">
    <a class="sidebar-link {{ starts_with($route, ADMIN . '.users') ? 'active' : '' }}" href="{{ route(ADMIN . '.users.index') }}">
        <span class="icon-holder">
            <i class="c-brown-500 ti-user"></i>
        </span>
        <span class="title">Usuarios</span>
    </a>
</li>

<li class="nav-item">
    <a class="sidebar-link {{ starts_with($route, ADMIN . '.users') ? 'active' : '' }}" href="{{ route(ADMIN . '.clients.index') }}">
        <span class="icon-holder">
             <i class="c-orange-500 ti-user"></i>
         </span>
         <span class="title">Clientes</span>
    </a>
</li>

<li class="nav-item">
    <a class="sidebar-link {{ starts_with($route, ADMIN . '.users') ? 'active' : '' }}" href="{{ route(ADMIN . '.wholesellers.index') }}">
         <span class="icon-holder">
                 <i class="c-purple-500 ti-user"></i>
          </span>
         <span class="title">Mayoristas</span>
       </a>
 </li>

<li class="nav-item dropdown open">
    <a class="dropdown-toggle" href="javascript:void(0);">
        <span class="icon-holder"><i class="c-teal-500 ti-view-list-alt"></i> </span>
        <span class="title">Admin Zapatos</span>
        <span class="arrow"><i class="ti-angle-right"></i></span>
    </a>

    <ul class="dropdown-menu" style="display: block;">

         <li class="nav-item dropdown">
                <a class="sidebar-link {{ starts_with($route, ADMIN . '.users') ? 'active' : '' }}" href="{{ route(ADMIN . '.shoes.index') }}">
                        <span class="icon-holder">
                            <i class="c-red-500 ti-user"></i>
                         </span>
                        <span class="title">Inventario</span>
                </a>
        </li>

        <li class="nav-item dropdown">
             <a class="sidebar-link {{ starts_with($route, ADMIN . '.users') ? 'active' : '' }}" href="{{ route(ADMIN . '.sizes.index') }}">
                        <span class="icon-holder">
                            <i class="c-brown-500 ti-user"></i>
                        </span>
                        <span class="title">Tallas</span>
            </a>
        </li>

        <li class="nav-item dropdown">
                <a class="sidebar-link {{ starts_with($route, ADMIN . '.users') ? 'active' : '' }}" href="{{ route(ADMIN . '.colors.index') }}">
                        <span class="icon-holder">
                            <i class="c-brown-500 ti-user"></i>
                        </span>
                        <span class="title">Colores</span>
                    </a>
         </li>

        <li class="nav-item dropdown">
                <a class="sidebar-link {{ starts_with($route, ADMIN . '.users') ? 'active' : '' }}" href="{{ route(ADMIN . '.brands.index') }}">
                        <span class="icon-holder">
                            <i class="c-brown-500 ti-user"></i>
                        </span>
                        <span class="title">Marcas</span>
                    </a>
        </li>

        <li class="nav-item dropdown">
                <a class="sidebar-link {{ starts_with($route, ADMIN . '.users') ? 'active' : '' }}" href="{{ route(ADMIN . '.categories.index') }}">
                        <span class="icon-holder">
                            <i class="c-brown-500 ti-user"></i>
                        </span>
                        <span class="title">Categorias</span>
                    </a>
         </li>



    </ul>
</li>
