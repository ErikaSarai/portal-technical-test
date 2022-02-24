<?php

namespace App\Console\Commands;

use App\Mail\SendMailable;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Carbon\Carbon;

class RegisteredUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'registered:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enviar un correo con el número de usuarios registrados';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::all();
        $totalUsers = $users->where('created_at', '>', Carbon::now()->subHours(24))->count();

        foreach ($users as $key => $user) {
            Mail::to($user->email)->send(new SendMailable($totalUsers));
        }
    }
}
