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

    <script>
        // finding hashtag
        document.querySelectorAll(".captions").forEach(function(el) {
            let renderedText = el.innerHTML.replace(/#(\w+)/g,
                "<a class='text-decoration-none' href='/search?query=%23$1'>#$1</a>");
            el.innerHTML = renderedText;
        });

        // like post
        function like(id) {
            const el = document.getElementById('btnPost-' + id);
            fetch('/like/' + id)
                .then(res => res.json())
                .then(data => {
                    el.innerText = (data.status === 'LIKE') ? 'Unlike' : 'Like';
                });
        }
    </script>
</x-app-layout>
