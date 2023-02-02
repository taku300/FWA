<div class="font-black text-white">
    <p class=" text-2xl mb-5">アーカイブ</p>
    <div class="flex flex-col">
        @foreach ($archiveYears as $value)
        <div class="mt-4 font-black">
            <a href="{{ route('results.index', ['fiscalYear' => $value]) }}">
                <p class="scale-x-[0.98] translate-x-[-1%]">{{ $value }}</p>
            </a>
        </div>
        @endforeach
    </div>
</div>