<x-layout>
    @foreach ($posts as $post)
        {{--@dd($loop) avoir des infos sur la boucle actuelle
        on peut imaginer des choses comme <p class="{{ $loop->even ? 'mb-6' : ''}} si le loop est even alors ajoute margin>--}}
        <article>
            <h1>
                <a href="/posts/{{ $post->slug }} ">
                    {{ $post->title }}
                </a>
            </h1>

            <p>
                <a href="#">{{ $post->category->name }}</a>
            </p>

            <div>
                {{ $post->excerpt }}
            </div>
        </article>
    @endforeach
</x-layout>




