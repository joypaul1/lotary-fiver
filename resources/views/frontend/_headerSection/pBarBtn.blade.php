<div class="pBarBtn">
    @forelse ($cusMenus->where('header_menu', true) as $cusm)
        <a  href="{{ $cusm->link??' ' }}" target="_blank">
            <span>{{ $cusm->name??''}}</span>
        </a>
    @empty

    @endforelse

</div>

