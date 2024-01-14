<x-layout>
    <x-slot name="title">
        <title>{{ $blog->title }}</title>
    </x-slot>

    <x-slot name="content">
        <h1>{{ $blog->title }}</h1>
        <p>{{ $blog->body }}</p>
        <button><a href="/">go back</a></button>
    </x-slot>
</x-layout>
