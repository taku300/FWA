<x-layout.layout>
    <!-- main -->
    <section>
        <div class="mt-32">
            <x-layout.container>
                <div class="mb-16">
                    <span>カテゴリー：</span>
                    @foreach(\CategoryConst::CATEGORY_LIST as $category)
                        <x-parts.button bgColor="{{ $category['color'] }}">{{ $category['category'] }}</x-parts.button>
                    @endforeach
                </div>
                <!-- $newsList = お知らせ情報 -->
                <x-list.lists :$newsList></x-list.lists>
                <div class="mt-4">
                    <x-parts.pagenation></x-parts.pagenation>
                </div>
            </x-layout.container>
        </div>
    </section>
</x-layout.layout>
