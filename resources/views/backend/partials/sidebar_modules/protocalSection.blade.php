<li class="{{ strpos($routeName, 'backend.protocalSection') === 0 ? 'active open' : ''}}">
    <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-gear"></i>
        <span class="menu-text">
            Protocal Section
        </span>
        <b class="arrow fa fa-angle-down"></b>
    </a>
    <b class="arrow"></b>
    <ul class="submenu">
        <li class="{{ $routeName === 'backend.protocalSection.name' ? 'open' : ''}}">
            <a href="{{ route('backend.protocalSection.name') }}">
                <i class="menu-icon fa fa-caret-right"></i>
                Section Name
            </a>
            <b class="arrow"></b>
        </li>
    </ul>
    <ul class="submenu">
        <li class="{{ $routeName === 'backend.protocalSection.index' ? 'open' : ''}}">
            <a href="{{ route('backend.protocalSection.index') }}">
                <i class="menu-icon fa fa-caret-right"></i>
                All Protocal
            </a>
            <b class="arrow"></b>
        </li>
    </ul>

    <ul class="submenu">
        <li class="{{ $routeName === 'backend.protocalSection.create' ? 'open' : ''}}">
            <a href="{{ route('backend.protocalSection.create') }}">
                <i class="menu-icon fa fa-caret-right"></i>
                Create Protocal
            </a>
            <b class="arrow"></b>
        </li>
    </ul>

</li>
