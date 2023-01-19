<div id="side-menu" class="hidden fixed z-50 w-full h-full top-0 left-0">
    <div class="h-full flex">
        <div class="h-full flex-auto bg-black opacity-50">
        </div>
        <div class="h-full w-[250px] bg-black">
            <div class="mt-[17px]">
                <a href="{{ route('index') }}">      <!-- トップに遷移 -->
                    <img class="h-[26px] m-auto" src="/images/layout/logo_white_strate.png" alt="福岡県ウエイトリフティング協会">
                </a>
            </div>
            <nav class="text-white mt-[70px] ml-[40px] flex flex-col">
                <a class="mb-3" href="{{ route('index') }}">TOP画面</a>     <!-- トップに遷移 -->
                <p class="mb-3 mt-3">協会について</p>
                <a class="mb-3" href="{{ route('about.index') }}">　協会概要</a>
                <a class="mb-3" href="{{ route('history.index') }}">　協会の歩み</a>
                <a class="mb-3" href="{{ route('plans.index') }}">　年間計画</a>
                <p class="mb-3 mt-3">試合関連</p>
                <a class="mb-3" href="{{ route('results.index') }}">　要項・結果</a>
                <a class="mb-3" href="{{ route('records.index') }}">　大会記録</a>
                <a class="mb-3 mt-3" href="{{ route('lifters.index') }}">選手紹介</a>
                <a class="mb-3 mt-3" href="{{ route('news.index') }}">お知らせ</a>
                <a class="mb-3 mt-3" href="{{ route('contact.index') }}">お問い合わせ</a>
            </nav>
        </div>
    </div>
</div>
