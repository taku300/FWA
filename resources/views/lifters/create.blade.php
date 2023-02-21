<x-layout.layout>
    <!-- main -->
    <section>
        <x-layout.container>
            <div class="mt-32 mb-16 flex justify-between">
                <x-parts.title>
                    {{ !is_array($lifters) ?
                        '選手登録' :
                        '選手編集'
                    }}
                </x-parts.title>
                @if (is_array($lifters))
                <a href="{{ route('admins.lifters.destroy', ['lifter' => $lifters['id']]) }}">
                    <x-parts.button bgColor="red" fontColor="white">消去</x-parts.button>
                </a>
                @endif
            </div>
            <!-- 遷移先判定のロジック -->
            @php
                $method = !is_array($lifters) ? 'post' : 'put';
                $path = !is_array($lifters) ? 'admins.lifters.store' : 'admins.lifters.update';
            @endphp
            {{ Form::model($lifters, ['method'=>$method, 'route'=>[$path, 'lifter' => isset($id) ? $id : null], 'files'=>true]) }}
                {{ Form::token() }}
                <ul>
                    <li class="flex mb-4">
                        {{ Form::label('last_name', '氏名', ['class' => 'shrink-0 w-24']) }}
                        <p class="shrink-0 w-20 text-[#FF0404]">【必須】</p>
                        {{ Form::text('last_name', null, ['placeholder'=>'性', 'class' => 'w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                        {{ Form::text('first_name', null, ['placeholder'=>'名', 'class' => 'w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                    </li>
                    <li class="flex mb-4">
                        {{ Form::label('last_name_kana', '氏名（カナ）', ['class' => 'shrink-0 w-24']) }}
                        <p class="shrink-0 w-20 text-[#FF0404]">【必須】</p>
                        {{ Form::text('last_name_kana', null, ['placeholder'=>'セイ', 'class' => 'w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                        {{ Form::text('first_name_kana', null, ['placeholder'=>'メイ', 'class' => 'w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                    </li>
                    <li class="flex mb-4">
                        {{ Form::label('birthday', '生年月日', ['class' => 'shrink-0 w-24']) }}
                        <p class="shrink-0 w-20 text-[#FF0404]">【必須】</p>
                        {{ Form::date('birthday',null, ['class' => 'border-slate-300 rounded-md']) }}
                    </li>
                    <li class="flex mb-4 items-center">
                        {{ Form::label('', '性別', ['class' => 'shrink-0 w-24']) }}
                        <p class="shrink-0 w-20 text-[#FF0404]">【必須】</p>
                        @foreach(\CommonConst::GENDER_LIST as $key => $gender)
                            {{ Form::radio('gender', $key, false, ['id' => 'gender' . $key ]) }}
                            {{ Form::label('gender' . $key, $gender, ['class' => 'ml-1 mr-4']) }}
                        @endforeach
                    </li>
                    <li class="flex mb-4">
                        {{ Form::label('category', 'カテゴリー', ['class' => 'shrink-0 w-24']) }}
                        <p class="shrink-0 w-20 text-[#FF0404]">【必須】</p>
                        {{ Form::select('category', \CategoryConst::GENERATION_CATEGORY_LIST, null, ['placeholder'=>'選択してください', 'class' => 'placeholder:text-slate-400 border-slate-300 rounded-md']) }}
                    </li>
                    <li class="flex mb-4 items-start">
                        {{ Form::label('affiliation_id', '所属', ['class' => 'shrink-0 w-24']) }}
                        <p class="shrink-0 w-20 text-[#FF0404]">【必須】</p>
                        <div class="sp:flex-col items-start">
                            {{ Form::select('affiliation_id', $affiliation, null, ['placeholder'=>'選択してください', 'class' => 'placeholder:text-slate-400 border-slate-300 rounded-md mr-2']) }}
                            <button type="button" class="js-show-modal py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-black text-white hover:bg-opacity-80 focus:outline-none focus:ring-2 focus:ring-opacity-80 focus:ring-offset-2 transition-all text-sm  sp:mt-1" data-hs-overlay="#hs-slide-up-animation-modal">
                            所属を追加
                            </button>
                        </div>
                    </li>
                    <li class="flex mb-4">
                        {{ Form::label('weight_class', '階級', ['class' => 'shrink-0 w-24']) }}
                        <p class="shrink-0 w-20 text-[#FF0404]">【必須】</p>
                        {{ Form::select('weight_class', \WeightClassConst::CLASS_LIST, null, ['placeholder'=>'選択してください', 'class' => 'placeholder:text-slate-400 border-slate-300 rounded-md']) }}

                    </li>
                    <li class="flex mb-4">
                        {{ Form::label('image_path', '画像', ['class' => 'shrink-0 w-24']) }}
                        <p class="shrink-0 w-20 text-[#FF0404]">【必須】</p>
                        {{ Form::file('image_path', ['accept' => '.png, , .jpg, .jpeg', 'class' => '' ]) }}
                    </li>
                    <li class="flex mb-4">
                        {{ Form::label('performance', '実績', ['class' => 'shrink-0 w-44']) }}
                        {{ Form::textarea('performance', null, ['placeholder'=>'実績を入力', 'class'=>'align-top w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                    </li>
                    <li class="flex mb-4">
                        {{ Form::label('comment', 'ひとこと', ['class' => 'shrink-0 w-44']) }}
                        {{ Form::textarea('comment', null, ['placeholder'=>'ひとことを入力', 'class'=>'align-top w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                    </li>
                </ul>
                <div class=" mt-20 flex justify-center">
                    <x-parts.form-button bgColor='black'>{{ !is_array($lifters) ? '登録する' : '編集する' }}</x-parts.form-button>
                </div>
            {{ Form::close() }}
        </x-layout.container>
    </section>
</x-layout.layout>

<x-parts.affiliation-modal :$lifters></x-parts.affiliation-modal>
