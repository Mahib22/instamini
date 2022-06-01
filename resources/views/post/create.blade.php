<x-app-layout>
    <x-container>
        <div class="row my-4">
            <div class="col-md-6 mx-auto">

                <x-card>
                    <x-slot name="header">
                        <p class="mb-0 text-center h3 text-uppercase">Buat Postingan</p>
                    </x-slot>

                    <form action="{{ route('post.store') }}" method="post" class="p-2"
                        enctype="multipart/form-data">
                        @csrf

                        <!-- Image -->
                        <x-label for="img">Upload Foto</x-label>
                        <x-input type="file" id="img" name="img" onchange="preview()" />

                        <img src="" alt="" id="previewImg" class="img-fluid mb-2">

                        <!-- Caption -->
                        <x-label for="caption">Caption</x-label>
                        <x-textarea id="caption" name="caption" placeholder="Tulis caption" />

                        <div class="d-grid gap-2 mb-3">
                            <x-button>Upload Postingan</x-button>
                        </div>
                    </form>
                </x-card>

            </div>
        </div>
    </x-container>
</x-app-layout>
