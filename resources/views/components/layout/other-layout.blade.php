<!DOCTYPE html >
<!-- htmlタグでデフォルト設定 -->
<html lang="ja" class="font-noto-sans overflow-x-hidden">
<!-- head -->
<x-layout.head></x-layout.head>
<!-- body -->
<body class="relative">
    <!-- header -->
    <x-layout.header></x-layout.header>
    <!-- hero -->
    <x-layout.other-img>
        @slot('en')
            RECORDS
        @endslot
        @slot('ja')
            大会記録
        @endslot
    </x-layout.other-img>
    <!-- sidemenu -->
    <x-layout.side-menu></x-layout.side-menu>
    <!-- main -->
    <main class="min-h-[2000px] bg-white ">
        {{ $slot }}
    </main>
    <!-- footer -->
    <x-layout.footer></x-layout.footer>
</body>

</html>
