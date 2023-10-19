@props(["champ"])

@error($champ)
    <p class="text-base mt-2 text-orange-500 italic m-auto">{{ $message }}</p>
@enderror
