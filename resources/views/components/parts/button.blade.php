@props([
    "bg_color" => "orange",
    "font_color" => "white",
])

@php
    if (!function_exists("getBgColor")) {
        function getBgColor($theme) {
            return match ($theme) {
                "orange" => "bg-orange-400",
                "red" => "bg-red-600",
            };
        }
    }
@endphp

<button class=" bg-redw-[86px] h-[25px] text-white px-2 {{ getBgColor($bg_color) }}">{{ $slot }}</button>
