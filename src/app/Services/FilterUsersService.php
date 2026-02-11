<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Jobs\SendNotifications;
use Illuminate\Http\Request;

class FilterUsersService
{
    public function filter(Request $request, $modelo)
    {
        $query = $modelo::query();

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }

        return $query->paginate(10)->appends($request->query());
    }
}

