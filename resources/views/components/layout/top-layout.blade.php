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
    <x-layout.top-hero></x-layout.top-hero>
    <!-- sidemenu -->
    <x-layout.side-menu>
        <x-layout.nav></x-layout.nav>
    </x-layout.side-menu>
    <!-- main -->
    <main class="min-h-[2000px] bg-white mt-[730px]">
        {{ $slot }}
    </main>
    <!-- footer -->
    <x-layout.footer></x-layout.footer>
</body>

</html>
