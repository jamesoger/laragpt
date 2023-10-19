<x-layout titre="Connexion">
    @error (('erreur'))
        <p class="absolute z-50 top-4 right-4 bg-red-900 text-white mx-auto p-2 rounded-md">
            {{ $message }}
        </p>
    @enderror
    <div class="w-full md:w-1/2 lg:w-1/3 p-6 rounded-lg bg-gray-900 text-center animate-slideInFromRight ">
        <form class="space-y-6 bg-white p-6 rounded-lg shadow-md" action="{{ route('connexion.authentifier') }}"
            method="POST">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Courriel</label>
                <x-forms.erreur champ="email" />
                <div class="mt-2">
                    <input id="email" name="email" type="email" autocomplete="email"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6"
                        value="{{ old('email') }}">
                </div>
            </div>
            <div>
                <div>
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">
                        Mot de passe
                    </label>
                </div>
                <x-forms.erreur champ="password" />
                <div class="mt-2">
                    <input id="password" name="password" type="password" autocomplete="current-password"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6">
                </div>
            </div>

            <div class="flex justify-center">
                <button type="submit"
                    class="w-full rounded-md bg-green-300 px-3 py-1.5 text-sm font-semibold leading-6 text-black shadow-sm hover:bg-black hover:text-white">
                    Connectez-vous!
                </button>
            </div>
        </form>
        <p class="mt-4 text-center text-sm text-gray-500">
            <a href="{{ route('enregistrement.create') }}" class="hover:text-indigo-600 text-base text-white">
                Pas un membre?
            </a>
        </p>
    </div>
</x-layout>
