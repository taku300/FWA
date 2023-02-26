@auth
<div class="flex">
    <a class="inline-block mr-1" href="{{ route('admins.news.edit', ['news' => $value['id']]) }}">
        <x-parts.button bgColor="black" fontColor="white">編集</x-parts.button>
    </a>
    <form action="{{ route('admins.news.destroy', ['news' => $value['id']]) }}" method="post">
        @method('DELETE')
        @csrf
        <x-parts.button bgColor="red" fontColor="white">消去</x-parts.button>
    </form>
</div>
@endauth