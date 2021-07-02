@extends('frontend.layouts.app')

@section('content')

<!-- header content start -->
<header id="header" class="header">
    <div class="headerContainer">

        @include('frontend._headerSection.logoBox')
        @include('frontend._headerSection.pBarBtn')
        @include('frontend._headerSection.headerRight')

    </div>
</header>
<!-- /header content end -->


<!-- main content start here -->
<main id="main" class="main">

    {{--  hero  --}}
    @include('frontend._partials.hero')

    {{--  roadmap  --}}
    @include('frontend._partials.roadmap')

    {{--  tokenomiks  --}}
    @include('frontend._partials.tokenomiks')

    {{--  nftmarket  --}}
    @include('frontend._partials.nftmarket')

    {{--  carlottery  --}}
    @include('frontend._partials.carlottery')


</main>
<!-- /main content end here -->

@endsection
