@props([
    "bgColor" => "black",
])

@php
    if (!function_exists("getBgColorArrowButton")) {
        function getBgColorArrowButton($theme) {
            return match ($theme) {
                "black" => "bg-black hover:bg-black/80",
                "red" => "bg-red-600 hover:bg-red-500",

            };
        }
    }
@endphp

<button class="flex justify-between items-center px-4 w-80 sp:w-full h-12 {{ getBgColorArrowButton($bgColor) }}">
    <div class="text-white">{{ $slot }}</div>
    <img class=" h-3" src="{{ asset('images/parts/arrow.png') . config('cache.update_date') }}" alt="矢印">
</button>
