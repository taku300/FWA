<div class="flex items-center justify-between">
    <div class="flex">
        <p class="mr-4 sp:text-sm">{{ $value['noticed_at'] }}</p>
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
<p class="mt-2 text-2xl pc:text-xl sp:text-lg">{{ $value['title'] }}</p>
<p class="opacity-60 mt-1">{{ '※ ' . $value['note'] }}</p>
