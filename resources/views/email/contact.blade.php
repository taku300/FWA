<p>{{ $toUser->name }}様</p>

<p><b>{{ $request['first-name'] . $request['first-name']}}様からお問い合わせがありました。</b></p>
<br>
<p>タイトル：{{ $request['title'] }}</p>
<p>お問い合わせ内容</p>
<p>{{ $request['body'] }}</p>
<br>
<p>※何ご不明な点がありましたらシステム管理者にお問い合わせください。</p>
<p>※お問い合わせ内容につきましては解答しかねますのでよろしくお願い致します。</p>

<x-mail.admin-info></x-mail.admin-info>
