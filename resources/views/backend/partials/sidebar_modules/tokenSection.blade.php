<li class="{{ strpos($routeName, 'backend.tokenSection') === 0 ? 'active open' : ''}}">
    <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-gear"></i>
        <span class="menu-text">
            Token Section
        </span>
        <b class="arrow fa fa-angle-down"></b>
    </a>
    <b class="arrow"></b>
    <ul class="submenu">
        <li class="{{ $routeName === 'backend.tokennomiks.name' ? 'open' : ''}}">
            <a href="{{ route('backend.tokenSection.name') }}">
                <i class="menu-icon fa fa-caret-right"></i>
                Section Name
            </a>
            <b class="arrow"></b>
        </li>
    </ul>
    <ul class="submenu">
        <li class="{{ $routeName === 'backend.tokenSection.index' ? 'open' : ''}}">
            <a href="{{ route('backend.tokenSection.index') }}">
                <i class="menu-icon fa fa-caret-right"></i>
                Left Side Data
            </a>
            <b class="arrow"></b>
        </li>
    </ul>
    <ul class="submenu">
        <li class="{{ $routeName === 'backend.tokenSection.create' ? 'open' : ''}}">
            <a href="{{ route('backend.tokenSection.create') }}">
                <i class="menu-icon fa fa-caret-right"></i>
                Create Data
            </a>
            <b class="arrow"></b>
        </li>
    </ul>

    <ul class="submenu">
        <li class="{{ $routeName === 'backend.tokenSection.right.index' ? 'open' : ''}}">
            <a href="{{ route('backend.tokenSection.right.index') }}">
                <i class="menu-icon fa fa-caret-right"></i>
                Right Side Data
            </a>
            <b class="arrow"></b>
        </li>
    </ul>
    <ul class="submenu">
        <li class="{{ $routeName === 'backend.tokenSection.footer.text' ? 'open' : ''}}">
            <a href="{{ route('backend.tokenSection.footer.text') }}">
                <i class="menu-icon fa fa-caret-right"></i>
                Footer Text
            </a>
            <b class="arrow"></b>
        </li>
    </ul>


</li>
