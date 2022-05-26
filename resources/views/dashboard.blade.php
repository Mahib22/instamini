<x-app-layout>
    <x-container>
        <div class="row mt-4">
            <div class="col-md-8">
                @forelse ($posts as $item)
                    <x-post :item="$item" />
                @empty
                    <h1>
                        @isset($querySearch)
                            "{{ $querySearch }}"
                        @endisset Tidak ditemukan
                    </h1>
                @endforelse
            </div>

            <div class="col-md-4"></div>
        </div>
    </x-container>
</x-app-layout>
