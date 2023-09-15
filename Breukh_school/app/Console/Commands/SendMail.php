<?php

namespace App\Console\Commands;

use App\Models\Eleve;
use App\Models\Event;
use App\Notifications\EventNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'breukh:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'envoyer des emails de rappel';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Mail::mailer('smtp')->raw('Je vous invite', function ($message) {
        //     $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        //     $message->to('diopb8795@gmail.com');
        //     $message->subject('Jarrive d');
        //     });

        $event= Event::find(1);
        $eleve =  Eleve::find(1);
        // $acty=date("H:i:s");
        $eleve->notify(new EventNotification($event,$eleve->nom));
    }
}
