@props([
    "bgColor" => "orange",
    "fontColor" => "white",
    "rounded" => "true"
])

@php
    if (!function_exists("getBgColorButton")) {
        function getBgColorButton($theme) {
            return match ($theme) {
                "orange" => "bg-[#857208]",
                "red" => "bg-red-600",
                "blue" => "bg-[#110781]",
                "black" => "bg-black",
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
    if (!function_exists("getRounded")) {
        function getRounded($theme) {
            return match ($theme) {
                "true" => "rounded-2xl",
                "false" => "",
            };
        }
    }
@endphp
<button class=" text-white rounded-2xl text-xs px-3 py-[1px] sp:text-[10px] sp:py-0  {{ getBgColorButton($bgColor) }} {{ getFontColorButton($fontColor) }} {{ getRounded($rounded) }}">{{ $slot }}</button>
