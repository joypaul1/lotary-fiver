<div class="headerRight">
    <a class="menuBtn">
        <span class="menuOpen">
            <i class="fas fa-bars"></i>
        </span>
        <span class="menuClose">
            <i class="fas fa-times"></i>
        </span>
    </a>

    <nav id="menu">
        <ul class="container">
            <li class="meuItem">
                <div class="pBarBtn">
                    @forelse ($cusMenus->where('mobile_menu', true) as $cusm)
                        <a  href="{{ $cusm->link??' ' }}" target="_blank">
                            <span>{{ $cusm->name??''}}</span>
                        </a>
                    @empty
                    @endforelse

                </div>
            </li>
            {{-- <li class="meuItem">
                <a href="">
                    <img src="src/media/image/Gold-eagle.png" alt="">
                    <span>Whitepaper</span>
                </a>
            </li> --}}

            <li class="meuItem">
                <a href="#roadmap">
                    <img src="{{asset('frontend') }}/src/media/image/Gold-eagle.png" alt="">
                    <span>{{ $sectionName[0]->name??" "  }}</span>
                </a>
            </li>
            <li class="meuItem">
                <a href="#tokenomiks">
                    <img src="{{asset('frontend') }}/src/media/image/Gold-eagle.png" alt="">
                    <span>{{ $sectionName[1]->name??" "  }}</span>
                </a>
            </li>
            <li class="meuItem">
                <a href="#nftmarket">
                    <img src="{{asset('frontend') }}/src/media/image/Gold-eagle.png" alt="">
                    <span>{{ $sectionName[2]->name??" "  }}</span>
                </a>
            </li>
            <li class="meuItem">
                <a href="#carlottery">
                    <img src="{{asset('frontend') }}/src/media/image/Gold-eagle.png" alt="">
                    <span>{{ $sectionName[3]->name??" "  }}</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
