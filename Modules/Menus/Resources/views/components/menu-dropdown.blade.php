<div x-data="{ open: false }" @mouseover.away = "open = false" class="w-full h-full">
    <span @mouseover="open = true" >{{ $trigger }}</span>

    <div x-show="open">
        {{ $slot }}
    </div>
</div>
