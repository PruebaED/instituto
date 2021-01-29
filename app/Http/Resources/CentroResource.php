<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class CentroResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        // Esto no es necesario para que funcione el gates.

        $user = Auth::user();

        $datos = array (
            'id' => $this->id,
            'nombre' => $this->nombre
        );

        if ($user->id ==1) {

            $datos['web'] = $this->web;

        }

        return $datos;

        // return parent::toArray($request);

    }
}
