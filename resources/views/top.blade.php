<!DOCTYPE html>
<!-- htmlタグでデフォルト設定 -->
<html lang="ja" class="font-noto-sans text-[14px]">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>日本ウエイトリフティング協会</title>
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet" />
    <!-- css読み込み -->
    <link rel="stylesheet" href="/css/common.css">
    <!-- jquery読み込み -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- js見込み -->
    <script src="js/common.js" defer></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<!-- body -->
<body>
    <!-- header -->
    <header class="fixed w-full top-0 left-0">
        <div class="relative">
            <div>

            </div>
            <div class="w-[400px] h-[210px] bg-[url('/public/images/layout/header.png')] bg-contain bg-no-repeat ralative">
                <img class="w-[230px] absolute top-[25px] left-[25px] " src="/images/layout/logo_white.png" alt="福岡県ウエイトリフティング協会">
            </div>
            <div class="absolute top-[25px] right-[25px]">
                <button id="hamburger" class="w-[30px] h-[30px] relative">
                    <span class="block w-full h-[1px] bg-black bg-opacity-80 absolute top-0"></span>
                    <span class="block w-full h-[1px] bg-black bg-opacity-80"></span>
                    <span class="block w-full h-[1px] bg-black bg-opacity-80 absolute bottom-0"></span>
                </button>
            </div>
        </div>
    </header>
    <!-- main -->
    <main class="min-h-[2000px] pt-[1000px]">
        <a href="https://test"></a>
        <p>aaaaa_session_keys
        <ul>
            <li class="list" style="color: red;">Ruby</li>
            <li class="list" style="color: red;">Python</li>
            <li class="list" style="color: red;">JavaScript</li>
        </ul>

    </main>
    <!-- footer -->
    <footer>
        <div class="h-[435px] bg-[url('/public/images/layout/footer.png')] bg-contain bg-no-repeat bg-bottom relative flex justify-center items-end">
            <div class="absolute top-[100px] left-[11%]">
                <div class="">
                    <img class="h-[42px]" src="/images/layout/logo_black.png" alt="福岡県ウエイトリフティング協会">
                </div>
                <p class="font-noto-sans">〒806-0015 福岡県北九州市早田西区元城町1-1</p>
                <table class="mt-[19px] border-separate border-spacing-y-2">
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
            <p class="mb-[15px] text-white">©️ Fukuoka Weightlifting Association</p>
        </div>
    </footer>
    <!-- sidemenu -->
    <div id="side-menu" class="hidden fixed w-full h-full top-0 left-0">
        <div class="h-full flex">
            <div class="h-full flex-auto bg-black opacity-50">
            </div>
            <div class="h-full w-[250px] bg-black">
                <div class="mt-[17px]">
                    <img class="h-[26px] m-auto" src="/images/layout/logo_white_strate.png" alt="福岡県ウエイトリフティング協会">
                </div>
                <nav class="text-white mt-[70px] ml-[40px]">
                    <p class="mb-[16px]">TOP画面</p>
                    <p class="mb-[16px]">協会について</p>
                    <p class="mb-[16px]">　協会概要</p>
                    <p class="mb-[20px]">　協会の歩み</p>
                    <p class="mb-[20px]">　年間計画</p>
                    <p class="mb-[16px]">試合関連</p>
                    <p class="mb-[16px]">　要項・結果</p>
                    <p class="mb-[20px]">　大会記録</p>
                    <p class="mb-[20px]">選手紹介</p>
                    <p class="mb-[20px]">お知らせ</p>
                    <p class="mb-[20px]">お問い合わせ</p>
                </nav>
            </div>
        </div>
    </div>
</body>


</html>
