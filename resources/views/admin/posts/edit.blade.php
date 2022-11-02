<x-layout>
    <section class="px-6 py-8">
        <x-panel class="max-w-sm mx-auto">

            <form method="POST" action="/admin/posts/{{ $post->id }}" enctype='multipart/form-data'>
                @csrf
                @method('patch')
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="title"
                           Title
                           label> Title
                        <input class="border border-gray-400 p-2 w-full"
                               type="text"
                               name="title"
                               value="{{ $post->title }}"
                               id="title"
                               required>
                        @error('title')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </label>

                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="thumbnail   "

                           label> thumbnail
                        <input class="border border-gray-400 p-2 w-full"
                               type="file"
                               name="thumbnail"
                               id="thumbnail"
                               value="{{ old('file') }}"
                                >
                        @error('thumbnail')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </label>

                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="slug"
                           Title
                           label> Slug
                        <textarea class="border border-gray-400 p-2 w-full"
                                  type="text"
                                  name="slug"
                                  id="slug"
                                  value="{{ $post->slug }}"
                                  value="{{ old('title') }}"
                                  required ></textarea>
                        @error('slug')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </label>


                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="excerpt"
                           Title
                           label> Excerpt
                        <textarea class="border border-gray-400 p-2 w-full"
                                  type="text"
                                  name="excerpt"
                                  id="excerpt"
{{--                                  value="{{  }}"--}}
                                  required >{{ $post->excerpt }}</textarea>
                        @error('excerpt')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </label>

                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="body"
                           Title
                           label> Body
                        <textarea class="border border-gray-400 p-2 w-full"
                                  type="text"
                                  name="body"
                                  id="body"
                                  required >{{ $post->body }}</textarea>
                        @error('body')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </label>
                </div>

                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="category"
                > Category
                    <select name="category_id" id="category">
                        @php
                            $categories = \App\Models\Category::all();
                        @endphp

                        @foreach ($categories as $category)
                            <option value="{{ $category->id  }}" {{ $category->id == $post->category->id ? "selected" : '' }}> {{ $category->name}}</option>
                        @endforeach

                    </select>


                    @error('category')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </label>
                <button class="bg-blue-500 rounded-xl py-5 px-10">Publish</button>
                </div>


            </form>
        </x-panel>
    </section>
</x-layout>
