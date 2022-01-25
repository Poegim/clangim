<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\ClanWars\ClanWar;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ClanWarEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $clanWar;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ClanWar $clanWar, User $user)
    {
        $this->clanWar = $clanWar;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.clan-war-email', [
            'clanWar' => $this->clanWar,
            'user' => $this->user,
        ]);
    }
}
