@foreach($breakingNews as $key => $value)
<div class="flex relative px-[5%] mb-32 sp:block sp:mb-16">
    <div class="w-3/5 sp:w-full">
        <a href="{{ route('news.show', ['news' => $value['id']]) }}">
            <img class="absolute -top-[30%] -left-[0%] w-1/3 sp:-top-[22%] sp:-left-[0%]" src="{{ asset('images/parts/breaking_news.png') }}" alt="速報">
            <div class="w-full aspect-[626/301] bg-[#D9D9D9] p-[5%] pt-[10%]">
                <x-list.list :$value></x-list.list>
            </div>
        </a>
    </div>
    <div class="absolute right-0 top-0">
    <x-list.auth :$value></x-list.auth>
    </div>
    <div class="w-2/5 flex justify-center items-center sp:block sp:absolute sp:-top-[25%] sp:-right-[0%] sp:w-1/4"><img class="w-3/4 sp:w-full" src="{{asset('images/parts/hashibiroko.png')}}" alt="ハシビロ公"></div>
</div>

@endforeach

@foreach($newsList as $key => $value)
<div class="relative">
    <a href="{{ route('news.show', ['news' => $value['id']]) }}">
        <div class="py-3 border-t-[1px] border-[#D9D9D9] {{ (count($newsList) - 1 == $key) ? 'border-b-[1px]' : '' }}">
            <x-list.list :$value></x-list.list>
        </div>
    </a>
    <div class="absolute right-0 top-0">
    <x-list.auth :$value></x-list.auth>
    </div>
</div>
@endforeach
