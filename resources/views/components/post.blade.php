<div class="card mb-2">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <div class="d-flex justify-content-start align-items-center">
            <x-avatar :avatar="$item->user->avatar" :username="$item->user->username" width="30px" />
            <p class="fw-bold mb-0 ms-2">{{ $item->user->username }}</p>
        </div>

        @if ($item->user_id == Auth::user()->id)
            <div class="dropdown">
                <x-nav-link :href="__('#')" id="dropdownMenu" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false" class="p-0">
                    <i class="fa-solid fa-ellipsis-vertical"></i>
                </x-nav-link>

                <ul class="dropdown-menu dropdown-menu-end rounded-0" aria-labelledby="dropdownMenu">
                    <x-dropdown-link :href="route('post.edit', $item->identifier)">
                        Edit
                    </x-dropdown-link>
                    <x-dropdown-link :href="__('#')">
                        Hapus
                    </x-dropdown-link>
                </ul>
            </div>
        @endif
    </div>

    <img src="{{ asset('img/post/' . $item->img) }}" alt="" class="card-img-top rounded-0">

    <div class="card-body">
        @if (request()->routeIs('post.edit'))
            <form action="{{ route('post.update', $item->id) }}" method="post" class="p-2">
                @csrf
                @method('PUT')

                <!-- Caption -->
                <x-label for="caption">Caption</x-label>
                <x-textarea id="caption" name="caption" placeholder="Tulis caption">
                    {{ $item->caption }}
                </x-textarea>

                <div class="d-grid gap-2 mb-3">
                    <x-button>Update Caption</x-button>
                </div>
            </form>
        @else
            <p class="card-text">{{ $item->caption }}</p>
        @endif
    </div>
</div>
