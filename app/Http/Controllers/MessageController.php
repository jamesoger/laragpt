<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Affiche la liste des messages
     *
     * @return View
     */
    public function index()
{

    return view('messages.index', [

        'message_tri'=> Message::where('user_id', auth()->user()->id)
        ->orderBy('created_at', 'desc')
        ->get(),
    ]);
}
    /**
     * Traitement des messages
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        /**
         * @todo Valider la question
         */
        $valides = $request->validate([
            "question" => "required|string|min:6|max:150"
        ], [
            "question.required" => "Il n'y a aucun message à envoyer",
            "question.string" => "il faut entrer du texte",
            "question.min" => "Il faut un minimum de :min caractères",
            "question.max" => "Il y'a trop de lettres, :max caractères maximum"
        ]);

        /**
         *  Sauvegarder la question reçue dans une variable $question
         */
        $question = $valides["question"];

        /**
         *  Lire le fichier json et le décoder
         *
         *
         */
        $phrases = json_decode(file_get_contents('../storage/app/data/phrases.json'), true);

        /**
         * Trouver la réponse appropriée ou une réponse par défaut
         *
         */
        $reponse = null;

        foreach ($phrases as $keyword => $phrase) {
            if (mb_stripos($question, $keyword) !== false) {
                $reponse = $phrase;
                break;
            }
        }
        /**
         * Mettre une réponse par défaut quand le mot n'est pas dans le phrases.json
         */
        if ($reponse === null) {
            $reponse = "Désolé, Je ne sais pas quoi répondre...";
        }

        /**
         *  Remplacer les informations entre [crochet] dans $reponse, s'il y a lieu
         */
        $reponse = str_replace('[nom]', auth()->user()->prenom, $reponse);
        $reponse = str_replace('[heure]', now()->format('H:i'), $reponse);

        /**
         * Créer un objet du modèle
         */
        $message = new Message;
        $message->question = $question;
        $message->user_id = auth()->user()->id;
        $message->reponse = $reponse;
        $message->save();

        /**
         *  Redirection
         */
        return redirect()->route('messages.index');
    }

}
