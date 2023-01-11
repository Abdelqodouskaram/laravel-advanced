<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\DummyEmailNotification;

class UserController extends Controller
{
    public function send(DummyEmailNotification $dummy_email)
    {
        $user = User::first();
        $user->notify($dummy_email);
    }
}
