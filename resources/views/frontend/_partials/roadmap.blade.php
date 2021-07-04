<section id="roadmap" class="roadmap lightBLack">
    <canvas id="roadmapBg"></canvas>
    <div class="container">
        <h2>
            ASSN PROTOCOL
        </h2>
        {{-- @dd($protocals, 'sss') --}}
        @if ($protocal)
        <div class="rmWrapper">
            @foreach ($protocol as $pro)
                <div class="rmItem">
                    <span class="itemNumber"></span>
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
                            {!!  $pro->description??'' !!}
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
        @endif

    </div>
</section>
