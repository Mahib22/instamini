<x-app-layout>
    <x-container>
        <div class="row mt-4">
            <div class="col-md-8">
                @forelse ($posts as $item)
                    <x-post :item="$item" />
                @empty
                    @if (request()->routeIs('dashboard'))
                        <h1>Beranda Anda masih kosong</h1>
                    @else
                        <h1>
                            @isset($querySearch)
                                "{{ $querySearch }}"
                            @endisset Tidak ditemukan
                        </h1>
                    @endif
                @endforelse
            </div>

            <div class="col-md-4"></div>
        </div>
    </x-container>
</x-app-layout>
