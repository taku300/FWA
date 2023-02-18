<x-layout.layout>
    <!-- main -->
    <section>
        <!-- Men -->
        <div class="mt-32 mb-24 sp:mb-12">
            <x-lifters.title textColor="gold">Man</x-lifters.title>
        </div>
        <div class="mx-[11%] s-pc:mx-[6%] sp:mx-[3%] pb-96">
            <x-lifters.list class="list" :lifters="$manLifters"></x-lifters.list>
        </div>
        <!-- Women -->
        <div class="mt-32 mb-24 sp:mb-12">
            <x-lifters.title textColor="gold">Woman</x-lifters.title>
        </div>
        <div class="mx-[11%] s-pc:mx-[6%] sp:mx-[3%] pb-96">
            <x-lifters.list class="list" :lifters="$womanLifters"></x-lifters.list>
        </div>
    </section>
</x-layout.layout>
