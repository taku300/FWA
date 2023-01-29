@props([
  'textColor' => 'black',
  'fontSize'  => 'black',
])

@php
    if (!function_exists("getHeroTextColor")) {
        function getHeroTextColor($theme) {
            return match ($theme) {
                "black" => "text-black",
                "white" => "text-white",
            };
        }
    }
    if (!function_exists("getHeroTextFont")) {
        function getHeroTextFont($theme) {
            return match ($theme) {
                "black" => "font-black",
            };
        }
    }
@endphp

<div class="h-[730px] relative">
    <img src="{{ $heroUrl }}" alt="" class="w-full h-full object-cover">
    <div class="absolute bottom-10 left-16 {{ getHeroTextColor($textColor) }} {{ getHeroTextFont($fontSize) }} sp:left-1/2 sp:-translate-x-1/2 sp:text-center">
        <p class="text-8xl scale-x-[0.98] translate-x-[-2%] s-pc:text-7xl pc:text-6xl sp:text-5xl">{{ $heroTitle }}</p>
        <p class="text-xl mt-3">{{ $heroSubTitle }}</p>
    </div>
</div>
