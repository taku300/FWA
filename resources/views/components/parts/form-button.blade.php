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
@endphp

{{ Form::submit($slot, ['class'=>'h-[50px] w-28'. ' ' . getBgColorButton($bgColor) . ' ' . getFontColorButton($fontColor)]) }}
<p class=" items-center"></p>
