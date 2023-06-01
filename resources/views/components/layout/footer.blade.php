@props([
    'float' => 'none',
])

@php
    if (!function_exists('checkFloatFooter')) {
        function checkFloatFooter($theme) {
            return match ($theme) {
                'none' => 'bg-white',
                'apply' => 'absolute bottom-0 w-full',
            };
        }
    }
@endphp

<footer>
    <div class="{{ checkFloatFooter($float) }} pc-sp:static pt-64">
        <div class="w-full h-[400px] pc:h-[350px] pc-sp:h-[300px] sp:h-[270px] bg-contain bg-no-repeat bg-right-bottom relative flex justify-center sp:justify-end items-end" style="background-image: url({{ asset('images/layout/footer.png') }})">
            <div class="absolute top-[100px] left-[11%] pc-sp:text-[10px] sp:left-[8%]">
                <div class="flex">
                    <img class="h-[40px] pc-sp:h-[33px] mr-3 pc-sp:mr-2" src="{{ asset('images/layout/logo_b_s.png') . config('cache.update_date') }}" alt="福岡県ウエイトリフティング協会ロゴ">
                    <div>
                        <p class="font-black text-[10px]">Fukuoka Weightlifting Association</p>
                        <p class="font-black pc-sp:text-sm">福岡県ウエイトリフティング協会</p>
                    </div>
                </div>
                <table class="mt-[10px] pc:mt-[0px] border-separate border-spacing-y-1">
                    <tbody>
                        <tr>
                            <td class="w-[80px] mb-[8px] align-top sp:w-[60px]">Address</td>
                            <td>
                                〒806-0015<br>
                                福岡県北九州市八幡西区元城町1-1
                            </td>
                        </tr>
                        <tr>
                            <td>Tel</td>
                            <td>080-3870-0816</td>
                        </tr>
                        <tr>
                            <td>Mail</td>
                            <td>fukuokaweight@gmail.com</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <p class=" mb-2 text-xs sp:mb-[6px] sp:text-[10px] mr-4 text-white">©️ Fukuoka Weightlifting Association</p>
        </div>
    </div>
</footer>
