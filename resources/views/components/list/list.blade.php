<div class="flex items-center justify-between">
    <div class="flex">
        <p class="mr-4 pc:text-sm sp:text-xs">{{ $value['noticed_at'] }}</p>
        <x-parts.button bgColor="{{ \CategoryConst::NEWS_CATEGORY_LIST[$value['category']]['color'] }}" fontColor="white">{{ \CategoryConst::NEWS_CATEGORY_LIST[$value['category']]['category'] }}</x-parts.button>
    </div>
</div>
<p class="text-xl pc:text-lg sp:text-sm mt-2">{{ $value['title'] }}</p>
<p class="opacity-60 mt-1 pc:text-sm sp:text-xs">{{ $value['note'] ? '※ ' . $value['note'] : '' }}</p>