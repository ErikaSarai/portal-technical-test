<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMailable;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function sendEmails()
    {
        $users = User::all();
        $totalUsers = $users->where('created_at', '>', Carbon::now()->subHours(24))->count();

        foreach ($users as $key => $user) {
            Mail::to($user->email)->send(new SendMailable($totalUsers));
        }

        return 'send emails';
    }
}
