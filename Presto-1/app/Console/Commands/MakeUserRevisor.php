<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;
use App\Models\User;

class MakeUserRevisor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-user-revisor {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description ='Make user revisor';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::where('email', $this->argument('email'))->first();
        if(!$user) {
            $this->error('User not found');
            return;
        }

        $user->is_revisor = true;
        $user->save();
        $this->info("{$user->name}");
    }
}
