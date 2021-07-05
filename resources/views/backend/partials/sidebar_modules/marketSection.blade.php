<li class="{{ strpos($routeName, 'backend.marketplaceSection') === 0 ? 'active open' : ''}}">
    <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-gear"></i>
        <span class="menu-text">
            Market Section
        </span>
        <b class="arrow fa fa-angle-down"></b>
    </a>
    <b class="arrow"></b>
    <ul class="submenu">
        <li class="{{ $routeName === 'backend.marketplaceSection.name' ? 'open' : ''}}">
            <a href="{{ route('backend.marketplaceSection.name') }}">
                <i class="menu-icon fa fa-caret-right"></i>
                Section Name
            </a>
            <b class="arrow"></b>
        </li>
    </ul>
    <ul class="submenu">
        <li class="{{ $routeName === 'backend.marketplaceSection.index' ? 'open' : ''}}">
            <a href="{{ route('backend.marketplaceSection.index') }}">
                <i class="menu-icon fa fa-caret-right"></i>
                All Data
            </a>
            <b class="arrow"></b>
        </li>
    </ul>
    <ul class="submenu">
        <li class="{{ $routeName === 'backend.marketplaceSection.create' ? 'open' : ''}}">
            <a href="{{ route('backend.marketplaceSection.create') }}">
                <i class="menu-icon fa fa-caret-right"></i>
                Create Data
            </a>
            <b class="arrow"></b>
        </li>
    </ul>

</li>
