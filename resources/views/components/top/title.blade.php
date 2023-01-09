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

<div class="text-center font-black {{ getTextColor($color) }}">
    <p class="text-9xl scale-x-[0.98] s-pc:text-8xl pc:text-7xl sp:text-5xl">{{ $en }}</p>
    <p class="text-xl">{{ $ja }}</p>
</div>
