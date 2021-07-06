<li class="{{ strpos($routeName, 'backend.menuSection') === 0 ? 'active open' : ''}}">
    <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-gear"></i>
        <span class="menu-text">
            Menu Section
        </span>
        <b class="arrow fa fa-angle-down"></b>
    </a>
    <b class="arrow"></b>

    <ul class="submenu">
        <li class="{{ $routeName === 'backend.menuSection.index' ? 'open' : ''}}">
            <a href="{{ route('backend.menuSection.index') }}">
                <i class="menu-icon fa fa-caret-right"></i>
                All Menu
            </a>
            <b class="arrow"></b>
        </li>
    </ul>

    <ul class="submenu">
        <li class="{{ $routeName === 'backend.menuSection.create' ? 'open' : ''}}">
            <a href="{{ route('backend.menuSection.create') }}">
                <i class="menu-icon fa fa-caret-right"></i>
                Create Menu
            </a>
            <b class="arrow"></b>
        </li>
    </ul>

</li>
