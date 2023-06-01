<div class="mt-[17px]">
    <a href="{{ route('index') }}">      <!-- トップに遷移 -->
        <img class=" w-16 m-auto" src="{{ asset('images/layout/logo_w.png') . config('cache.update_date') }}" alt="福岡県ウエイトリフティング協会ロゴ">
    </a>
</div>
<nav class="text-white mt-[70px] m-[40px] flex flex-col">
    <a class="mb-3 p-1  hover:bg-slate-100/20 rounded-sm" href="{{ route('index') }}">TOP画面</a>     <!-- トップに遷移 -->
    <a class="mb-3 mt-3 p-1  hover:bg-slate-100/20 rounded-sm" href="{{ route('about.index') }}">協会概要</a>
    <!-- <a class="mb-3" href="#">　協会の歩み</a>
    <a class="mb-3" href="#">　年間計画</a> -->
    <p class="mb-2 mt-3 p-1">大会関連</p>
    <a class="mb-2 p-1  hover:bg-slate-100/20 rounded-sm" href="{{ route('results.index') }}">　大会結果</a>
    <a class="mb-3 p-1  hover:bg-slate-100/20 rounded-sm" href="{{ route('records.index') }}">　大会記録</a>
    <!-- <a class="mb-3 mt-3" href="{{ route('lifters.index') }}">選手紹介</a> -->
    <a class="mb-3 mt-3 p-1  hover:bg-slate-100/20 rounded-sm" href="{{ route('news.index') }}">お知らせ</a>
    <a class="mb-3 mt-3 p-1  hover:bg-slate-100/20 rounded-sm" href="{{ route('contact.index') }}">お問い合わせ</a>
    @auth
    <p class="mb-3 p-1 mt-8">管理者</p>
    <a class="mb-3 p-1  hover:bg-slate-100/20 rounded-sm" href="{{ route('admins.news.create') }}">　お知らせ登録</a>
    <a class="mb-3 p-1  hover:bg-slate-100/20 rounded-sm" href="{{ route('admins.results.create') }}">　大会情報登録</a>
    <a class="mb-3 p-1  hover:bg-slate-100/20 rounded-sm" href="{{ route('admins.lifters.create') }}">　選手登録</a>
    <a class="mb-3 p-1  hover:bg-slate-100/20 rounded-sm" href="{{ route('lifters.index') }}">　選手編集</a>
    <a class="mb-3 p-1  hover:bg-slate-100/20 rounded-sm" href="{{ route('admins.documents.edit') }}">　ドキュメント編集</a>
    <a class="mb-3 p-1  hover:bg-slate-100/20 rounded-sm" href="{{ route('admins.top.edit') }}">　トップ編集</a>
    @endauth
</nav>
