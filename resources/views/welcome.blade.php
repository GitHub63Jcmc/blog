<x-layouts.app>

    <ul class="space-y-4 mb-4 p-4 rounded">
        <h1>Joao</h1>
        @foreach ($posts as $post)
            <li class="rounded shadow-lg">
                <article class="bg-white rounded shadow-lg">
                    <img class="h-72 w-full object-cover object-center" src="{{ $post->image }}" alt="">
                    <div class="px-6 py-2 bg-cyan-200 rounded">
                        <h1 class="font-semibold text-xl mb-2">
                            <a href="{{ route('posts.show', $post)}}">
                                {{ $post->title }}
                            </a>
                        </h1>

                        <div class="bg-amber-200 rounded shadow-lg">
                            {{ $post->excerpt }}
                        </div>
                    </div>
                </article>
            </li> 
        @endforeach
    </ul>

    <div>
        {{ $posts->links() }}
    </div>

</x-layouts.app>