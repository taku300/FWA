<x-layout.layout>
    <!-- main -->
    <section>
        <div class="mt-32">
            <x-layout.container>
                <div class="mb-16">
                    @foreach($breakingNews as $value)
                    <ul class="flex">
                        <li><a href="">{{ $value['id'] }}</a></li>
                        <li>{{ $value['noticed_at'] }}</li>
                        <li>{{ \CategoryConst::NEWS_CATEGORY_LIST[$value['category']]['category'] }}</li>
                        <li>{{ $value['title'] }}</li>
                        <li>{{ $value['note'] }}</li>
                    </ul>
                    @endforeach
                    <span>カテゴリー：</span>
                    @foreach(\CategoryConst::NEWS_CATEGORY_LIST as $category)
                    <x-parts.button bgColor="{{ $category['color'] }}">{{ $category['category'] }}</x-parts.button>
                    @endforeach
                </div>
                <!-- $newsList = お知らせ情報 -->
                <x-list.lists :$newsList></x-list.lists>
                <div class="mt-4">
                    <x-parts.pagenation :$newsList></x-parts.pagenation>
                </div>
            </x-layout.container>
        </div>
    </section>
</x-layout.layout>