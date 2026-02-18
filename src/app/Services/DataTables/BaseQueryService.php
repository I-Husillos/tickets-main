<?php

namespace App\Services\DataTables;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class BaseQueryService
{
    /**
     * Define los campos ordenables y sus mapeamentos
     * 
     * @return array
     * Ejemplo: [
     *     'name' => 'name',
     *     'email' => 'email',
     *     'assigned_to' => ['join' => ['admins', 'tickets.admin_id', '=', 'admins.id'], 'field' => 'admins.name']
     * ]
     */
    abstract protected function getSortableFields(): array;

    /**
     * Define la columna de búsqueda por defecto cuando no se especifica orden
     * 
     * @return string
     */
    protected function getDefaultOrderField(): string
    {
        return 'created_at';
    }

    /**
     * Define la dirección de orden por defecto
     * 
     * @return string
     */
    protected function getDefaultOrderDirection(): string
    {
        return 'desc';
    }

    /**
     * Aplica el ordenamiento a la query basada en los parámetros de la request
     * 
     * @param mixed $query (Builder o Relation)
     * @param Request $request
     * @return mixed
     */
    protected function applyOrdering(mixed $query, Request $request): mixed
    {
        if ($request->has('order') && isset($request->input('order')[0])) {
            $order = $request->input('order');
            $columnIdx = $order[0]['column'];
            $dir = $order[0]['dir'];
            $columnName = $request->input("columns.$columnIdx.data");

            $sortableFields = $this->getSortableFields();

            if (isset($sortableFields[$columnName])) {
                $fieldConfig = $sortableFields[$columnName];

                // Si tiene configuración de join
                if (is_array($fieldConfig) && isset($fieldConfig['join'])) {
                    [$table, $first, $operator, $second] = $fieldConfig['join'];
                    $query->leftJoin($table, $first, $operator, $second);
                    $query->orderBy($fieldConfig['field'], $dir);
                } else {
                    // Campo simple
                    $query->orderBy($fieldConfig, $dir);
                }
            } else {
                // Campo no permitido, usar default
                $query->orderBy($this->getDefaultOrderField(), $this->getDefaultOrderDirection());
            }
        } else {
            // Sin parámetro de orden, usar default
            $query->orderBy($this->getDefaultOrderField(), $this->getDefaultOrderDirection());
        }

        return $query;
    }
}
