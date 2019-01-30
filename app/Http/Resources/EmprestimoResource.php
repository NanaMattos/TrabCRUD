<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Emprestimo;

class EmprestimoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
        'status' => $this->status,
        'dataDeInicio' => $this->datadeInicio,
        'dataDeTermino' => $this->dataDeTermino,
    ];
    }
}
