<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class AdminTagController extends Controller
{
    /**
     * AJAX endpoint for Select2 autocomplete.
     * GET /admin/tags/search?q=texto
     */
    public function search(Request $request)
    {
        $q = $request->get('q', '');

        $tags = Tag::where('name', 'like', '%' . $q . '%')
            ->select('id', 'name as text')
            ->limit(30)
            ->get();

        return response()->json($tags);
    }
}
