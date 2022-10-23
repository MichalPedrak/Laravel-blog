<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto">
            <form method="POST" action="/sessions">  <!-- It will send a corespoding POST to te /register -->
                @csrf

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="email">
                        email
                    </label>
                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="email"
                           id="email"
                           value="{{ old('email') }}"
                           required>
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="password">
                        password
                    </label>
                    <input class="border border-gray-400 p-2 w-full"
                           type="password"
                           name="password"
                           id="password"
                           required>
                    @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <button type="submit"
                            I
                            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                    >
                        Login
                    </button>
                </div>

            </form>
        </main>
    </section>
</x-layout>
