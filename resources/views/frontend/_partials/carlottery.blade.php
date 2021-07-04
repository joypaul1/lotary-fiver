
    <section id="carlottery" class="carlottery darkBLack">
        <div class="background-container">
            <div class="blinkStars"></div>
            <div class="twinkling"></div>
        </div>
        <div class="container">
            <h2>
                exotic car lottery
            </h2>
            <figure>
                <img src="{{asset('frontend') }}/src/media/image/lambo-360.gif" alt="lamborgini">
            </figure>
            <article>
                @if ($lottery)
                    @foreach ($lottery as $lot)
                        <div>
                            <h3>
                                {{$lot->title??' '}}
                            </h3>
                            <p>
                               {!! $lot->description??' ' !!}
                            </p>
                        </div>
                    @endforeach

                @endif


            </article>
        </div>
    </section>
