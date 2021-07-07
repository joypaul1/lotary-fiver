<section id="nftmarket" class="nftmarket darkBLack">
    <div class="container">
        <h2>
            {{ $sectionName[2]->name??' ' }}
        </h2>
          @foreach ($market as $mar)
            {{-- @dd($mar) --}}
            <div class="nmItem">
                <figure data-aos="fade-right">
                    <img src="{{asset( $mar->image??' ') }}" alt="">
                </figure>
                <article data-aos="fade-left">
                    <h3>
                        {{$mar->title??" " }}
                    </h3>
                    <div>
                        <p>
                            {!! $mar->description??" " !!}
                        </p>
                    </div>
                </article>
            </div>
        @endforeach


    </div>
</section>
