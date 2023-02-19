<ul class="fixed top-0 left-0 -z-50 w-full">
    <li class="top-image h-[730px]">
        <img src="{{$topImagePath[1] ? \Storage::url('public/lifter-images/' . $topImagePath[1]) : 'images/top/top1.png'}}" alt="" class="w-full h-full object-cover object-top">
    </li>
    <li class="top-image h-[730px]">
        <img src="{{$topImagePath[2] ? \Storage::url('public/lifter-images/' . $topImagePath[2]) : 'images/top/top2.png'}}" alt="" class="w-full h-full object-cover object-top">
    </li>
    <li class="top-image h-[730px]">
        <img src="{{$topImagePath[3] ? \Storage::url('public/lifter-images/' . $topImagePath[3]) : 'images/top/top3.png'}}" alt="" class="w-full h-full object-cover object-top">
    </li>
</ul>
