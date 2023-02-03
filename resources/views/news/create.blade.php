<x-layout.layout>
    <!-- main -->
    <section>
        <x-layout.container>
            <div class="mt-32 mb-16">
                <x-parts.title>
                    {{ count($news['news_links']) == 0 ?
                        'お知らせ・大会情報登録' :
                        'お知らせ・大会情報編集'
                    }}
                </x-parts.title>
            </div>
            {{ Form::open(['route' => 'admins.news.store']) }}
                {{ Form::token() }}
                {{ Form::model($news, ['method'=>'post', 'route'=>['admins.news.store'], 'class'=>'' ]) }}
                <ul>
                    <li class="flex mb-4">
                        {{ Form::label('category', 'カテゴリー', ['class' => 'shrink-0 w-24']) }}
                        <p class="shrink-0 w-24 text-[#FF0404]">【必須】</p>
                        {{ Form::select('category', \CategoryConst::CATEGORY_LIST, null, ['id' => 'category', 'placeholder'=>'選択してください', 'class' => 'placeholder:text-slate-400 border-slate-300 rounded-md']) }}
                    </li>
                    <li class="flex mb-4">
                        {{ Form::label('noticed_at', 'お知らせ日', ['class' => 'shrink-0 w-24']) }}
                        <p class="shrink-0 w-24 text-[#FF0404]">【必須】</p>
                        {{ Form::text('noticed_at', null, ['placeholder'=>'タイトルを入力', 'class' => 'w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                    </li>
                    <li class="flex mb-4">
                        {{ Form::label('title', 'タイトル', ['class' => 'shrink-0 w-24']) }}
                        <p class="shrink-0 w-24 text-[#FF0404]">【必須】</p>
                        {{ Form::text('title', null, ['placeholder'=>'タイトルを入力', 'class' => 'w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                    </li>
                    <li class="flex mb-4">
                        {{ Form::label('note', '注意書き', ['class' => 'shrink-0 w-48']) }}
                        {{ Form::textarea('note', null, ['placeholder'=>'タイトルを入力', 'class'=>'align-top w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                    </li>
                    <li class="flex mb-4">
                        {{ Form::label('detail', 'お知らせ詳細', ['class' => 'shrink-0 w-48']) }}
                        {{ Form::textarea('detail', null, ['placeholder'=>'タイトルを入力', 'class' => 'align-top w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                    </li>
                    <li class="flex mb-4">
                        {{ Form::label('iframe_path', 'iframeURL', ['class' => 'shrink-0 w-48']) }}
                        {{ Form::textarea('iframe_path', null, ['placeholder'=>'タイトルを入力', 'class' => 'align-top w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                    </li>
                    <li class="mb-4">
                        {{ Form::label('preliminary_report_flag', '速報', ['class'=>'mr-1']) }}
                        {{ Form::checkbox('preliminary_report_flag', 1, false, ['class'=>'']) }}
                    </li>
                    @if (count($news['news_documents']) != 0)
                        @foreach ($news['news_documents'] as $key => $news_documents)
                            <li class="flex mb-4">
                                {{ Form::label('news_documents[' . $key . '][title]', '資料', ['class' => 'shrink-0 w-48']) }}
                                <div class="flex w-full">
                                    {{ Form::text('news_documents[' . $key . '][title]', null, ['placeholder'=>'資料名を入力', 'class' => 'w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                                    {{ Form::text('news_documents[' . $key . '][document_path]', null, ['placeholder'=>'資料名を入力', 'class' => 'w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                                </div>
                            </li>
                        @endforeach
                    @else
                        <li class="flex mb-4">
                            {{ Form::label('news_documents[0][title]', '資料', ['class' => 'shrink-0 w-48']) }}
                            <div class="flex w-full">
                                {{ Form::text('news_documents[0][title]', null, ['placeholder'=>'資料名を入力', 'class' => 'w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                                {{ Form::text('news_documents[0][document_path]', null, ['placeholder'=>'資料名を入力', 'class' => 'w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                            </div>
                        </li>
                    @endif

                    @if (count($news['news_links']) != 0)
                    @foreach ($news['news_links'] as $key => $news_links)
                        <li class="flex mb-4">
                            {{ Form::label('news_links[' . $key . '][title]', 'リンク', ['class' => 'shrink-0 w-48']) }}
                            {{ Form::text('news_links[' . $key . '][title]', null, ['placeholder'=>'タイトルを入力', 'class' => 'w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                            {{ Form::text('news_links[' . $key . '][link_path]', null, ['placeholder'=>'タイトルを入力', 'class' => 'w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                        </li>
                    @endforeach
                    @else
                        <li class="flex mb-4">
                            {{ Form::label('news_links[0][title]', 'リンク', ['class' => 'shrink-0 w-48']) }}
                            {{ Form::text('news_links[0][title]', null, ['placeholder'=>'タイトルを入力', 'class' => 'w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                            {{ Form::text('news_links[0][link_path]', null, ['placeholder'=>'タイトルを入力', 'class' => 'w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                        </li>
                    @endif

                </ul>
                <div class=" mt-20 flex justify-center">
                    <x-parts.form-button bgColor='black'>{{ count($news['news_links']) == 0 ? '登録する' : '編集する' }}</x-parts.form-button>
                </div>
            {{ Form::close() }}
        </x-layout.container>
    </section>
</x-layout.layout>
