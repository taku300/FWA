<x-layout.top-layout>
    <!-- TOPICS -->
    <section>
        <!-- title -->
        <div class="flex justify-center items-center flex-col h-[700px]">
            <x-top.title>
                @slot('title')
                TOPICS
                @endslot
                @slot('subTitle')
                トピックス
                @endslot
            </x-top.title>
        </div>
        <!-- list -->
        <div class="mx-40 s-pc:mx-16 pc:mx-12 sp:mx-4">
            <!-- $newsList = お知らせ情報 -->
            <x-list.lists :$newsList></x-list.lists>
            <x-parts.button-arrow>お知らせ一覧</x-parts.button-arrow>
        </div>
    </section>

    <!-- image-center -->
    <div class="mt-[330px] mb-[330px] h-[627px] w-full bg-[url('/public/images/top/top_center.png')] bg-center bg-cover">
    </div>

    <!-- lifters -->
    <section>
        <div class="w-full h-[5000px] sp:h-[3000px] bg-[url('/public/images/top/center_parts.png')] bg-center bg-cover relative">
            <!-- lifters-title -->
            <div class="absolute left-[9%] top-[60px] sp:left-[50%] sp:translate-x-[-50%]">
                <x-top.title>
                    @slot('title')
                    LIFTERS
                    @endslot
                    @slot('subTitle')
                    選手紹介
                    @endslot
                </x-top.title>
            </div>
            <!-- lifter1 -->
            <div class="absolute top-[230px] right-[4.5%] s-pc:top-[350px] pc:top-[300px] sp:top-[250px]">
                <x-top.lifters-image src="{{ asset('/' . $lifterList[0]['image_path']) }}" alt="{{ asset('/' . $lifterList[0]['image_path']) }}"></x-top.lifters-image>
                <div class="absolute right-[60%] pc:right-[25%] sp:right-[20%] top-[70%] text-white">
                    <x-top.lifters-explanation :lifterList="$lifterList[0]"></x-top.lifters-explanation>
                </div>
            </div>
            <!-- lifter2 -->
            <div class="absolute top-[1200px] sp:top-[800px] left-[4.5%]">
                <x-top.lifters-image src="{{ asset('/' . $lifterList[1]['image_path']) }}" alt="{{ asset('/' . $lifterList[1]['image_path']) }}"></x-top.lifters-image>
                <div class="absolute top-[70%] left-[60%] sp:left-[20%]">
                    <x-top.lifters-explanation :lifterList="$lifterList[1]"></x-top.lifters-explanation>
                </div>
            </div>

            <!-- olympian -->
            <!-- olympian-title-vertical -->
            <span class="inline-block rotate-90 text-9xl font-black scale-110 text-white absolute top-[2700px] right-[-15%]  s-pc:text-7xl s-pc:right-[-10%] pc:hidden">OLYMPIAN</span>
            <!-- olympian-title-beside -->
            <div class="absolute top-[1700px] left-2/4 -translate-x-2/4 hidden pc:top-[2500px] pc:block sp:top-[1700px]">
                <div class="text-center font-black text-white">
                    <p class="text-9xl scale-x-[0.98] pc:text-7xl sp:text-5xl ">OLYMPIAN</p>
                </div>
            </div>
            <!-- ota -->
            <div class="absolute top-[2700px] left-[4.5%] sp:top-[1850px] sp:left-[10%]">
                <img class="w-[518px] pc:w-[350px] sp:w-[200px]" src="/images/top/ota.jpg" alt="">
                <div class="absolute top-[25%] left-[70%] sp:left-[50%]">
                    <div class="w-[500px] h-[500px]  pc:w-[400px] pc:h-[450px] sp:w-[200px] sp:h-[400px] text-white">
                        <div>
                            <span class="text-5xl font-black scale-x-[0.93] border-b-[1px] pl-16 pc:pl-7 pc:text-4xl sp:text-2xl">Kazuomi Ota</span>
                        </div>
                        <div class="pl-16 pc:pl-7">
                            <p class="mt-7 text-3xl pc:text-2xl sp:text-base">ロンドンオリンピック出場</p>
                            <p class="mt-3 text-2xl pc:text-1xl sp:text-base">全日本選手権○連覇</p>
                            <!-- pc -->
                            <div class="absolute bottom-0 text-2xl pc:text-xl sp:hidden">
                                <p>現在は教員として<br>若手選手を支える福岡のスーパースター</p>
                            </div>
                            <!-- sp -->
                            <div class="absolute hidden bottom-0 text-base sp:block sp:bottom-1/4">
                                <p>現在は教員として<br>若手選手を支える<br>福岡のスーパースター</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- movie_title この部分はmovieのsessionだがデザインの都合上本sessionに含める-->
            <div class="absolute left-[160px] bottom-[400px] pc:left-[100px] sp:left-2/4 sp:-translate-x-2/4 sp:bottom-[300px]">
                <x-top.title fontColor="white">
                    @slot('title')
                    MOVIE
                    @endslot
                    @slot('subTitle')
                    動画配信
                    @endslot
                </x-top.title>
            </div>
        </div>
    </section>
    <!-- movie -->
    <section>
        <div class="w-full aspect-[1000/1200]  flex items-center pc:aspect-[1000/1500] sp:aspect-[1000/2000]">
            <div class="w-11/12 h-full bg-black m-auto flex flex-col sp:w-full">
                <div class=" mx-[10%] py-24 text-white pc:py-12">
                    <p class=" text-white">福岡県ウエイトリフティング協会は、選手の活躍をより多くの人に知ってもらうため、公益財団法人福岡県スポーツ推進基金と連携して動画配信事業を行っています。</p>
                </div>
                <div class="flex-1 flex items-center">
                    <div class="w-[65%] h-5/6 mx-auto bg-white flex flex-col pc:w-[90%]">
                        <div class=" flex-1 flex justify-center items-center">
                            <iframe class="w-[90%] aspect-[560/320]" src="https://www.youtube.com/embed/OGPG-b5OOg0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                        <div class=" flex-1 flex justify-center items-center">
                            <a class="" href="https://fukuokasports.org/">
                                <img class="w-[90%] aspect-[65/35] m-auto" src="/images/top/f_sports.png" alt="公益財団法人福岡県スポーツ推進基金">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout.top-layout>
