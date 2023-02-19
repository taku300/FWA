<x-layout.layout>
    <!-- main -->
    <section>
        <!-- title/movie -->
        <x-layout.container>
        <div class="relative">
            <!-- 速報有りのとき速報画像を表示 -->
            <img class="absolute -left-[5%] sp:-left-[4%] sp:top-3 z-50 h-[250px] sp:h-[146px]" src="{{ asset('images/parts/breaking_news.png') }}" alt="">
            <div class="pt-[115px] sp:pt-[76px] pb-5 border-b border-black">
                <p class="font-bold mb-2 pc:text-sm sp:text-xs">2022/12/08</p>
                <p class="text-xl pc:text-lg sp:text-sm">ここに大会内容を入力してくださいここに大会内容を入力してくださいここに大会内容を入力してください。</p>
                <p class="opacity-60 mt-1 pc:text-sm sp:text-xs">※これは注意書きです</p>
            </div>
            <img class="absolute top-0 -right-[5%] sp:-right-[2%] w-[164px] sp:w-[86px] h-[185px] sp:h-[97px] object-contain" src="{{ asset('images/parts/hashibiroko.png') }}" alt="">
        </div>
        <div class="my-9 sp:my-5 text-center">
            <iframe class="inline-block w-[500px] sp:w-[90%] aspect-[700/400]" src="https://www.youtube.com/embed/OGPG-b5OOg0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <!-- 詳細 -->
        <div class="sp:pt-5">
            <div class="mb-7">
                <h2 class="mb-2 text-lg font-black">詳細</h2>
                <p class="text-sm">ここに詳細情報を入力ここに詳細情報を入力ここに詳細情報を入力ここに詳細情報を入力ここに詳細情報を入力ここに詳細情報を入力ここに詳細情報を入力ここに詳細情報を入力ここに詳細情報を入力ここに詳細情報を入力ここに詳細情報を入力ここに詳細情報を入力ここに詳細情報を入力ここに詳細情報を入力ここに詳細情報を入力ここに詳細情報を入力ここに詳細情報を入力ここに詳細情報を入力</p>
            </div>
            <div class="mb-7">
                <h2 class="mb-2 text-lg font-black">資料</h2>
                <a class="mb-5 text-sm block underline" href="">ここに資料を追加します</a>
                <a class="mb-5 text-sm block underline" href="">ここに資料を追加します</a>
            </div>
            <div class="mb-7">
                <h2 class="mb-2 text-lg font-black">リンク</h2>
                <a class="mb-5 text-sm block underline" href="">ここにリンクを追加します</a>
                <a class="mb-5 text-sm block underline" href="">ここにリンクを追加します</a>
            </div>
        </div>
        </x-layout.container>
    </section>
</x-layout.layout>
