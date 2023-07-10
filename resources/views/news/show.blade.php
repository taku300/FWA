<x-layout.layout>
    <!-- main -->
    <section>
        <!-- title/movie -->
        <x-layout.container>
            <div class="relative">
                <!-- 速報有りのとき速報画像を表示 -->
                @if($newsDetail['preliminary_report_flag'] === 1)
                <img class="absolute -left-[5%] sp:-left-[4%] sp:top-3 z-50 h-[250px] sp:h-[146px]" src="{{ asset('images/parts/breaking_news.png') . config('cache.update_date') }}" alt="速報">
                @endif
                <div class="pt-[115px] sp:pt-[76px] pb-5 border-b border-black">
                    <p class="font-bold mb-2 pc:text-sm sp:text-xs">{{ $newsDetail['noticed_at'] }}</p>
                    <p class="text-xl pc:text-lg sp:text-sm">{{ $newsDetail['title'] }}</p>
                    <p class="opacity-60 mt-1 pc:text-sm sp:text-xs">{{ $newsDetail['noticed_at'] ? '※ ' . $newsDetail['noticed_at'] : '' }}</p>
                </div>
                <div class="absolute right-0 top-0 z-10">
                    <x-list.auth :value='$newsDetail'></x-list.auth>
                </div>
                @if($newsDetail['preliminary_report_flag'] === 1)
                <img class="absolute top-0 -right-[5%] sp:-right-[2%] w-[164px] sp:w-[86px] h-[185px] sp:h-[97px] object-contain" src="{{ asset('images/parts/hashibiroko.png') . config('cache.update_date') }}" alt="イメージキャラクター">
                @endif
            </div>
            @if ($newsDetail['iframe_path'])
            <div class="my-9 sp:my-5 text-center">
                <iframe class="inline-block w-[500px] sp:w-[90%] aspect-[700/400]" src="{{ $newsDetail['iframe_path'] }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            @endif
            <!-- 詳細 -->
            <div class="sp:pt-5">
                @if ($newsDetail['detail'])
                <div class="mb-7">
                    <h2 class="mb-2 text-lg font-black">詳細</h2>
                    <p class="text-sm">{{ $newsDetail['detail'] }}</p>
                </div>
                @endif
                @if ($newsDetail['news_documents'])
                <div class="mb-7">
                    <h2 class="mb-2 text-lg font-black">資料</h2>
                    @foreach ($newsDetail['news_documents'] as $document)
                    <a class="mb-5 text-sm block underline" href="{{ \Storage::url('news-documents/' . $document['document_path']) }}" download="{{ $document['title'] }}.pdf">{{ $document['title'] }}</a>
                    @endforeach
                    @endif
                </div>
                <div class="mb-7">
                    @if ($newsDetail['news_documents'])
                    <h2 class="mb-2 text-lg font-black">リンク</h2>
                    @foreach ($newsDetail['news_links'] as $link)
                    <a class="mb-5 text-sm block underline" href="{{ $link['link_path'] }}">{{ $link['title'] }}</a>
                    @endforeach
                    @endif
                </div>
                <div class="pt-16 grid grid-cols-3 gap-x-8 sp:gap-x-4 gap-y-[calc(((100vw_*_0.78_-_(32px_*_2))_/_3)_*_400/350_*_0.8)] s-pc:gap-y-[calc(((100vw_*_0.88_-_(32px_*_2))_/_3)_*_400/350_*_0.8)] sp:grid-cols-2 sp:gap-y-[calc(((100vw_*_0.94_-_(16px_*_2))_/_2)_*_400/350_*_0.8)]">
                    @if ($newsDetail['news_images'])
                    @foreach($newsDetail['news_images'] as $newsImage)
                    <div class="relative">
                        <img src="{{ \Storage::url(\CommonConst::NEWS_IMAGE_PATH_NAME . '/' . $newsImage['news_images_path']) }}" alt="お知らせ画像" class="object-cover object-top w-full aspect-[350/400]">
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </x-layout.container>
    </section>
</x-layout.layout>