<x-layout.layout>
    <!-- main -->
    <section>
        <x-layout.container>
            <div class="mt-32 mb-16">
                <x-parts.title>
                    {{ !is_array($results) ?
                        '要項・結果登録' :
                        '要項・結果編集'
                    }}
                </x-parts.title>
            </div>
            <!-- 遷移先判定のロジック -->
            @php
                $method = !is_array($results) ? 'post' : 'put';
                $path = !is_array($results) ? 'admins.results.store' : 'admins.results.update';
            @endphp
            {{ Form::model($results, ['method'=>$method, 'route'=>[$path, 'result' => isset($id) ? $id : null], 'files'=>true]) }}
                {{ Form::token() }}
                <ul>
                    <li class="flex mb-4">
                        {{ Form::label('started_at', '開催日', ['class' => 'shrink-0 w-24']) }}
                        <p class="shrink-0 w-20 text-[#FF0404]">【必須】</p>
                        {{ Form::date('started_at', null, ['class' => 'w-full border-slate-300 rounded-md' ]) }}
                        <span class="flex items-center mx-2"> 〜 </span>
                        {{ Form::date('ended_at', null, ['class' => 'w-full border-slate-300 rounded-md' ]) }}
                    </li>
                    <li class="flex mb-4">
                        {{ Form::label('name', '大会名', ['class' => 'shrink-0 w-24']) }}
                        <p class="shrink-0 w-20 text-[#FF0404]">【必須】</p>
                        {{ Form::text('name', null, ['placeholder'=>'大会名を入力', 'class' => 'w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                    </li>
                    <li class="flex mb-4">
                        {{ Form::label('venue', '開催地', ['class' => 'shrink-0 w-24']) }}
                        <p class="shrink-0 w-20 text-[#FF0404]">【必須】</p>
                        {{ Form::text('venue', null, ['placeholder'=>'開催地を入力', 'class' => 'w-full placeholder:text-slate-400 border-slate-300 rounded-md' ]) }}
                    </li>
                    <li class="flex mb-4">
                        {{ Form::label('requirement_path', '要項', ['class' => 'shrink-0 w-44']) }}
                        {{ Form::file('requirement_path', ['accept' => '.pdf', 'class'=>'' ]) }}
                    </li>
                    <li class="flex mb-4">
                        {{ Form::label('result_path', '結果', ['class' => 'shrink-0 w-44']) }}
                        {{ Form::file('result_path', ['accept' => '.pdf', 'class' => '' ]) }}
                    </li>
                </ul>
                <div class=" mt-20 flex justify-center">
                    <x-parts.form-button bgColor='black'>{{ !is_array($results) ? '登録する' : '編集する' }}</x-parts.form-button>
                </div>
            {{ Form::close() }}
        </x-layout.container>
    </section>
</x-layout.layout>
