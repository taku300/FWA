<div class="grid grid-cols-3 gap-x-8 sp:gap-x-4 gap-y-[calc(((100vw_*_0.78_-_(32px_*_2))_/_3)_*_400/350_*_0.8)] s-pc:gap-y-[calc(((100vw_*_0.88_-_(32px_*_2))_/_3)_*_400/350_*_0.8)] sp:grid-cols-2 sp:gap-y-[calc(((100vw_*_0.94_-_(16px_*_2))_/_2)_*_400/350_*_0.8)]">
    @foreach($lifters as $value)
    <div class="relative">
        @auth
        <div class="flex">
            <a class="mr-1" href="{{ route('admins.lifters.edit', ['lifter' => $value['id']]) }}">
                <x-parts.button bgColor="black" fontColor="white">編集</x-parts.button>
            </a>
            <form action="{{ route('admins.lifters.destroy', ['lifter' => $value['id']]) }}" method="post">
                @method('DELETE')
                @csrf
                <x-parts.button bgColor="red" fontColor="white">消去</x-parts.button>
            </form>
        </div>
        @endauth
        <img src="{{ $value['image_path'] }}" alt="" class="object-cover object-top w-full aspect-[350/400]">
        <div class="absolute top-[70%] left-[5%] w-full aspect-[350/400] bg-black opacity-80 overflow-scroll">
            <ul class="text-white p-4 s-pc:p-3">
                <li class="font-black text-3xl s-pc:text-2xl mb-10 s-pc:mb-5 sp:mb-2 sp:text-lg"><span>{{ $value['last_name'] }}</span>　<span>{{ $value['first_name'] }}</span></li>
                <li class=" text-lg mb-5 s-pc:text-base s-pc:mb-2 sp:mb-0 sp:text-3sm">{{ date('Y年n月生', strtotime($value['birthday'])) }}</li>
                <li class="text-xl mb-5 s-pc:text-base s-pc:mb-2 sp:mb-0 sp:text-2sm">{{ $value['affiliation']['name'] }}</li>
                <li class="text-xl mb-5 s-pc:text-base s-pc:mb-2 sp:mb-1 sp:text-2sm">{{ \WeightClassConst::CLASS_LIST[$value['weight_class']] }}</li>
                <li class="text-lg mb-5 s-pc:text-base s-pc:mb-2 sp:mb-1 sp:text-2sm">
                    <p class="leading-6 sp:leading-4">{!! nl2br(e($value['performance'])) !!}</p>
                </li>
                <li class="text-base mb-5 s-pc:text-xs s-pc:mb-2 sp:mb-0 sp:text-3sm">
                    <p class="leading-6 sp:leading-4">{!! nl2br(e($value['comment'])) !!}</p>
                </li>
            </ul>
        </div>
    </div>
    @endforeach
</div>
