<x-layout titre="Enregistrement">
    <div class="w-full md:w-1/2 lg:w-1/3 p-6 rounded-lg bg-gray-900 bg-opacity-80 text-center animate-slideInFromRight">
        <div class="space-y-6 bg-white bg-opacity-30 p-6 rounded-lg shadow-md">
            <h1 class="text-3xl font-semibold text-center mb-4">Enregistrez-vous</h1>

            <form class="space-y-6" action="{{ route('enregistrement.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="flex space-x-6">
                    <div class="w-1/2">
                        <label for="prenom" class="block text-sm font-medium text-white">Prénom</label>
                        <input id="prenom" name="prenom" type="text" autocomplete="given-name" autofocus value="{{ old('prenom') }}" class="py-1.5 placeholder:text-gray-400 block w-full rounded-md">
                        <x-forms.erreur champ="prenom" />
                    </div>

                    <div class="w-1/2">
                        <label for="nom" class="block text-sm font-medium text-white">Nom</label>
                        <input id="nom" name="nom" type="text" value="{{ old('nom') }}" autocomplete="family-name" class="py-1.5 placeholder:text-gray-400 block w-full rounded-md">
                        <x-forms.erreur champ="nom" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="block text-sm font-medium text-white">Courriel</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" class="py-1.5 placeholder:text-gray-400 block w-full rounded-md">
                    <x-forms.erreur champ="email" />
                </div>

                <div class="flex space-x-6">
                    <div class="w-1/2">
                        <label for="password" class="block text-sm font-medium text-white">Mot de passe</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" class="py-1.5 placeholder:text-gray-400 block w-full rounded-md">
                        <x-forms.erreur champ="password" />
                    </div>

                    <div class="w-1/2">
                        <label for="confirm-password" class="block text-sm font-medium text-white">Confirmation du mot de passe</label>
                        <input id="confirm-password" name="confirmation_password" type="password" class="py-1.5 placeholder:text-gray-400 block w-full rounded-md">
                        <x-forms.erreur champ="confirmation_password" />
                    </div>
                </div>

                <div class="text-center">
                    <label for="avatar" class="block text-sm font-medium text-white">Avatar (facultatif)</label>
                    <input id="avatar" name="avatar" type="file" class="py-1.5 placeholder:text-gray-400 mx-auto block w-2/3">
                    <x-forms.erreur champ="avatar" />
                </div>

                <div class="form-group">
                    <button type="submit" class=" w-full rounded-md bg-green-300 text-black px-3 py-1.5 text-sm font-semibold leading-6 shadow-sm hover:bg-black hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Créez votre compte!
                    </button>
                </div>
            </form>
        </div>
         <a  class="text-white mt-2 block hover:text-indigo-600"  href="{{ route('accueil')}}">Vous avez changé(e) d'avis?</a>
    </div>







</x-layout>
