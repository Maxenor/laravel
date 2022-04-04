<x-layout>
    <article>
        <h1>{{ $post->title }}</h1>

        <p>
            <a href="#">{{ $post->category->name }}</a>
        </p>

        <div>
            {!! $post->body !!}  {{--{!! pour ne pas échapper les caractères spéciaux !!}--}}
        </div>
    </article>
    <a href="/">Go back</a>
</x-layout>
