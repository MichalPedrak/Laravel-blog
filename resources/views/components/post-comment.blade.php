@props(['comment'])

<x-panel>
<section class="col-span-8 col-start-5 mt-10">
    <article class="flex bg-gray-100 border border-gray-200 p-6 rounded-xl space-x-4">
        <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/60" alt="" width="60" height="60">
        </div>
        <div>
            <header>
                <h3 class="font-bold">{{ $comment->author->username }}</h3>
                <p class="text-xs">
                    Posted
                    <time>{{ $comment->created_at->diffForHumans()  }}</time>
                </p>
            </header>
            <p>{{ $comment->body }}</p>
            </div>
    </article>
</section>
{{--test--}}{{-- test 2--}}
</x-panel>
