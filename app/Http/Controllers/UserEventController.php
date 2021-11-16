<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\UserCreate;

class UserEventController extends Controller
{
    public function index()
    {
        event(new UserCreate('Your account has been send'));
    }
}
