<?php

namespace App\Http\Controllers\Api\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminTokenController extends Controller
{
    public function issueToken(Request $request) {
        $admin = auth('admin')->user();

        // Generar un token personal de acceso
        $tokenResult = $admin->createToken('Admin Panel Token');

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
        ]);
    }
}


