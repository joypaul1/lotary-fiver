<div class="pBarBtn">
    @forelse ($cusMenus as $cusm)
        <a  href="{{ $cusm->link??' ' }}" target="_blank">
            <span>{{ $cusm->name??''}}</span>
        </a>
    @empty

    @endforelse

</div>

