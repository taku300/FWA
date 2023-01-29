@props([
    "bgColor" => "orange",
    "fontColor" => "white",
])

@php
    if (!function_exists("getBgColorButton")) {
        function getBgColorButton($theme) {
            return match ($theme) {
                "orange" => "bg-orange-400",
                "red" => "bg-red-600",
            };
        }
    }
    if (!function_exists("getFontColorButton")) {
        function getFontColorButton($theme) {
            return match ($theme) {
                "white" => "text-white",
                "black" => "text-black",
            };
        }
    }
@endphp

<button class=" h-[25px] text-white px-2 {{ getBgColorButton($bgColor) }} {{ getFontColorButton($fontColor) }}">{{ $slot }}</button>
