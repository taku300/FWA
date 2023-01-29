@props([
    'fontColor' => 'black'
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

<div class="text-center font-black {{ getTextColor($fontColor) }}">
    <p class="text-9xl scale-x-[0.98] s-pc:text-8xl pc:text-7xl sp:text-5xl">{{ $title }}</p>
    <p class="text-xl mt-2">{{ $subTitle }}</p>
</div>
