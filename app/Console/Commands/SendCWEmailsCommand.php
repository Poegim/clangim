<?php

namespace App\Console\Commands;

use App\Mail\ClanWarEmail;
use App\Models\ClanWars\ClanWar;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendCWEmailsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clanwars:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends e-mail to players about incoming Clan Wars.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $clanWars = ClanWar::where('date', '>', now())->where('date', '<', now()->addHour())->get();
        $users = User::where('role', '<=', User::INACTIVE)->where('role', '>', User::ADMIN)->get();

        foreach($clanWars as $clanWar)
        {
            foreach($users as $user)
            {
                $this->info($clanWar->id.' '.$user->name);

                Mail::to($user->email)
                    ->send((new ClanWarEmail($clanWar, $user))
                    ->subject(env('APP_NAME').' - Incoming Clan War!.')
                );

                //Local env requirement due to mailtrap limits.
                if(env('MAIL_HOST', false) == 'smtp.mailtrap.io'){
                    $this->info($user->name);
                    sleep(1);
                }
            }
        }

        return Command::SUCCESS;
    }
}
