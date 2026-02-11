<?php

namespace App\Http\Controllers\Help;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserHelpController extends Controller
{
    public function indexHelpUser()
    {
        return view('help.user.intro');
    }

    public function ticketsHelpUser()
    {
        return view('help.user.tickets');
    }

    public function notificationsHelpUser()
    {
        return view('help.user.notifications');
    }

    public function profileHelpUser()
    {
        return view('help.user.profile');
    }

    public function faqHelpUser()
    {
        return view('help.user.faq');
    }


}
