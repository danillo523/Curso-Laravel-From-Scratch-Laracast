@auth
    <x-panel>
        <form method="POST" action="/post/{{ $post->slug }}/comments">
            @csrf

            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" width="60" height="60" class="rounded-xl">

                <h2 class="ml-2">Quer participar ?</h2>
            </header>

            <div class="mt-6">
                <textarea
                    name="body"
                    class="w-full text-sm focus:outline-none focus:ring border border-gray-200"
                    rows="5"
                    placeholder=" Deixe sua opinião!"
                    required></textarea>

                @error('body')
                <span class="text-red-500 text-xs mt-5">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end">
                <x-form.button>Postar</x-form.button>
            </div>
        </form>
    </x-panel>
@else
    <p>
        <a class="text-blue-600" href="/login"> Logar</a> ou <a class="text-blue-600" href="/register"> se registar</a>
        para comentar
    </p>
@endauth
