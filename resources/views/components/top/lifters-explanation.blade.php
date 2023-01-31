<div class="w-[500px] h-[450px] pc:w-[400px] pc:h-[450px] sp:w-[250px] sp:h-[300px] text-white">
    <div>
        <span class="text-5xl font-black scale-x-[0.93] border-b-[1px] pl-16 pc:pl-7 pc:text-4xl sp:text-2xl">{{ $lifterList['first_name_hebon'] }} {{ $lifterList['last_name_hebon'] }}</span>
    </div>
    <div class="pl-16 pc:pl-7">
        <p class="mt-7 text-3xl pc:text-2xl sp:text-xl">{{ $lifterList['last_name'] }} {{ $lifterList['first_name'] }}</p>
        <p class="mt-8 text-2xl pc:text-1xl sp:text-base">{{ $lifterList['affiliation']['name'] }}</p>
        <div class="absolute bottom-0 text-2xl pc:text-1xl sp:text-base">
            <p>{{ $lifterList['performance'] }}</p>
        </div>
    </div>
</div>