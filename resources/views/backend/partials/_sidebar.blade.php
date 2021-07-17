<div id="sidebar" class="sidebar responsive ace-save-state menu-min">
    <script type="text/javascript">
        try {
            ace.settings.loadState('sidebar')
        } catch (e) {
        }
    </script>

    @php
        $routeName = request()->route()->getName();
    @endphp

    <ul class="nav nav-list">
        {{-- Dashboard --}}
        @include('backend.partials.sidebar_modules.dashboard')

        {{-- Order --}}
        {{-- @include('backend.partials.sidebar_modules.order') --}}

        {{-- Purchase --}}
        {{-- @include('backend.partials.sidebar_modules.purchase') --}}

        {{-- Product --}}
        {{-- @include('backend.partials.sidebar_modules.product') --}}

         {{-- Customer --}}
        {{-- @include('backend.partials.sidebar_modules.customer') --}}

        {{-- Site Config --}}
        {{-- @include('backend.partials.sidebar_modules.site_config') --}}

        {{-- Site Config --}}
        @include('backend.partials.sidebar_modules.menuSection')

        {{-- Site Config --}}
        @include('backend.partials.sidebar_modules.social')

        {{-- header Section  --}}
        @include('backend.partials.sidebar_modules.headerSection')

        {{-- protocalSection Section  --}}
        @include('backend.partials.sidebar_modules.protocalSection')

        {{-- tokenSection Section  --}}
        @include('backend.partials.sidebar_modules.tokenSection')

        {{-- marketSection Section  --}}
        @include('backend.partials.sidebar_modules.marketSection')

        {{-- lottarySection Section  --}}
        @include('backend.partials.sidebar_modules.lottarySection')

        {{-- footer Section  --}}
        @include('backend.partials.sidebar_modules.footerSection')

    </ul>

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state"
           data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>
