<?php

namespace App\Mail;

use App\Invitacion;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvitacionCursoASM extends Mailable
{
    use Queueable, SerializesModels;

    public $invitacion;
    public $documento;
    public $curso_id;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Invitacion $invitacion,$nameDoc,$curso_id)
    {
        $this->invitacion = $invitacion;
        $this->documento = $nameDoc;
        $this->curso_id = $curso_id;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('mails.invitacionView');
        $this->documento;
        $this->subject("Invitacion a Curso de ASM");
        return $this->view('mails.invitacionView')
        ->with([])
        ->attach(public_path('invitaciones\\'.$this->documento));
    }
}
