<x-layout.layout>
    <!-- main -->
    <section>
        <x-layout.container>
            <div class="mt-32 mb-16">
                {{ Form::open(['method'=>'put', 'route'=>['admins.documents.update'], 'files'=>true]) }}
                {{ Form::token() }}
                <ul>
                    <li class="mb-4">
                        {{ Form::error('document_path_1') }}
                    </li>
                    <li class="flex mb-4">
                        {{ Form::label('document_path_1', '協会定款', ['class' => 'shrink-0 w-44']) }}
                        {{ Form::file('document_path_1', ['accept' => '.pdf', 'class' => '' ]) }}
                    </li>
                    <li class="mb-4">
                        {{ Form::error('document_path_2') }}
                    </li>
                    <li class="flex mb-4">
                        {{ Form::label('document_path_2', 'ガバナンスコード', ['class' => 'shrink-0 w-44']) }}
                        {{ Form::file('document_path_2', ['accept' => '.pdf', 'class' => '' ]) }}
                    </li>
                    <li class="mb-4">
                        {{ Form::error('document_path_3') }}
                    </li>
                    <li class="flex mb-4">
                        {{ Form::label('document_path_3', '年間計画', ['class' => 'shrink-0 w-44']) }}
                        {{ Form::file('document_path_3', ['accept' => '.pdf', 'class' => '' ]) }}
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