@props(["cle"])

@if (session($cle))
<p @class([
    "absolute top-4 left-4 rounded-md p-2",
    "bg-green-300 text-green-900" => $cle == "succes",
    "bg-red-200 text-red-600" => $cle == "erreur"
])>
    {{ session($cle) }}
</p>
@endif
