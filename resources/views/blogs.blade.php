<x-layout>
    <x-slot name="title">
        <title>Blogs</title>
    </x-slot>
    <x-slot name='content'>
        @foreach ($blogs as $blog)
            <h1><a href="blogs/{{ $blog->slug }}">{{ $blog->title }}</a></h1>
            <p>{{ $blog->show }}</p>
        @endforeach
    </x-slot>
</x-layout>
