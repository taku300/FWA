<header>
    <div>
        <div class="js-header-parts-logo fixed top-0 left-0 z-40">
            <svg width="400" height="190" class="opacity-60 fill-blue-800 pc:hidden">
                <polygon points="0 0, 0 180, 400 0" class="fill-[#110781]"/>
            </svg>
            <svg width="400" height="190" class="opacity-60 fill-blue-800 hidden pc:block sp:hidden">
                <polygon points="0 0, 0 150, 350 0" class="fill-[#110781]"/>
            </svg>
            <svg width="400" height="190" class="opacity-60 fill-blue-800 hidden sp:block">
                <polygon points="0 0, 0 140, 300 0" class="fill-[#110781]"/>
            </svg>
        </div>
        <div class="fixed top-[25px] left-[25px] sp:top-[16px] sp:left-[16px] z-40 leading-4">
            <a href="{{ route('index') }}">     <!-- トップに遷移 -->
                <p class="js-header-parts-text text-[10px] text-white font-black text-shadow">福岡県ウエイトリフティング協会</p>
                <p class="js-header-parts-text text-[16px] text-white font-black text-shadow pc:text-[14px]">Fukuoka Weightlifting</p>
                <p class="js-header-parts-text text-[16px] text-white font-black text-shadow pc:text-[14px]">Association</p>
                <img class="js-header-parts-img mt-3 w-[50px] pc:w-[30px]" src="{{ asset('images/layout/logo_w_s.png') . config('cache.update_date') }}" alt="福岡県ウエイトリフティング協会">
            </a>
        </div>
        <div class="hamburger fixed top-[35px] right-[25px] z-40 sp:top-[16px] sp:right-[16px] hover:bg-blue-200 active:bg-blue-300  focus:ring-blue-200">
            <button id="show-side-menu" class="js-header-parts w-[30px] h-[30px] relative opacity-60">
                <span class="block w-full h-[2px] bg-blue-800 bg-opacity-80 absolute top-0"></span>
                <span class="block w-full h-[2px] bg-blue-800 bg-opacity-80"></span>
                <span class="block w-full h-[2px] bg-blue-800 bg-opacity-80 absolute bottom-0"></span>
            </button>
        </div>
    </div>
</header>
