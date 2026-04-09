<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

// Use a poner
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Mail;
use App\Mail\AlertaLoginCorreo;

class EnviarCorreo
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        // Recibir la información del usuario
        $user = $event->user;

        // Enviar el correo con la informacion del usuario
        Mail::to($user->mail)->send(new AlertaLoginCorreo($user));
    }
}
