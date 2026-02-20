<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminKanbanController extends Controller
{
    private const STATUSES = ['new', 'in_progress', 'pending', 'resolved', 'closed'];

    private const STATUS_COLORS = [
        'new'         => 'primary',
        'in_progress' => 'warning',
        'pending'     => 'secondary',
        'resolved'    => 'success',
        'closed'      => 'danger',
    ];

    private const PRIORITY_COLORS = [
        'low'      => 'success',
        'medium'   => 'info',
        'high'     => 'warning',
        'critical' => 'danger',
    ];

    public function index()
    {
        return redirect()->route('admin.manage.tickets', ['locale' => app()->getLocale()]);
    }

    public function updateStatus(string $locale, Request $request, Ticket $ticket)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,in_progress,pending,resolved,closed',
        ]);

        $admin = Auth::guard('admin')->user();

        // Only allow if superadmin or assigned/creator admin
        if (!$admin->superadmin
            && $ticket->admin_id !== $admin->id
            && $ticket->created_by_admin_id !== $admin->id
        ) {
            abort(403);
        }

        $ticket->status = $validated['status'];

        if ($validated['status'] === 'resolved') {
            $ticket->resolved_at = now();
        } elseif (in_array($validated['status'], ['new', 'pending'])) {
            $ticket->resolved_at = null;
        }

        $ticket->save();

        return response()->json(['ok' => true]);
    }
}
