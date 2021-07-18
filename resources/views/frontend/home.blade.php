@extends('frontend.layouts.app')

@section('content')

<!-- header content start -->
<header id="header" class="header">
    <div class="headerContainer">
        @include('frontend._headerSection.logoBox',     ['logo' =>$headerSection->logo??' ','cusMenus' =>$cusMenus??[]])
        @include('frontend._headerSection.pBarBtn',     ['cusMenus' =>$cusMenus??[]])
        @include('frontend._headerSection.headerRight', ['cusMenus' =>$cusMenus??[], 'sectionName'=>$sectionName] )
    </div>
</header>
<!-- /header content end -->


<!-- main content start here -->
<main id="main" class="main">

    {{--  hero  --}}
    @include('frontend._partials.hero', ['coin' => $headerSection->coin_gif??' ', 'adjudicator' =>  $headerSection->person_gif??' ', 'bg' => $headerSection->background_image??'', 'title' => $headerSection->title??' '] )

    {{--  roadmap  --}}
    <section id="roadmap" class="roadmap lightBLack">
        <canvas id="roadmapBg"></canvas>
        <div class="container">
            <h2>
               {{ $sectionName[0]->name??' ' }}
            </h2>
            @if ($protocal)
            {{-- @dd($protocal) --}}
            <div class="rmWrapper">
                @foreach ($protocal as $pro)
                    <div class="rmItem">
                        <span class="itemNumber" style="background-image: url('{{ asset($pro->logo)??'' }}')"></span>
                        <h4 class="itemHead">
                            {{ $pro->highlight??'' }}
                        </h4>
                        <div class="itemText" data-aos="fade-left">
                            <div class="itemImg">
                                <div class="theImg">
                                    <figure>
                                        <img src="{{asset($pro->image??" ") }}" alt="logo">
                                    </figure>
                                </div>
                                <article>
                                    <p>
                                        {{ $pro->title??'' }}
                                    </p>
                                </article>
                            </div>
                            <div class="itemList">
                                <ul class="theList">
                                    @forelse ($pro->descriptions as $proDes)
                                        <li>
                                            <span>-</span>{{ $proDes->description??'' }}
                                        </li>
                                    @empty

                                    @endforelse

                                <ul>
                                {{-- {!!  $pro->description??'' !!} --}}
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
            @endif

        </div>
    </section>


    {{--  tokenomiks  --}}
    @include('frontend._partials.tokenomiks', ['tokenLeft' =>$tokenLeft??[], 'tokenRight' => $tokenRight,
    'sectionName'=>$sectionName,'cusMenus'=> $cusMenus, 'tokenFooter' => $tokenFooter])

    {{--  nftmarket  --}}
    @include('frontend._partials.nftmarket', ['market' => $market??[ ],'sectionName'=>$sectionName,])

    {{--  carlottery  --}}
    @include('frontend._partials.carlottery', ['lottery' => $lottery?? [ ], 'lotteryBg' => $lotteryBg,'sectionName'=>$sectionName,])


</main>
<!-- /main content end here -->

@endsection
