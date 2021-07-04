     {{-- Site Config [Site info, about-us,Banner, Slider] --}}
        <li class="{{ strpos($routeName, 'backend.social') === 0 ? 'active open' : ''}}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-gear"></i>
                <span class="menu-text">
                    Social Media
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>




            <ul class="submenu">
                <li class="{{ $routeName === 'backend.social.index' ? 'open' : ''}}">
                    <a href="{{route('backend.social.index')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        All Link
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>

        </li>
