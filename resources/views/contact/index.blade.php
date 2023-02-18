<x-layout.layout>
    <!-- main -->
    <section>
        <x-layout.container>
            <!-- mail form notes -->
            <div class="row justify-center mt-[200px] mb-[100px]">
                <p class="text-[14px]">
                    以下のフォームに入力後、当協会の「個人情報保護方針」をご一読・同意の上、入力内容の確認へ進んでください。 確認のため、自動返信にてメールの控えをご記入いただきましたメールアドレス宛にお送りいたします。もし、このメールがとどかない場合は、ご入力いただきましたメールアドレスに誤りがある可能性がございますので、その際はお手数ですが再度お問い合わせいただきますようお願いいたします。
                    <br><br>※回答にはお時間をいただく場合があります。また、内容によっては回答いたしかねる場合がありますのでご了承ください。
                </p>
            </div>
            <!-- mail form -->
            {{ Form::open(['method'=>'post', ]) }}
            {{ Form::token() }}
            <ul class="bg-[#FEF3E9] pl-[100px] pr-[200px] py-[100px] mb-[100px]">
                <li class="flex mb-4">
                    {{ Form::label('last_name', '氏名', ['class' => 'shrink-0 w-28 font-bold']) }}
                    <p class="shrink-0 w-20 text-[#FF0404]">【必須】</p>
                    {{ Form::text('last_name', null, ['placeholder'=>'性', 'class' => 'w-full placeholder:text-slate-400 border-slate-300 rounded-md mr-1' ]) }}
                    {{ Form::text('first_name', null, ['placeholder'=>'名', 'class' => 'w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                </li>
                <li class="flex mb-4">
                    {{ Form::label('email', 'メールアドレス', ['class' => 'shrink-0 w-28 font-bold']) }}
                    <p class="shrink-0 w-20 text-[#FF0404]">【必須】</p>
                    {{ Form::text('email', null, ['placeholder'=>'example@co.jp', 'class' => 'w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                </li>
                <li class="flex mb-4">
                    {{ Form::label('title', 'タイトル', ['class' => 'shrink-0 w-28 font-bold']) }}
                    <p class="shrink-0 w-20 text-[#FF0404]">【必須】</p>
                    {{ Form::text('title', null, ['placeholder'=>'タイトル', 'class' => 'w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                </li>
                <li class="flex mb-4">
                    {{ Form::label('inquiry_content', '内容', ['class' => 'shrink-0 w-28 font-bold']) }}
                    <p class="shrink-0 w-20 text-[#FF0404]">【必須】</p>
                    {{ Form::textarea('inquiry_content', null, ['placeholder'=>'内容を入力', 'class'=>'align-top w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                </li>
                <li class="flex mb-4">
                    <a class="text-[#0D56E3] hover:border-b hover:border-[#0D56E3] duration-300" href="">個人情報保護方針</a>
                </li>
                <li class="flex mb-4">
                    {{ Form::checkbox('check', null, ['class'=>'align-top border-slate-300 rounded-md' ]) }}
                    {{ Form::label('check', '当協会の「個人情報保護方針」を確認し、同意します。', ['class' => 'shrink-0 font-bold ml-5']) }}
                </li>
            </ul>
            <x-parts.button-arrow>送信する</x-parts-button>
                {{ Form::close() }}
        </x-layout.container>
    </section>
</x-layout.layout>