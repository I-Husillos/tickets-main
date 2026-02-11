<?php
namespace App\Services;

use App\Models\Type;
use App\Models\EventHistory;
use Illuminate\Support\Facades\Auth;

class TypeService
{
    public function createType(array $data) {
        Type::create($data);

        EventHistory::create([
            'event_type' => 'Registro',
            'description' => 'Nuevo tipo de ticket creado',
            'user' => Auth::guard('admin')->user()->name,
        ]);
    }

    public function updateType(Type $type, array $data) {
        $data['name'] = ucfirst(strtolower($data['name']));
        $type->update($data);
    }

    public function deleteType(Type $type) {
        $type->delete();
    }
}