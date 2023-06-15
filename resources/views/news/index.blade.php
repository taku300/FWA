<x-layout.layout>
    <!-- main -->
    <section>
        <div class="mt-32">
            <x-layout.container>
                @auth
                <div class="relative">
                    <a href="{{ route('admins.news.create') }}" class="mr-1 text-right absolute right-0 -top-16">
                        <x-parts.button class="" bgColor="black" fontColor="white">新規登録</x-parts.button>
                    </a>
                </div>
                @endauth
                <!-- <div class="mb-16">
                    <span>カテゴリー：</span>
                    @foreach(\CategoryConst::NEWS_CATEGORY_LIST as $category)
                    <x-parts.button bgColor="{{ $category['color'] }}">{{ $category['category'] }}</x-parts.button>
                    @endforeach
                </div> -->
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
