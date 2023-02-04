<div class="grid grid-cols-3 gap-x-8 sp:gap-x-4 gap-y-[calc(((100vw_*_0.78_-_(32px_*_2))_/_3)_*_400/350_*_0.8)] s-pc:gap-y-[calc(((100vw_*_0.88_-_(32px_*_2))_/_3)_*_400/350_*_0.8)] sp:grid-cols-2 sp:gap-y-[calc(((100vw_*_0.94_-_(16px_*_2))_/_2)_*_400/350_*_0.8)]">
    @foreach($lifters as $value)
    <div class="relative">
        <img src="images/top/lifter1.png" alt="" class="object-cover object-top w-full aspect-[350/400]">
        <div class="absolute top-[70%] left-[5%] w-full aspect-[350/400] bg-black opacity-80 overflow-scroll">
            <ul class="text-white p-4 s-pc:p-3">
                <li class="font-black text-3xl s-pc:text-2xl mb-10 s-pc:mb-5 sp:text-lg"><span>{{ $value['last_name'] }}</span>　<span>{{ $value['first_name'] }}</span></li>
                <li class="text-2xl mb-5 s-pc:text-base s-pc:mb-2 sp:text-xs">{{ $value['birthday'] }}</li>
                <li class="text-1xl mb-5 s-pc:text-base s-pc:mb-2 sp:text-xs">{{ $value['affiliation']['name'] }}</li>
                <li class="text-1xl mb-5 s-pc:text-base s-pc:mb-2 sp:text-xs">{{ \WeightClassConst::CLASS_LIST[$value['weight_class']] }}</li>
                <li class="text-1xl mb-5 s-pc:text-base s-pc:mb-2 sp:text-xs">{{ $value['performance'] }}</li>
                <li class="text-base mb-5 s-pc:text-sm s-pc:mb-2">{{ $value['comment'] }}</li>
            </ul>
        </div>
    </div>
    @endforeach
</div>