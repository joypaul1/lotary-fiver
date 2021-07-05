<li class="{{ strpos($routeName, 'backend.lottarySection') === 0 ? 'active open' : ''}}">
    <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-gear"></i>
        <span class="menu-text">
            Lottary Section
        </span>
        <b class="arrow fa fa-angle-down"></b>
    </a>
    <b class="arrow"></b>
    <ul class="submenu">
        <li class="{{ $routeName === 'backend.lottarySection.name' ? 'open' : ''}}">
            <a href="{{ route('backend.lottarySection.name') }}">
                <i class="menu-icon fa fa-caret-right"></i>
                Section Name
            </a>
            <b class="arrow"></b>
        </li>
    </ul>
    <ul class="submenu">
        <li class="{{ $routeName === 'backend.lottarySection.index' ? 'open' : ''}}">
            <a href="{{ route('backend.lottarySection.index') }}">
                <i class="menu-icon fa fa-caret-right"></i>
                All Data
            </a>
            <b class="arrow"></b>
        </li>
    </ul>
    <ul class="submenu">
        <li class="{{ $routeName === 'backend.lottarySection.create' ? 'open' : ''}}">
            <a href="{{ route('backend.lottarySection.create') }}">
                <i class="menu-icon fa fa-caret-right"></i>
                Create Data
            </a>
            <b class="arrow"></b>
        </li>
    </ul>
    <ul class="submenu">
        <li class="{{ $routeName === 'backend.lottarySection.bg' ? 'open' : ''}}">
            <a href="{{ route('backend.lottarySection.bg') }}">
                <i class="menu-icon fa fa-caret-right"></i>
                Heighlight Image
            </a>
            <b class="arrow"></b>
        </li>
    </ul>

</li>
