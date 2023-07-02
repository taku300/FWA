<x-layout.layout>
    <!-- main -->
    <section>
        <x-layout.container>
            <div id="news-id" class="mt-32 mb-16 flex justify-between" data-news-id="{{ $news['id'] }}">

                <x-parts.title>
                    {{ !is_array($news) ?
                        'お知らせ・大会情報登録' :
                        'お知らせ・大会情報編集'
                    }}
                </x-parts.title>
                @if (is_array($news))
                <form action="{{ route('admins.news.destroy', ['news' => $news['id']]) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <x-parts.button bgColor="red" fontColor="white">消去</x-parts.button>
                </form>
                @endif
            </div>
            <!-- 遷移先判定のロジック -->
            @php
            $method = !is_array($news) ? 'post' : 'put';
            $path = !is_array($news) ? 'admins.news.store' : 'admins.news.update';
            @endphp
            {{ Form::model($news, ['method'=> $method, 'route'=>[$path, 'news' => isset($id) ? $id : null], 'files'=>true]) }}
            <ul>
                <li class="mb-4">
                    {{ Form::error('category') }}
                </li>
                <li class="flex mb-4">
                    {{ Form::label('category', 'カテゴリー', ['class' => 'shrink-0 w-24']) }}
                    <p class="shrink-0 w-20 text-[#FF0404]">【必須】</p>
                    {{ Form::select('category', \CategoryConst::CATEGORY_LIST['category'], $news['category'] ? $news['category'] : \CategoryConst::NEWS, ['placeholder'=>'選択してください', 'class' => 'shrink-0 w-1/5 placeholder:text-slate-400 border-slate-300 rounded-md']) }}
                </li>
                <li class="mb-4">
                    {{ Form::error('noticed_at') }}
                </li>
                <li class="flex mb-4">
                    {{ Form::label('noticed_at', 'お知らせ日', ['class' => 'shrink-0 w-24']) }}
                    <p class="shrink-0 w-20 text-[#FF0404]">【必須】</p>
                    {{ Form::date('noticed_at', $news['noticed_at'] ? $news['noticed_at'] : now(), ['class' => 'shrink-0 w-1/5 placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                </li>
                <li class="mb-4">
                    {{ Form::error('title') }}
                </li>
                <li class="flex mb-4">
                    {{ Form::label('title', 'タイトル', ['class' => 'shrink-0 w-24']) }}
                    <p class="shrink-0 w-20 text-[#FF0404]">【必須】</p>
                    {{ Form::text('title', null, ['placeholder'=>'タイトルを入力', 'class' => 'w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                </li>
                <li class="mb-4">
                    {{ Form::error('note') }}
                </li>
                <li class="flex mb-4">
                    {{ Form::label('note', '注意書き', ['class' => 'shrink-0 w-44']) }}
                    {{ Form::textarea('note', null, ['placeholder'=>'注意書きを入力', 'class'=>'align-top w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                </li>
                <li class="mb-4">
                    {{ Form::error('detail') }}
                </li>
                <li class="flex mb-4">
                    {{ Form::label('detail', 'お知らせ詳細', ['class' => 'shrink-0 w-44']) }}
                    {{ Form::textarea('detail', null, ['placeholder'=>'お知らせ詳細を入力', 'class' => 'align-top w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                </li>
                <li class="mb-4">
                    {{ Form::error('iframe_path') }}
                </li>
                <li class="flex mb-4">
                    {{ Form::label('iframe_path', 'iframeURL', ['class' => 'shrink-0 w-44']) }}
                    {{ Form::text('iframe_path', null, ['placeholder'=>'iframeURLを入力', 'class' => 'align-top w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                </li>
                <li class="mb-4">
                    {{ Form::error('preliminary_report_flag') }}
                </li>
                <li class="flex items-center mb-4">
                    {{ Form::label('preliminary_report_flag', '速報', ['class' => 'shrink-0 w-44']) }}
                    {{ Form::radio('preliminary_report_flag', 1, 1 == old('preliminary_report_flag', $news['preliminary_report_flag'])) }}
                    <span class="ml-1 mr-4">設定する</span>
                    {{ Form::radio('preliminary_report_flag', 0, 0 == old('preliminary_report_flag', $news['preliminary_report_flag'])) }}
                    <span class="ml-1">設定しない</span>

                </li>
            </ul>
            <ul>
                <li class="mb-4">
                    {{ Form::error('news_documents.*.title') }}
                    {{ Form::error('news_documents.*.document_path') }}
                </li>
                @if (is_array($news))
                <li class="flex items-center mb-4">
                    {{ Form::label("", '資料', ['class' => !empty($news['news_documents']) ? 'hidden shrink-0 w-44' : 'shrink-0 w-44']) }}
                    {{ Form::hidden('' )}}
                    {{ Form::text("", null, ['placeholder'=>'資料名を入力', 'class' => 'hidden w-full placeholder:text-slate-400 border-slate-300 rounded-md mb-1' ]) }}
                    {{ Form::file("", ['accept' => '.pdf', 'class' => 'hidden file w-full ml-1']) }}
                    {{ Form::hidden('' )}}
                    {{ Form::hidden('',  )}}
                    <button type="button" class="{{ !empty($news['news_documents']) ? 'hidden' : '' }} js-add-document border border-blue-500 text-blue-500 w-16 h-7 rounded-lg mx-1">+</button>
                    <button type="button" class="hidden js-del border border-red-500 text-red-500 w-16 h-7 rounded-lg">-</button>
                </li>
                @foreach ($news['news_documents'] as $key => $news_documents)
                <li class="flex items-center mb-4">
                    {{ Form::label("news_documents[$key][title]", '資料', ['class' => 'shrink-0 w-44']) }}
                    {{ Form::hidden("news_documents[$key][id]", $news_documents['id'] )}}
                    {{ Form::text("news_documents[$key][title]", null, ['placeholder'=>'資料名を入力', 'class' => 'w-full placeholder:text-slate-400 border-slate-300 rounded-md mb-1' ]) }}
                    {{ Form::file("news_documents[$key][document_file]", ['accept' => '.pdf', 'class' => 'file w-full ml-1']) }}
                    {{ Form::hidden("news_documents[$key][document_path]", $news_documents['document_path'] )}}
                    {{ Form::hidden("news_documents[$key][news_id]", $news['id'] )}}
                    <button type="button" class="js-add-document border border-blue-500 text-blue-500 w-16 h-7 rounded-lg mx-1">+</button>
                    <button type="button" class="js-del border border-red-500 text-red-500 w-16 h-7 rounded-lg">-</button>
                </li>
                @endforeach
                @else
                <li class="flex items-center mb-4">
                    {{ Form::label("", '資料', ['class' => 'shrink-0 w-44']) }}
                    {{ Form::hidden('' )}}
                    {{ Form::text("", null, ['placeholder'=>'資料名を入力', 'class' => 'hidden w-full placeholder:text-slate-400 border-slate-300 rounded-md mb-1' ]) }}
                    {{ Form::file("", ['accept' => '.pdf', 'class' => 'hidden file ml-1 w-full']) }}
                    {{ Form::hidden('' )}}
                    {{ Form::hidden('',  )}}
                    <button type="button" class="js-add-document border border-blue-500 text-blue-500 w-16 h-7 rounded-lg mx-1">+</button>
                    <button type="button" class="hidden js-del border border-red-500 text-red-500 w-16 h-7 rounded-lg">-</button>
                </li>
                @endif
            </ul>
            <ul>
                <li class="mb-4">
                    {{ Form::error('news_links.*.title') }}
                    {{ Form::error('news_links.*.link_path') }}
                </li>
                @if (is_array($news))
                <li class="w-full flex items-center mb-4">
                    {{ Form::hidden('' )}}
                    {{ Form::label("", 'リンク', ['class' => !empty($news['news_links']) ? 'hidden shrink-0 w-44' : 'shrink-0 w-44']) }}
                    {{ Form::text("", null, ['placeholder'=>'リンク名を入力', 'class' => 'hidden w-full placeholder:text-slate-400 border-slate-300 rounded-md mr-1' ]) }}
                    {{ Form::text('', null, ['placeholder'=>'リンクpathを入力', 'class' => 'hidden w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                    {{ Form::hidden('')}}
                    <button type="button" class="{{!empty($news['news_links']) ? 'hidden' : ''}} js-add-link border border-blue-500 text-blue-500 w-16 h-7 rounded-lg mx-1">+</button>
                    <button type="button" class="hidden js-del border border-red-500 text-red-500 w-16 h-7 rounded-lg">-</button>
                </li>
                @foreach ($news['news_links'] as $key => $news_links)
                <li class="w-full flex items-center mb-4">
                    {{ Form::hidden("news_links[$key][id]", $news_links['id'] )}}
                    {{ Form::label("news_links[$key][title]", 'リンク', ['class' => 'shrink-0 w-44']) }}
                    {{ Form::text("news_links[$key][title]", null, ['placeholder'=>'リンク名を入力', 'class' => 'w-full placeholder:text-slate-400 border-slate-300 rounded-md mr-1' ]) }}
                    {{ Form::text("news_links[$key][link_path]", null, ['placeholder'=>'リンクpathを入力', 'class' => 'w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                    {{ Form::hidden("news_links[$key][news_id]", $news['id'] )}}
                    <button type="button" class="js-add-link border border-blue-500 text-blue-500 w-16 h-7 rounded-lg mx-1">+</button>
                    <button type="button" class="js-del border border-red-500 text-red-500 w-16 h-7 rounded-lg">-</button>
                </li>
                @endforeach
                @else
                <li class="w-full flex items-center mb-4">
                    {{ Form::hidden('' )}}
                    {{ Form::label("", 'リンク', ['class' => 'shrink-0 w-44']) }}
                    {{ Form::text("", null, ['placeholder'=>'リンク名を入力', 'class' => 'hidden w-full placeholder:text-slate-400 border-slate-300 rounded-md mr-1' ]) }}
                    {{ Form::text('', null, ['placeholder'=>'リンクpathを入力', 'class' => 'hidden w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                    {{ Form::hidden('')}}
                    <button type="button" class="js-add-link border border-blue-500 text-blue-500 w-16 h-7 rounded-lg mx-1">+</button>
                    <button type="button" class="hidden js-del border border-red-500 text-red-500 w-16 h-7 rounded-lg">-</button>
                </li>
                @endif

            </ul>
            <ul>
                <li class="mb-4">
                    {{ Form::error('news_images.*.news_image_path') }}
                </li>
                @if (is_array($news))
                <li class="w-full flex items-center mb-4">
                    {{ Form::hidden('' )}}
                    {{ Form::label("", '画像', ['class' => !empty($news['news_images']) ? 'hidden shrink-0 w-44' : 'shrink-0 w-44']) }}
                    {{ Form::file("", ['accept' => '.png, , .jpg, .jpeg', 'class' => 'hidden file w-full']) }}
                    {{ Form::hidden('')}}
                    <button type="button" class="{{!empty($news['news_images']) ? 'hidden' : ''}} js-add-image border border-blue-500 text-blue-500 w-16 h-7 rounded-lg mx-1">+</button>
                    <button type="button" class="hidden js-del border border-red-500 text-red-500 w-16 h-7 rounded-lg">-</button>
                </li>
                @foreach ($news['news_images'] as $key => $news_images)
                <li class="w-full flex items-center mb-4">
                    {{ Form::hidden("news_images[$key][id]", $news_images['id'] )}}
                    {{ Form::label("news_images[$key][news_image_file]", '画像', ['class' => 'shrink-0 w-44']) }}
                    {{ Form::file("news_images[$key][news_image_file]", ['accept' => '.png, , .jpg, .jpeg', 'class' => 'file w-full']) }}
                    {{ Form::hidden("news_images[$key][news_id]", $news['id'] )}}
                    <button type="button" class="js-add-image border border-blue-500 text-blue-500 w-16 h-7 rounded-lg mx-1">+</button>
                    <button type="button" class="js-del border border-red-500 text-red-500 w-16 h-7 rounded-lg">-</button>
                </li>
                @endforeach
                @else
                <li class="w-full flex items-center mb-4">
                    {{ Form::hidden('' )}}
                    {{ Form::label("", '画像', ['class' => 'shrink-0 w-44']) }}
                    {{ Form::file("", ['accept' => '.png, , .jpg, .jpeg', 'class' => 'hidden file w-full']) }}
                    {{ Form::hidden('')}}
                    <button type="button" class="js-add-image border border-blue-500 text-blue-500 w-16 h-7 rounded-lg mx-1">+</button>
                    <button type="button" class="hidden js-del border border-red-500 text-red-500 w-16 h-7 rounded-lg">-</button>
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