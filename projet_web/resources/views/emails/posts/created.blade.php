<x-mail::message>
    # It requires your attention
    A new post has been created
    <x-mail::button :url="'http://laraveltest.test/posts/'.$post->slug">
        visit {{$post->title}}
    </x-mail::button>
</x-mail::message>
