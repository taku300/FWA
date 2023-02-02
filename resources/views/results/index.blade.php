<x-layout.layout float="apply">
    <!-- main -->
    <section>
        <div class="min-h-[2500px] flex">
            <div class="w-5/6 pc:w-full">
                <div class="mt-32 ml-[10.6%] mb-6 s-pc:ml-[5.6%] pc-sp:ml-3">
                    <p class=" text-4xl font-black scale-x-[0.98] translate-x-[-1%]">2022</p>
                    <p class=" text-sm">令和４年度</p>
                </div>
                <!-- 検索ボタン -->
                <div id="show-search-menu" class="text-right hidden pc:block">
                    <x-parts.button class="" bgColor="black" fontColor="white">Search</x-parts.button>
                </div>
                <!-- 検索サイドメニュー -->
                <x-layout.side-menu status="search-menu">
                    <div class="ml-8 mt-60">
                        <x-search.archive :$archiveYears></x-search.archive>
                    </div>
                </x-layout.side-menu>
                <div>
                    <div>
                        <ul class="flex border-b border-inherit pc-sp:hidden">
                            <li class="shrink-[5] w-40 h-11"></li>
                            <li class="font-black p-[10px] shrink-0 w-[150px] h-11">開催日</li>
                            <li class="font-black p-[10px] shrink-1 w-[415px] h-11">大会名</li>
                            <li class="font-black p-[10px] shrink-1 w-[225px] h-11">開催地</li>
                            <li class="font-black p-[10px] shrink-0 w-20 h-11 text-center">要　項</li>
                            <li class="font-black p-[10px] shrink-0 w-20 h-11 text-center">結　果</li>
                        </ul>
                    </div>
                    <!-- TODO:該当するデータがない場合は該当するデータがありませんと表示 -->
                    @foreach ($resultList as $value)
                    <div>
                        <ul class="flex border-spacing-1 pc-sp:block pc-sp:border-t pc-sp:border-inherit">
                            <li class="shrink-[5] w-40 h-11 s-pc:hidden"></li>
                            <li class="p-[10px] shrink-0 w-[150px] h-11 border-l border-inherit pc-sp:w-full"><span class="hidden pc-sp:inline font-black mr-3">開催日</span>{{ date('m/d', strtotime($value->started_at)) }} ~ {{ date('m/d', strtotime($value->ended_at)) }}</li>
                            <li class="p-[10px] shrink-1 w-[415px] h-11 border-l border-inherit pc-sp:w-full"><span class="hidden pc-sp:inline font-black mr-3">大会名</span>{{ $value->name }}</li>
                            <li class="p-[10px] shrink-1 w-[225px] h-11 border-l border-inherit pc-sp:w-full"><span class="hidden pc-sp:inline font-black mr-3">開催地</span>{{ $value->venue }}</li>
                            <!-- TODO: href="{{ $value->requirement_path }}" 差し替え -->
                            <li class="p-[10px] shrink-0 w-20 h-11 border-l border-inherit  pc-sp:w-full pc-sp:flex"><span class="hidden pc-sp:inline font-black mr-3">要　項</span><a href=""><img src="images/parts/pdf.png" alt="pdf" class=" w-5 m-auto pc-sp:ml-5"></a></li>
                            <!-- TODO: href="{{ $value->result_path }}" 差し替え -->
                            <li class="p-[10px] shrink-0 w-20 h-11 border-l border-inherit  pc-sp:w-full pc-sp:flex"><span class="hidden pc-sp:inline font-black mr-3">結　果</span><a href=""><img src="images/parts/pdf.png" alt="pdf" class=" w-5 m-auto pc-sp:ml-5"></a></li>
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- アーカイブ -->
            <div class="w-60 bg-black pc:hidden">
                <div class="ml-8 mt-60">
                    <x-search.archive :$archiveYears></x-search.archive>
                </div>
            </div>
        </div>
    </section>
</x-layout.layout>