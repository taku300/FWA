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
        <x-slot name="en">{{ $en }}</x-slot>
        <x-slot name="ja">{{ $ja }}</x-slot>
    </x-layout.other-img>
    <!-- sidemenu -->
    <x-layout.side-menu></x-layout.side-menu>
    <!-- hero以下のflowする部分 -->
    <div class="h-full w-full absolute top-[627px] z-10">
        <!-- main -->
        <main class="min-h-[2000px] bg-white ">
            {{ $slot }}
        </main>
        <!-- footer -->
        <x-layout.footer></x-layout.footer>
    </div>
</body>

</html>