<ul class="fixed top-0 left-0 -z-50 w-full">
    <li class="top-image h-[730px]">
        <img src="{{\Storage::has($topImagePath[1]) ? \Storage::url($topImagePath[1]) : 'images/top/top1.png'}}" alt="" class="w-full h-full object-cover object-top">
    </li>
    <li class="top-image h-[730px]">
        <img src="{{\Storage::has($topImagePath[2]) ? \Storage::url($topImagePath[2]) : 'images/top/top2.png'}}" alt="" class="w-full h-full object-cover object-top">
    </li>
    <li class="top-image h-[730px]">
        <img src="{{\Storage::has($topImagePath[3]) ? \Storage::url($topImagePath[3]) : 'images/top/top3.png'}}" alt="" class="w-full h-full object-cover object-top">
    </li>
</ul>