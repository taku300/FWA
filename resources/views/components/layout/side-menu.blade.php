@props([
    'status' => 'side-menu',
])

<div id="{{ $status }}" class="hidden fixed z-50 w-full h-full top-0 left-0">
    <div class="h-full flex">
        <div class="h-full flex-auto bg-black opacity-50">
        </div>
        <div class="h-full w-[250px] bg-black overflow-scroll">
            {{ $slot }}
        </div>
    </div>
</div>
