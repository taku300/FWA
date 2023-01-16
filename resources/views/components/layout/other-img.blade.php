@props([
  'color' => 'black'
])

@php
    if (!function_exists("getTextColor")) {
        function getTextColor($theme) {
            return match ($theme) {
                "black" => "text-black",
                "white" => "text-white",
            };
        }
    }
@endphp

<div class="h-[627px] w-full bg-[url('/public/images/top/top1.png')] bg-center bg-cover fixed">
    <div class="absolute bottom-5 left-5 text-start font-black {{ getTextColor($color) }}">
        <p class="text-9xl scale-x-[0.98] s-pc:text-8xl pc:text-7xl sp:text-5xl">{{ $en }}</p>
        <p class="text-2xl scale-x-[0.70]">{{ $ja }}</p>
    </div>
</div>
