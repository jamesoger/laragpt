<x-layout>
    <x-alertes.message cle="succes" />
    <div class=" flex justify-center items-center min-h-screen fade-in">
        <div class="w-full md:w-1/2 lg:w-1/3 p-6 rounded-lg bg-white text-center">
            <h1 class="text-4xl font-bold mb-4 text-gray-800">Bienvenue sur <strong>LaraGPT</strong> </h1>
            <p class="text-gray-700">Salut là ! Je suis LaraGPT, votre compagnon virtuel. Prêt à discuter, répondre à vos curiosités et à partager des idées. Laissez-moi savoir comment je peux vous assister aujourd'hui !</p>
            <div class="mt-8 space-y-4">
                <a href="{{ route('connexion.create')}}" class="block py-2 px-4 bg-black text-white rounded-lg hover:bg-green-300 hover:text-black transition duration-300 ease-in-out">
                    Essayez-moi!
                </a>
                <p class="text-gray-700">Pas de compte?</p>
                <a href="{{ route('enregistrement.create')}}" class="block py-2 px-4 bg-green-300 text-black rounded-lg hover:bg-black hover:text-white transition duration-300 ease-in-out">
                    Enregistrez-vous
                </a>
            </div>
        </div>
    </div>


</x-layout>
