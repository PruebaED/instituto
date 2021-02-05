<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GrupoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'curso' => $this->curso,
            'letra' => $this->letra,
            'nombre' => $this->nombre,
            'nivel' => $this->nivelEstudios ? $this->nivelEstudios : 'Sin nivel de estudios', // Se usa como propiedad dinámica, en lugar de como método nivelEstudios().
        ];
    }
}
