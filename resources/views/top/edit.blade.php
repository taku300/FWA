<x-layout.layout>
    <!-- main -->
    <section>
        <x-layout.container>
            <div class="mt-32 mb-16">
                <a href="{{ asset('public/top-images/top_image_path_1') }}"></a>
                {{ Form::open(['method'=>'put', 'route'=>['admins.top.update'], 'files'=>true]) }}
                {{ Form::token() }}
                <ul>
                    <li class="flex mb-4">
                        {{ Form::label('top_lifter_1', '選手１', ['class' => 'shrink-0 w-24']) }}
                        {{ Form::select('top_lifter_1', $allLifterList, $topLifterList[0]['id'], ['placeholder'=>'選択してください', 'class' => 'placeholder:text-slate-400 border-slate-300 rounded-md']) }}
                    </li>
                    <li class="flex mb-4">
                        {{ Form::label('top_lifter_2', '選手２', ['class' => 'shrink-0 w-24']) }}
                        {{ Form::select('top_lifter_2', $allLifterList, $topLifterList[1]['id'], ['placeholder'=>'選択してください', 'class' => 'placeholder:text-slate-400 border-slate-300 rounded-md']) }}
                    </li>
                    <li class="flex mb-4">
                        {{ Form::label('top_image_path_1', 'TOP1', ['class' => 'shrink-0 w-24']) }}
                        {{ Form::file('top_image_path_1', ['accept' => '.png, , .jpg, .jpeg', 'class' => '' ]) }}
                    </li>
                    <li class="flex mb-4">
                        {{ Form::label('top_image_path_2', 'TOP2', ['class' => 'shrink-0 w-24']) }}
                        {{ Form::file('top_image_path_2', ['accept' => '.png, , .jpg, .jpeg', 'class' => '' ]) }}
                    </li>
                    <li class="flex mb-4">
                        {{ Form::label('top_image_path_3', 'TOP3', ['class' => 'shrink-0 w-24']) }}
                        {{ Form::file('top_image_path_3', ['accept' => '.png, , .jpg, .jpeg', 'class' => '' ]) }}
                    </li>
                </ul>
                <div class=" mt-20 flex justify-center">
                    <x-parts.form-button bgColor='black'>更新</x-parts.form-button>
                </div>
                {{ Form::close() }}
            </div>
        </x-layout.container>
    </section>
</x-layout.layout>