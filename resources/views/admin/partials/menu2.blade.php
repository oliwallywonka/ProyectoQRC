@php
    $r = \Route::current()->getAction();
    $route = (isset($r['as'])) ? $r['as'] : '';
@endphp



<li class="nav-item dropdown open">
    <a class="dropdown-toggle" href="javascript:void(0);">
        <span class="icon-holder"><i class="c-teal-500 ti-view-list-alt"></i> </span>
        <span class="title">Admin Zapatos</span>
        <span class="arrow"><i class="ti-angle-right"></i></span>
    </a>

    <ul class="dropdown-menu" style="display: block;">

         <li class="nav-item dropdown">
                <a class="sidebar-link {{ starts_with($route, ADMIN . '.users') ? 'active' : '' }}" href="{{ route(ADMIN . '.model_shoes.index') }}">
                        <span class="icon-holder">
                            <i class="c-red-500 ti-user"></i>
                         </span>
                        <span class="title">Modelos</span>
                </a>
        </li>
    </ul>
</li>
