<x-layout.layout>
    <!-- main -->
    <section>
        <x-layout.container>
            <div class="flex justify-center my-14 sp:my-8">
                <img class="w-[186px] h-[184px] sp:w-[93px] sp:h-[92px]" src="{{ asset('images/layout/logo_b.png') . config('cache.update_date') }}" alt="ロゴ">
            </div>
            <div class="flex justify-between py-10 sp:block sp:py-12">
                <!-- 協会概要・役員名簿 -->
                <div class="w-[50%] sp:w-full">
                    <div class="mb-24">
                        <h2 class="text-4xl font-black -translate-x-5 sp:-translate-x-0">協会概要</h2>
                        <dl class="pt-10">
                            <dt class="text-sm float-left font-black pb-8">名称</dt>
                            <dd class="text-sm pl-[20%] pb-8 sp:pl-[25%]">福岡県ウエイトリフティング協会</dd>
                            <dt class="text-sm float-left font-black pb-8">英語表記</dt>
                            <dd class="text-sm pl-[20%] pb-8 sp:pl-[25%]">Fukuoka Weightlifting Association</dd>
                            <dt class="text-sm float-left font-black pb-8">創立</dt>
                            <dd class="text-sm pl-[20%] pb-8 sp:pl-[25%]">1948（昭和23年）4月1日</dd>
                            <dt class="text-sm float-left font-black pb-8">所在地</dt>
                            <dd class="text-sm pl-[20%] sp:pl-[25%]">福岡県北九州市八幡西区元城町1-1</dd>
                            <dd class="text-sm pl-[20%] pb-8 sp:pl-[25%]">福岡県立八幡中央高等学校</dd>
                            <dt class="text-sm float-left font-black pb-8">メール</dt>
                            <dd class="text-sm pl-[20%] pb-8 sp:pl-[25%]">fukuokaweight@gmail.com</dd>
                            @if(\Storage::exists($documents[1]))
                            <dt class="text-sm float-left font-black pt-[10px] pb-8">定款</dt>
                            <dd class="pl-[35%] pb-8 sp:pl-[40%]"><a href="{{ \Storage::url($documents[1]) }}" download="articles_of_incorporation.pdf"><img class="w-[29px] h-[40px]" src="{{ asset('images/parts/pdf.png') . config('cache.update_date') }}" alt="定款"></a></dd>
                            @endif
                            @if(\Storage::exists($documents[2]))
                            <dt class="text-sm float-left font-black pt-[10px] pb-8">ガバナンスコード</dt>
                            <dd class="pl-[35%] pb-8 sp:pl-[40%]"><a href="{{ \Storage::url($documents[2]) }}" download="governance_code.pdf"><img class="w-[29px] h-[40px]" src="{{ asset('images/parts/pdf.png') . config('cache.update_date') }}" alt="ガバナンスコード"></a></dd>
                            @endif
                            @if(\Storage::exists($documents[3]))
                            <dt class="text-sm float-left font-black pt-[10px] pb-8">年間計画</dt>
                            <dd class="pl-[35%] pb-8 sp:pl-[40%]"><a href="{{ \Storage::url($documents[3]) }}" download="yearly_schedule.pdf"><img class="w-[29px] h-[40px]" src="{{ asset('images/parts/pdf.png') . config('cache.update_date') }}" alt="年間計画"></a></dd>
                            @endif
                        </dl>
                    </div>
                    <div>
                        <h2 class="text-4xl font-black -translate-x-5 sp:-translate-x-0">役員名簿</h2>
                        <dl class="pt-10">
                            <dt class="text-sm float-left font-black pb-8">会長</dt>
                            <dd class="text-sm pl-[20%] pb-8 sp:pl-[25%]">守昌宏</dd>
                            <dt class="text-sm float-left font-black pb-8">理事長</dt>
                            <dd class="text-sm pl-[20%] pb-8 sp:pl-[25%]">福田登美男</dd>
                            <dt class="text-sm float-left font-black pb-8">監事</dt>
                            <dd class="text-sm pl-[20%] pb-8 sp:pl-[25%]">松原誠</dd>
                        </dl>
                    </div>
                </div>
                <!-- キャラクター紹介 -->
                <div class="w-[50%] sp:w-full sp:mt-24">
                    <div>
                        <h2 class="text-4xl font-black -translate-x-5 sp:-translate-x-0">キャラクター紹介</h2>
                        <div class="text-center pt-8">
                            <h2 class="text-2xl font-black">ハシビロ公</h2>
                        </div>
                        <img src="{{ asset('images/parts/hashibiroko.png') . config('cache.update_date') }}" alt="イメージキャラクター" class="w-[200px] m-auto mt-3">
                    </div>
                    <div class="text-sm pt-3 font-black">
                        <p>キャラクターの元になった動物ハシビロコウは跳べない鳥だ。普段はほとんど動かずじっとしている。しかし、獲物を捉えるときには、脅威の瞬発力を見せる。「いざという時には誰にも負けない強さ」をコンセプトに福岡県のアスリートたちが活躍することを願っている。
                        </p>
                    </div>
                </div>
            </x-layout.container>
            </div>
    </section>
</x-layout.layout>
