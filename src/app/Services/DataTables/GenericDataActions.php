<?php

namespace App\Services\DataTables;

use Illuminate\Support\Facades\View;

class GenericDataActions
{
    protected $editRouteName;
    protected $deleteRouteName;
    protected $componentView;
    protected $variableName;

    public function __construct(string $editRouteName,string $deleteRouteName,string $componentView,string $variableName = 'user') {
        $this->editRouteName = $editRouteName;
        $this->deleteRouteName = $deleteRouteName;
        $this->componentView = $componentView;
        $this->variableName = $variableName;
    }

    public function transform($model, string $locale): array
    {
        // Generar URLs traducidas y reemplazar el placeholder con el ID
        $editUrl = url("/$locale/" . trans($this->editRouteName, [], $locale));
        $editUrl = str_replace("{" . $this->variableName . "}", $model->id, $editUrl);

        $deleteUrl = url("/$locale/" . trans($this->deleteRouteName, [], $locale));
        $deleteUrl = str_replace("{" . $this->variableName . "}", $model->id, $deleteUrl);

        // Construir el array de datos para pasar a la vista
        $data = [
            'editUrl' => $editUrl,
            'deleteUrl' => $deleteUrl,
            $this->variableName => $model, // aquí se pasa dinámicamente
        ];

        // Renderizar el componente de acciones
        $actionsHtml = View::make($this->componentView, $data)->render();

        return [
            'name' => $model->name,
            'email' => $model->email,
            'actions' => $actionsHtml,
        ];
    }

    
}


