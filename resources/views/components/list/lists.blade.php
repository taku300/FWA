<?php

/**
 * $value->category = お知らせフラグ
 * 1 = お知らせ
 * 2 = 大会情報
 */

?>

@foreach($newsList as $value)
<div class="py-5 border-t-[1px] border-black">
    <a href="">
        <div class="flex items-center">
            <p class="font-black mr-4">{{ $value->noticed_at }}</p>
            @switch($value->category)
            @case(1)
            <x-parts.button bg_color="orange" font_color="white">お知らせ</x-parts.button>
            @break
            @case(2)
            <x-parts.button bg_color="orange" font_color="white">大会情報</x-parts.button>
            @break
            @endswitch
        </div>
        <p class="mt-2 text-lg">{{ $value->detail }}</p>
        <p class="opacity-60">{{ $value->note }}</p>
    </a>
</div>
@endforeach