<div class="grid grid-cols-3 gap-x-8 sp:gap-x-4 gap-y-[calc(((100vw_*_0.78_-_(32px_*_2))_/_3)_*_400/350_*_0.8)] s-pc:gap-y-[calc(((100vw_*_0.88_-_(32px_*_2))_/_3)_*_400/350_*_0.8)] sp:grid-cols-2 sp:gap-y-[calc(((100vw_*_0.94_-_(16px_*_2))_/_2)_*_400/350_*_0.8)]">
    @for($i = 0; $i < 10; $i++)
    <div class="relative">
        <img src="images/top/lifter1.png" alt="" class="object-cover object-top w-full aspect-[350/400]">
        <div class="absolute top-[70%] left-[5%] w-full aspect-[350/400] bg-black opacity-80 overflow-scroll">
            <ul class="text-white p-4 s-pc:p-3">
                <li class="font-black text-3xl s-pc:text-2xl mb-10 s-pc:mb-5 sp:text-lg"><span>田中</span>　<span>太郎</span></li>
                <li class="text-2xl mb-5 s-pc:text-base s-pc:mb-2 sp:text-xs">1996年</li>
                <li class="text-1xl mb-5 s-pc:text-base s-pc:mb-2 sp:text-xs">九州国際大学附属高等学校</li>
                <li class="text-1xl mb-5 s-pc:text-base s-pc:mb-2 sp:text-xs">85kg級</li>
                <li class="text-1xl mb-5 s-pc:text-base s-pc:mb-2 sp:text-xs">全日本選手権大会　優勝<br>
                    〇〇選手権優勝<br>
                </li>
                <!-- <li class="text-base mb-5 s-pc:text-sm s-pc:mb-2">ここにコメントを入力ここにコメントを入力ここにコメントを入力ここにコメントを入力ここにコメントを入力ここにコメントを入力ここにコメントを入力ここにコメントを入力</li> -->
            </ul>
        </div>
    </div>
    @endfor
</div>
