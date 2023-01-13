@props([
    "bg_color" => "black",
])

@php
    if (!function_exists("getBgColorArrowButton")) {
        function getBgColorArrowButton($theme) {
            return match ($theme) {
                "black" => "bg-black",
            };
        }
    }
@endphp

<button class="flex justify-between items-center px-4 w-80 sp:w-full h-12 {{ getBgColorArrowButton($bg_color) }}">
    <div class="text-white">{{ $slot }}</div>
    <img class=" h-3" src="/images/parts/arrow.png" alt="矢印">
</button>
