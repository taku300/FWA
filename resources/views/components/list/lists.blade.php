<?php

/**
 * $value->category = お知らせフラグ
 * 1 = お知らせ
 * 2 = 大会情報
 */
?>

@foreach($newsList as $key => $value)
<a href="{{ route('news.show', ['news' => $value['id']]) }}">
    <div class="py-5 border-t-[1px] border-black {{ (count($newsList) - 1 == $key) ? 'border-b-[1px]' : '' }}">
        <div class="flex items-center">
            <p class="font-black mr-4">{{ $value->noticed_at }}</p>
            <x-parts.button bgColor="{{ \CategoryConst::CATEGORY_LIST['color'][$value->category] }}" fontColor="white">{{ \CategoryConst::NEWS_CATEGORY_LIST[$value->category]['category'] }}</x-parts.button>
        </div>
        <p class="mt-2 text-lg">{{ $value['title'] }}</p>
        <p class="opacity-60">{{ $value->note }}</p>
</a>
</div>
@endforeach