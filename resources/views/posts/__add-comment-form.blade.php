@auth
    <section class="col-span-8 col-start-5 mt-10">
        <x-panel class="p-10">
            <form method="POST" action="/posts/{{ $post->slug }}/comments">
                @csrf
                <header class="flex items-center">
                    <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40" class="rounded-full">
                    <h2 class="ml-4">Want to participate?</h2>
                </header>
                <div class="mt-6">
                    <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" rows="5" placeholder="Quick, thing of something"></textarea>
                </div>
                <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                    <button type="submit" class="bg-blue-500 text-white uppercase font-semibold text-xs py-5 px-10 m-5 rounded-2xl hover:bg-blue">POST</button>
                </div>
            </form>
        </x-panel>
@endauth
