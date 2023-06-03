<x-layout.layout>
    <!-- main -->
    <section>
        <x-layout.container>
            <!-- mail form notes -->
            <div class="row justify-center mt-[200px] mb-[100px] sp:mt-[100px] sp:mb-[50px]">
                <p class="text-[14px]">
                    以下のフォームに入力後、当協会の「個人情報保護方針」をご一読・同意の上、入力内容の確認へ進んでください。 確認のため、自動返信にてメールの控えをご記入いただきましたメールアドレス宛にお送りいたします。もし、このメールがとどかない場合は、ご入力いただきましたメールアドレスに誤りがある可能性がございますので、その際はお手数ですが再度お問い合わせいただきますようお願いいたします。
                    <br><br>※回答にはお時間をいただく場合があります。また、内容によっては回答いたしかねる場合がありますのでご了承ください。
                </p>
            </div>
            <!-- mail form -->
            {{ Form::open(['method'=>'post', ]) }}
            {{ Form::token() }}
            <div class="bg-[#FEF3E9]">
            <x-layout.container>
            <ul class="py-[100px] mb-[100px] sp:pt-[30px] sp:pb-[20px] sp:mb-[50px]">
                <li class="mb-4">
                    {{ Form::error('last_name') }}
                </li>
                <li class="mb-4">
                    {{ Form::error('first_name') }}
                </li>
                <li class="flex mb-4 sp:flex-col">
                    <div class="flex mb-1">
                        {{ Form::label('last_name', '氏名', ['class' => 'shrink-0 w-28 font-bold']) }}
                        <p class="shrink-0 w-20 text-[#FF0404]">【必須】</p>
                    </div>
                    <div class="flex w-full">
                        {{ Form::text('last_name', null, ['placeholder'=>'性', 'class' => 'w-full placeholder:text-slate-400 border-slate-300 rounded-md mr-1' ]) }}
                        {{ Form::text('first_name', null, ['placeholder'=>'名', 'class' => 'w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                    </div>
                </li>
                <li class="mb-4">
                    {{ Form::error('email') }}
                </li>
                <li class="flex mb-4 sp:flex-col">
                    <div class="flex mb-1">
                        {{ Form::label('email', 'メールアドレス', ['class' => 'shrink-0 w-28 font-bold']) }}
                        <p class="shrink-0 w-20 text-[#FF0404]">【必須】</p>
                    </div>
                    <div class="w-full">
                        {{ Form::text('email', null, ['placeholder'=>'example@co.jp', 'class' => 'w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                        <p class="text-[#FF0404]">※こちらのメールアドレスに返信いたしますので、お間違えのないよう、ご確認よろしくお願い致します。</p>
                    </div>
                </li>
                <li class="mb-4">
                    {{ Form::error('title') }}
                </li>
                <li class="flex mb-4 sp:flex-col">
                    <div class="flex mb-1">
                        {{ Form::label('title', 'タイトル', ['class' => 'shrink-0 w-28 font-bold']) }}
                        <p class="shrink-0 w-20 text-[#FF0404]">【必須】</p>
                    </div>
                    {{ Form::text('title', null, ['placeholder'=>'タイトル', 'class' => 'w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                </li>
                <li class="mb-4">
                    {{ Form::error('content') }}
                </li>
                <li class="flex mb-4 sp:flex-col">
                    <div class="flex mb-1">
                        {{ Form::label('content', '内容', ['class' => 'shrink-0 w-28 font-bold']) }}
                        <p class="shrink-0 w-20 text-[#FF0404]">【必須】</p>
                    </div>
                    {{ Form::textarea('content', null, ['placeholder'=>'内容を入力', 'class'=>'align-top w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                </li>
                <li class="flex mt-10 mb-4">
                    <a class="text-[#0D56E3] hover:border-b hover:border-[#0D56E3] duration-300" href="https://erratic-monday-e75.notion.site/5fc6d01c287e48febd9a41cae04a91f3" target= "_blank">個人情報保護方針</a>
                </li>
                <li class="mb-4">
                    {{ Form::error('check') }}
                </li>
                <li class="flex items-center mb-4">
                    {{ Form::checkbox('check', 1, old('check', false ), ['class'=>'align-top border-slate-300 rounded-md' ]) }}
                    {{ Form::label('check', '当協会の「個人情報保護方針」に同意します。', ['class' => 'shrink-0 font-bold ml-5']) }}
                </li>
            </ul>
            </x-layout.container>
            </div>
            <x-parts.button-arrow>送信する</x-parts-button>
                {{ Form::close() }}
        </x-layout.container>
    </section>
</x-layout.layout>
