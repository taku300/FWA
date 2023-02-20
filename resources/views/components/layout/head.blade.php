<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name=”description“ content="福岡県ウエイトリフティング協会の公式ホームページです。福岡県協会の概要、試合結果、選手情報、試合速報等の発信を行っております。" />
    <title>{{ $heroSubTitle ? $heroSubTitle . ' | ' : '' }}{{ config('app.name') }}</title>
    <!-- OGP -->
    <head prefix="og: https://ogp.me/ns#">
    <meta property="og:url" content="https://fukuoka-weight.com/" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ config('app.name') }}" />
    <meta property="og:description" content="福岡県ウエイトリフティング協会の公式ホームページです。福岡県協会の概要、試合結果、選手情報、試合速報等の発信を行っております。" />
    <meta property="og:site_name" content="{{ config('app.name') }}" />
    <meta property="og:image" content="https://fukuoka-weight.com/images/layout/logo_b.png" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@takuma1996300" />
    <meta property="fb:app_id" content="510703381239094" />

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <!-- css読み込み -->
    <link rel="stylesheet" href="{{ asset('/css/common.css') }}">
    <!-- jquery読み込み -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- js見込み -->
    <script src="{{ asset('js/common.js') }}" defer></script>
    <script src="{{ asset('js/news.js') }}" defer></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
