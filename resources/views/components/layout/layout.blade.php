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
    <x-layout.hero textColor="white" fontSize="black"></x-layout.hero>
    <!-- sidemenu -->
    <x-layout.side-menu>
        <x-layout.nav></x-layout.nav>
    </x-layout.side-menu>
        <!-- main -->
        <main class="min-h-[2000px] bg-white ">
            {{ $slot }}
        </main>
        <!-- footer -->
        <x-layout.footer float="{{ isset($float) ? $float : 'none' }}"></x-layout.footer>
</body>

</html>
