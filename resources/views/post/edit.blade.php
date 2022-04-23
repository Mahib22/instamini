<x-app-layout>
    <x-container>
        <div class="row my-4">
            <div class="col-md-6 mx-auto">

                <x-card>
                    <x-slot name="header">
                        <p class="mb-0 text-center h3 text-uppercase">Edit Postingan</p>
                    </x-slot>

                    <div class="border border-primary p-2 rounded mb-2">
                        <img src="{{ asset('img/post/' . $post->img) }}" alt="" class="img-fluid">
                    </div>

                    <form action="{{ route('post.update', $post->id) }}" method="post" class="p-2">
                        @csrf
                        @method('PUT')

                        <!-- Caption -->
                        <x-label for="caption">Caption</x-label>
                        <x-textarea id="caption" name="caption" placeholder="Tulis caption">
                            {{ $post->caption }}
                        </x-textarea>

                        <div class="d-grid gap-2 mb-3">
                            <x-button>Update Caption</x-button>
                        </div>
                    </form>
                </x-card>

            </div>
        </div>
    </x-container>
</x-app-layout>
