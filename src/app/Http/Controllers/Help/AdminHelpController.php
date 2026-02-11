<?php

namespace App\Http\Controllers\Help;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminHelpController extends Controller
{
    public function indexHelpAdmin()
    {
        return view('help.admin.intro');
    }

    public function usersHelpAdmin()
    {
        return view('help.admin.users');
    }

    public function ticketsHelpAdmin()
    {
        return view('help.admin.tickets');
    }

    public function notificationsHelpAdmin()
    {
        return view('help.admin.notifications');
    }

    public function eventsHelpAdmin()
    {
        return view('help.admin.events');
    }

}
