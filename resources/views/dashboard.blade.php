<x-app-layout>
    <x-container>
        <div class="row mt-4">
            <div class="col-md-8">
                @foreach ($posts as $item)
                    <x-post :item="$item" />
                @endforeach
            </div>

            <div class="col-md-4"></div>
        </div>
    </x-container>
</x-app-layout>
