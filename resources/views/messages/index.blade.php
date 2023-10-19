<x-layout titre="Bienvenue {{ auth()->user()->prenom }}">
    <x-alertes.message cle="succes" />

    <div class="flex w-3/4 bg-[#f2f5f3] bg-opacity-30 text-center items-center ">
        <div class="w-1/2 pr-8">
            <h1 class="text-3xl font-bold pt-12 mb-6">Posez-moi une question!</h1>
            <form action="{{ route('deconnexion') }}" method="POST" class="mb-8">
                @csrf
                <button type="submit"
                    class="bg-blue-400 text-white px-6 py-3 rounded hover:bg-white hover:text-black">Déconnexion</button>
            </form>

            <form action="{{ route('messages.store') }}" method="POST" class="mt-4 p-3">
                @csrf
                <label for="question" class="block mb-3 font-bold text-xl">Votre question</label>
                <textarea name="question" id="question" rows="6" class="w-full border-4 ml-4 rounded-lg text-xl"></textarea>
                <button type="submit"
                    class="bg-green-300 text-black px-6 py-4 rounded hover:bg-black hover:text-white mt-4">Envoyer</button>
            </form>

            <x-forms.erreur champ="question" />
        </div>

        <div class="border-l border-gray-400"></div>

        <div class="w-1/2   bg-[#1c1b17] bg-opacity-80 bg-fixed">
            <div class="h-screen p-6 overflow-auto">
                @foreach ($message_tri as $key => $message)
                    <div class="message mb-6 ml-0 ">
                        <p class="text-white pb-3 w-1/2 pr-10">{{ $message->created_at->diffForHumans() }}</p>
                        <div
                            class="rounded-lg border border-gray-300 p-4 {{ $key === 0 ? 'custom-bg-blue' : 'bg-white' }}">
                            <div class="flex items-center mb-2 ">
                                @if (auth()->user()->avatar)
                                    <img class="w-10 h-10 object-cover rounded-full mr-2"
                                        src="{{ auth()->user()->avatar }}"
                                        alt="Avatar de {{ auth()->user()->prenom }} {{ auth()->user()->nom }}">
                                @endif
                                <strong>{{ auth()->user()->prenom }}</strong>
                            </div>
                            <p class="mb-1">{{ $message->question }}</p>
                        </div>

                        <div
                            class="reponse rounded-lg p-4 ml-10 mt-4 {{ $key === 0 ? 'custom-bg-blue' : 'bg-green-200' }}">
                            <div class="flex items-center">
                                <img class="w-10 h-10 object-cover rounded-full mr-2" src="images/eveuhhh.jpg"
                                    alt="eve">
                                <strong>LaraGPT</strong>
                            </div>
                            @if ($message->reponse === 'Désolé, Je ne sais pas quoi répondre...')
                                <a href="https://www.google.com/search?q={{ urlencode($message->question) }}"
                                    target="_blank"
                                    class="text-black underline hover:text-indigo-800">{{ $message->reponse }}</a>
                            @else
                                <p class="ml-2">{{ $message->reponse }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>




    </div>
</x-layout>
