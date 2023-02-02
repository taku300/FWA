@props([
    "textColor" => "black",
])

@php
    if (!function_exists("getLifterTitleTextColor")) {
        function getLifterTitleTextColor($theme) {
            return match ($theme) {
                "blue" => [
                  "border" => "border-[#1500FF]",
                  "text" => "text-[#1500FF]",
                  ],
                "red" => [
                  "border" => "border-[#FF0404]",
                  "text" => "text-[#FF0404]",
                  ],
                "black" => "text-black",
            };
        }
    }
@endphp

<div class="text-6xl font-black pl-[11%] border-b-2 {{ getLifterTitleTextColor($textColor)['border']  }} s-pc:pl-[6%] sp:text-5xl sp:pl-[3%]"><span class="border-b-8 {{ getLifterTitleTextColor($textColor)['border']  }} {{ getLifterTitleTextColor($textColor)['text']  }}">{{ $slot }}</span></div>
