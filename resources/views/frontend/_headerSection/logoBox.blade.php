<div class="logoBox">
    <a href="/" class="headerLogo">
        <img src="{{asset($logo??' ') }}" alt="logo">
    </a>
    {{--  --}}
    @forelse ($cusMenus->where('header_mobile_menu', true) as $cusheader)
        <a href="{{$cusheader->link??'#'}}" class="logoBtn" target="_blank">
            <span>{{$cusheader->name??' '}}</span>

        </a>
    @empty

    @endforelse

    {{--  --}}
</div>
