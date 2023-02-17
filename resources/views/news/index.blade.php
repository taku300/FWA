<x-layout.layout>
    <!-- main -->
    <section>
        <div class="mt-32">
            <x-layout.container>
                <div class="mb-16">
                    <span>カテゴリー：</span>
                    @foreach(\CategoryConst::NEWS_CATEGORY_LIST as $category)
                    <x-parts.button bgColor="{{ $category['color'] }}">{{ $category['category'] }}</x-parts.button>
                    @endforeach
                </div>
                <!-- $newsList = お知らせ情報 -->
                <div class=" mt-32">
                    <x-list.lists :$newsList :$breakingNews></x-list.lists>
                </div>
                <div class="mt-4">
                    <x-parts.pagenation :$newsList></x-parts.pagenation>
                </div>
            </x-layout.container>
        </div>
    </section>
</x-layout.layout>
