<header>
    <div>
        <div class="fixed top-0 left-0 -z-40">
            <svg width="400" height="190" class="opacity-60 fill-blue-800 pc:hidden">
                <polygon points="0 0, 0 180, 400 0" class="fill-[#110781]"/>
            </svg>
            <svg width="400" height="190" class="opacity-60 fill-blue-800 hidden pc:block sp:hidden">
                <polygon points="0 0, 0 150, 350 0" class="fill-[#110781]"/>
            </svg>
            <svg width="400" height="190" class="opacity-60 fill-blue-800 hidden sp:block">
                <polygon points="0 0, 0 130, 300 0" class="fill-[#110781]"/>
            </svg>
        </div>
        <div class="fixed top-[25px] left-[25px] sp:top-[16px] sp:left-[16px] z-40">
            <a href="{{ route('index') }}">     <!-- トップに遷移 -->
                <img class="w-[230px] pc:w-[160px] sp:w-[160px]" src="{{ asset('images/layout/logo_white.png') }}" alt="福岡県ウエイトリフティング協会">
            </a>
        </div>
        <div class="fixed top-[25px] right-[25px] z-40 sp:top-[16px] sp:right-[16px] hover:bg-blue-200 active:bg-blue-300  focus:ring-blue-200">
            <button id="show-side-menu" class="js-header-parts w-[35px] h-[35px] relative opacity-60">
                <span class="block w-full h-1 bg-blue-800 bg-opacity-80 absolute top-0"></span>
                <span class="block w-full h-1 bg-blue-800 bg-opacity-80"></span>
                <span class="block w-full h-1 bg-blue-800 bg-opacity-80 absolute bottom-0"></span>
            </button>
        </div>
    </div>
</header>
