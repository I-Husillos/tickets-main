<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function showManageDashboard()
    {
        // total de usuario y de administrador en totalUsers
        $totalUsers = \App\Models\User::count() + \App\Models\Admin::count();
        $totalAdmins = \App\Models\Admin::count();
        $totalTickets = \App\Models\Ticket::count();
        $totalAssignedTickets = Ticket::whereNotNull('admin_id')->count();
        $pendingTickets = \App\Models\Ticket::where('status', 'pending')->count();
        $resolvedTickets = \App\Models\Ticket::where('status', 'resolved')->count();

        $recentEvents = \App\Models\EventHistory::latest()->take(5)->get();

        $recentNotifications = Auth::guard('admin')->user()->unreadNotifications->take(5);

        $admin = Auth::guard('admin')->user();
        $isSuperAdmin = $admin->superadmin;

        $assignedTickets = Ticket::where('admin_id', $admin->id);

        return view('admin.management.managedashboard', compact(
            'totalUsers', 'totalAdmins', 'totalTickets', 'totalAssignedTickets', 'pendingTickets', 'resolvedTickets', 'recentEvents', 'recentNotifications', 'isSuperAdmin', 'assignedTickets'
            ,'assignedTickets'
        ));
    }

    public function showAddDashboard()
    {
        return view('admin.management.adddashboard');
    }
}
