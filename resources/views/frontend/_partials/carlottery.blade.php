
    <section id="carlottery" class="carlottery darkBLack">
        <div class="background-container">
            <div class="blinkStars"></div>
            <div class="twinkling"></div>
        </div>
        <div class="container">
            <h2>
                {{ $sectionName[3]->name??' ' }}
            </h2>
            <figure>
                @if ($lotteryBg)
                    <img src="{{ asset($lotteryBg->image)??' ' }}" alt="{{ $lotteryBg->image }}">
                @endif
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
