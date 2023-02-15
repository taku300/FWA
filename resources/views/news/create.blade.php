<x-layout.layout>
    <!-- main -->
    <section>
        <x-layout.container>
            <div class="mt-32 mb-16">
                <x-parts.title>
                    {{ !is_array($news) ?
                        'お知らせ・大会情報登録' :
                        'お知らせ・大会情報編集'
                    }}
                </x-parts.title>
            </div>
            <!-- 遷移先判定のロジック -->
            @php
            $method = !is_array($news) ? 'post' : 'put';
            $path = !is_array($news) ? 'admins.news.store' : 'admins.news.update';
            @endphp
            {{ Form::model($news, ['method'=> $method, 'route'=>[$path, 'news' => isset($id) ? $id : null], 'files'=>true]) }}
            <ul>
                <li class="flex mb-4">
                    {{ Form::label('category', 'カテゴリー', ['class' => 'shrink-0 w-24']) }}
                    <p class="shrink-0 w-20 text-[#FF0404]">【必須】</p>
                    {{ Form::select('category', \CategoryConst::CATEGORY_LIST['category'], null, ['placeholder'=>'選択してください', 'class' => 'shrink-0 w-1/5 placeholder:text-slate-400 border-slate-300 rounded-md']) }}
                </li>
                <li class="flex mb-4">
                    {{ Form::label('noticed_at', 'お知らせ日', ['class' => 'shrink-0 w-24']) }}
                    <p class="shrink-0 w-20 text-[#FF0404]">【必須】</p>
                    {{ Form::date('noticed_at', null, ['class' => 'shrink-0 w-1/5 placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                </li>
                <li class="flex mb-4">
                    {{ Form::label('title', 'タイトル', ['class' => 'shrink-0 w-24']) }}
                    <p class="shrink-0 w-20 text-[#FF0404]">【必須】</p>
                    {{ Form::text('title', null, ['placeholder'=>'タイトルを入力', 'class' => 'w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                </li>
                <li class="flex mb-4">
                    {{ Form::label('note', '注意書き', ['class' => 'shrink-0 w-44']) }}
                    {{ Form::textarea('note', null, ['placeholder'=>'注意書きを入力', 'class'=>'align-top w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                </li>
                <li class="flex mb-4">
                    {{ Form::label('detail', 'お知らせ詳細', ['class' => 'shrink-0 w-44']) }}
                    {{ Form::textarea('detail', null, ['placeholder'=>'お知らせ詳細を入力', 'class' => 'align-top w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                </li>
                <li class="flex mb-4">
                    {{ Form::label('iframe_path', 'iframeURL', ['class' => 'shrink-0 w-44']) }}
                    {{ Form::textarea('iframe_path', null, ['placeholder'=>'iframeURLを入力', 'class' => 'align-top w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                </li>
                <li class="mb-4">
                    {{ Form::label('preliminary_report_flag', '速報', ['class'=>'mr-1']) }}
                    {{ Form::checkbox('preliminary_report_flag', 1, false, ['class'=>'']) }}
                </li>
                @if (is_array($news))
                @foreach ($news['news_documents'] as $key => $news_documents)
                <li class="flex mb-4">
                    {{ Form::label("news_documents[" . $key . "][title]", '資料', ['class' => 'shrink-0 w-44']) }}
                    <div class="w-full">
                        {{ Form::text("news_documents[" . $key . "][title]", null, ['placeholder'=>'資料名を入力', 'class' => 'w-full placeholder:text-slate-400 border-slate-300 rounded-md mb-1' ]) }}
                        {{ Form::file("news_documents[" . $key . "][document_path]", ['accept' => '.pdf', 'class' => 'w-full']) }}
                    </div>
                </li>
                @endforeach
                @else
                <li class="flex mb-4">
                    {{ Form::label('news_documents[0][title]', '資料', ['class' => 'shrink-0 w-44']) }}
                    <div class="w-full" id="count">
                        <div class="flex items-center" id="0">
                            {{ Form::text('news_documents[0][title][]', null, ['placeholder'=>'資料名を入力', 'class' => 'w-full mr-1 placeholder:text-slate-400 border-slate-300 rounded-md mb-1']) }}
                            {{ Form::file('news_documents[0][document_path][]', ['accept' => '.pdf', 'class' => 'file w-full']) }}
                            <button type="button" class="add border border-blue-500 text-blue-500 w-16 h-7 rounded-lg mr-1" hidden>+</button>
                            <button type="button" class="del border border-red-500 text-red-500 w-16 h-7 rounded-lg" hidden>-</button>
                        </div>
                    </div>
                </li>
                @endif

                @if (is_array($news))
                @foreach ($news['news_links'] as $key => $news_links)
                <li class="flex mb-4">
                    {{ Form::label("news_links[" . $key . "][title]", 'リンク', ['class' => 'shrink-0 w-44']) }}
                    {{ Form::text("news_links[" . $key . "][title]", null, ['placeholder'=>'リンク名を入力', 'class' => 'w-full placeholder:text-slate-400 border-slate-300 rounded-md mr-1' ]) }}
                    {{ Form::text('news_links[' . $key . '][link_path]', null, ['placeholder'=>'リンクpathを入力', 'class' => 'w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                </li>
                @endforeach
                @else
                <li class="flex mb-4">
                    {{ Form::label('news_links[0][title]', 'リンク', ['class' => 'shrink-0 w-44']) }}
                    {{ Form::text('news_links[0][title]', null, ['placeholder'=>'リンク名を入力', 'class' => 'w-full placeholder:text-slate-400 border-slate-300 rounded-md mr-1' ]) }}
                    {{ Form::text('news_links[0][link_path]', null, ['placeholder'=>'リンクpathを入力', 'class' => 'w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                </li>
                @endif

            </ul>
            <div class=" mt-20 flex justify-center">
                <x-parts.form-button bgColor='black'>{{ !is_array($news) ? '登録する' : '編集する' }}</x-parts.form-button>
            </div>
            {{ Form::close() }}
        </x-layout.container>
    </section>
</x-layout.layout>