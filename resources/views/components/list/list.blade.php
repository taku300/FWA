<a href="{{ route('news.show', ['news' => $value['id']]) }}">
<div class="flex items-center justify-between">
        <div class="flex">
            <p class="mr-4 pc:text-sm sp:text-xs">{{ $value['noticed_at'] }}</p>
            <x-parts.button bgColor="{{ \CategoryConst::NEWS_CATEGORY_LIST[$value['category']]['color'] }}" fontColor="white">{{ \CategoryConst::NEWS_CATEGORY_LIST[$value['category']]['category'] }}</x-parts.button>
        </div>
        @auth
        <div>
            <a class="inline-block" href="{{ route('admins.news.edit', ['news' => $value['id']]) }}">
                <x-parts.button bgColor="black" fontColor="white">編集</x-parts.button>
            </a>
            <a href="{{ route('admins.news.destroy', ['news' => $value['id']]) }}">
                <x-parts.button bgColor="red" fontColor="white">消去</x-parts.button>
            </a>
        </div>
        @endauth
</div>
</a>
<a href="{{ route('news.show', ['news' => $value['id']]) }}">
    <p class="text-xl pc:text-lg sp:text-sm mt-2">{{ $value['title'] }}</p>
    <p class="opacity-60 mt-1 pc:text-sm sp:text-xs">{{ $value['note'] ? '※ ' . $value['note'] : '' }}</p>
</a>
