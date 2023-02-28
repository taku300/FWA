<div class="mt-[17px]">
    <a href="{{ route('index') }}">      <!-- トップに遷移 -->
        <img class="h-[26px] m-auto" src="{{ asset('images/layout/logo_white_strate.png') . config('cache.update_date') }}" alt="福岡県ウエイトリフティング協会">
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
    <a class="mb-3 mt-3" href="{{ route('contact.index') }}">管理者</a>
    <a class="mb-3" href="{{ route('admins.news.create') }}">　お知らせ登録</a>
    <a class="mb-3" href="{{ route('admins.results.create') }}">　大会情報登録</a>
    <a class="mb-3" href="{{ route('admins.lifters.create') }}">　選手登録</a>
    <a class="mb-3" href="{{ route('admins.documents.edit') }}">　ドキュメント編集</a>
    <a class="mb-3" href="{{ route('admins.top.edit') }}">　トップ編集</a>
</nav>
