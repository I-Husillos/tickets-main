<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Contadores de tickets
        $openTickets = Ticket::where('user_id', $user->id)->where('status', 'new')->count();
        $resolvedTickets = Ticket::where('user_id', $user->id)->where('status', 'resolved')->count();
        $pendingTickets = Ticket::where('user_id', $user->id)->where('status', 'pending')->count();

        // Últimos tickets modificados (ordenados por fecha de actualización)
        $latestTickets = Ticket::where('user_id', $user->id)
                                ->orderBy('updated_at', 'desc')
                                ->take(5)
                                ->get();

        return view('user.dashboard', compact('openTickets', 'resolvedTickets', 'pendingTickets', 'latestTickets'));
    }
}
