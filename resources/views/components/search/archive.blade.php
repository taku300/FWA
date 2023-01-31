@php
$data=[
  2023,
  2022,
  2021,
  2020,
  2019,
  2018,
  2017,
  2016,
  ];
@endphp
<div class="font-black text-white">
  <p class=" text-2xl mb-5">アーカイブ</p>
  <div class="flex flex-col">
    @foreach ($data as $data)
    <div class="mt-4 font-black">
      <a href=""><p class="scale-x-[0.98] translate-x-[-1%]">{{ $data }}</p></a>
    </div>
    @endforeach
  </div>
</div>
