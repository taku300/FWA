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
    <div class="{{ checkFloatFooter($float) }} pc-sp:static">
        <div class="w-full h-[400px] pc:h-[350px] pc-sp:h-[300px] sp:h-[270px] bg-[url('/public/images/layout/footer.png')] bg-contain bg-no-repeat bg-right-bottom relative flex justify-center sp:justify-end items-end">
            <div class="absolute top-[100px] left-[11%] pc-sp:text-[10px]">
                <div class="">
                    <img class="h-[42px] pc-sp:h-[25px]" src="/images/layout/logo_black.png" alt="福岡県ウエイトリフティング協会">
                </div>
                <p class="font-noto-sans">〒806-0015 福岡県北九州市早田西区元城町1-1</p>
                <table class="mt-[19px] pc:mt-[0px] border-separate border-spacing-y-1">
                    <tbody>
                        <tr>
                            <td class="w-[55px] mb-[8px]">TEL</td>
                            <td>090-0000-0000</td>
                        </tr>
                        <tr>
                            <td>FAX</td>
                            <td>090-0000-0000</td>
                        </tr>
                        <tr>
                            <td>MAIL</td>
                            <td>090-0000-0000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <p class=" mb-2 text-xs sp:mb-[6px] sp:text-[10px] mr-4 text-white">©️ Fukuoka Weightlifting Association</p>
        </div>
    </div>
</footer>
