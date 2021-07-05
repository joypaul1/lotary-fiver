<li class="{{ strpos($routeName, 'backend.headerSection') === 0 ? 'active open' : ''}}">
    <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-gear"></i>
        <span class="menu-text">
            Header Section
        </span>
        <b class="arrow fa fa-angle-down"></b>
    </a>
    <b class="arrow"></b>
    <ul class="submenu">
        <li class="{{ $routeName === 'backend.headerSection.title_logo' ? 'open' : ''}}">
            <a href="{{ route('backend.headerSection.title_logo') }}">
                <i class="menu-icon fa fa-caret-right"></i>
                Title & Logo
            </a>
            <b class="arrow"></b>
        </li>
    </ul>
    <ul class="submenu">
        <li class="{{ $routeName === 'backend.headerSection.image' ? 'open' : ''}}">
            <a href="{{ route('backend.headerSection.image') }}">
                <i class="menu-icon fa fa-caret-right"></i>
                Header Image
            </a>
            <b class="arrow"></b>
        </li>
    </ul>
</li>
