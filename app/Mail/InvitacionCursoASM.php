<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvitacionCursoASM extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('mails.invitacionView');
        $this->subject('Correo de notificación de Invitación');
        return $this->view('mails.invitacionView')
        ->with(['Invitación del Curso'])
        ->attach(public_path('invitaciones\\'.'BoletosImprimir.pdf'));
    }
}
