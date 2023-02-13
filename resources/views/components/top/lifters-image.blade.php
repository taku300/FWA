@props([
    "source" => "images/top/lifter1.png",
    "alt" => "",
])
<a href="{{ route('lifters.index') }}">
    <img class="object-cover object-top aspect-[572/400] w-[570px] pc:w-[400px] sp:w-[270px]" src="{{ asset($source) }}" alt="{{ $alt }}">
</a>
