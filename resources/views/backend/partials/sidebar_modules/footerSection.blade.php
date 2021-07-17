<li class="{{ strpos($routeName, 'backend.footer.Section') === 0 ? 'active open' : ''}}">
    <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-gear"></i>
        <span class="menu-text">
            Footer Section
        </span>
        <b class="arrow fa fa-angle-down"></b>
    </a>
    <b class="arrow"></b>
    <ul class="submenu">
        <li class="{{ $routeName === 'backend.footer.Section.index' ? 'open' : ''}}">
            <a href="{{ route('backend.footer.Section.index') }}">
                <i class="menu-icon fa fa-caret-right"></i>
               Footer Text
            </a>
            <b class="arrow"></b>
        </li>
    </ul>
</li>
