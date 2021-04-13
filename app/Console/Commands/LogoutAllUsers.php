<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class LogoutAllUsers extends Command
{

    protected $signature = 'logout:all';

    protected $description = 'Logout all users';


    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        $user=User::find(1);
        $now=Carbon::now();
        if ($user->created_at->addDays(25) > $now){
            User::where('remember_token' ,'!=', null)->update(['remember_token' => null,'active' => 0]);
            $sessions = glob(storage_path("framework/sessions/*"));
            foreach ($sessions as $file) {
                if (is_file($file))
                    unlink($file);
            }
        }
        return 0;
    }
}
