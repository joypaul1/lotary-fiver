<section id="tokenomiks" class="tokenomiks lightBLack">
    <div class="container">
        <h2>
            {{ $sectionName[1]->name??' ' }}
        </h2>
        {{-- @foreach ($market as $mar)
            @dd($mar)
        @endforeach --}}
        <div class="tkWrapper">
            <div class="progress">
                <div class="pBarBtn">
                    @forelse ($cusMenus->where('is_token_menu', true) as $cusm)
                        <a  href="{{ $cusm->link??' ' }}" target="_blank">
                            <span>{{ $cusm->name??''}}</span>
                        </a>
                    @empty

                    @endforelse

                </div>
                <div class="pgContainer" data-aos="fade-up">
                    @forelse ($tokenLeft as $left)
                        <div class="pgBr">
                            <p class="pgName">
                                {{$left->title??''}}
                            </p>
                            <div class="pgBox">
                                <span class="pgLne"></span>
                                <div class="pgVal">
                                    <h4 class="pgPtg">
                                        <span class="pgPtgNbr">{{ $left->percent??'' }}</span>
                                        <span class="pgPtgSgn">%</span>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    @empty

                    @endforelse


                </div>
                <p class="tkBtmTxt" data-aos="fade-up">
                    {{ $tokenFooter->description??' ' }}
                </p>
            </div>
            <div class="tkCounter" data-aos="fade-up">
                <div class="tkInner">
                    @forelse ($tokenRight as $right)
                        <div class="tkItem">

                            <h6>
                                {{ ($right->amount??' ') }}
                            </h6>
                            <p>
                               {{ $right->title??' ' }}
                            </p>
                        </div>
                    @empty

                    @endforelse


                </div>
                <div class="pgAnimation">
                    <span class="pgaContent"></span>
                </div>
            </div>
        </div>
    </div>
</section>
