<p>{{ $toUser->name }}様</p>

<p><b>新しい管理者が追加されました。</b></p>
<br>
<p>管理者情報</p>
<p>管理者名：{{ $newUser->name }}</p>
<p>作成日　：{{ $newUser->created_at->format('Y月m日d　H時i分s秒')  }}</p>
<br>
<p>※何ご不明な点がありましたらシステム管理者にお問い合わせください。</p>

<x-mail.admin-info></x-mail.admin-info>
