<ul class="fixed top-0 left-0 -z-50 w-full">
    <li class="top-image h-[730px]">
<<<<<<< HEAD
        <img src="{{ isset($topImagePath[1]) ? \Storage::url($topImagePath[1]) : 'images/top/top1.png'}}" alt="トップ画像" class="w-full h-full object-cover object-top">
    </li>
    <li class="top-image h-[730px]">
        <img src="{{ isset($topImagePath[2]) ? \Storage::url($topImagePath[2]) : 'images/top/top2.png'}}" alt="トップ画像" class="w-full h-full object-cover object-top">
    </li>
    <li class="top-image h-[730px]">
        <img src="{{ isset($topImagePath[3]) ? \Storage::url($topImagePath[3]) : 'images/top/top3.png'}}" alt="トップ画像" class="w-full h-full object-cover object-top">
=======
        <img src="{{\Storage::has($topImagePath[1]) ? \Storage::url($topImagePath[1]) . config('cache.update_date') : 'images/top/top1.png' . config('cache.update_date')}}" alt="トップ画像" class="w-full h-full object-cover object-top">
    </li>
    <li class="top-image h-[730px]">
        <img src="{{\Storage::has($topImagePath[2]) ? \Storage::url($topImagePath[2]) . config('cache.update_date') : 'images/top/top2.png' . config('cache.update_date')}}" alt="トップ画像" class="w-full h-full object-cover object-top">
    </li>
    <li class="top-image h-[730px]">
        <img src="{{\Storage::has($topImagePath[3]) ? \Storage::url($topImagePath[3]) . config('cache.update_date') : 'images/top/top3.png' . config('cache.update_date')}}" alt="トップ画像" class="w-full h-full object-cover object-top">
>>>>>>> efe5f8f7e6f0786d939a039d3b013683431911fb
    </li>
</ul>