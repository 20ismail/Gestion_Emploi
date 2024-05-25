<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\DatabaseMessage;
use App\Models\Professeur;

class NewProfesseurNotification extends Notification
{
    use Queueable;

    protected $professeur;

    public function __construct(Professeur $professeur)
    {
        $this->professeur = $professeur;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'professeur_name' => $this->professeur->nom,
            'admin_name' => $this->professeur->admin->nom,
            'departement_name' => $this->professeur->departement->intitule,
            'message' => 'A new professor has been added: ' . $this->professeur->nom
        ];
    }
}
