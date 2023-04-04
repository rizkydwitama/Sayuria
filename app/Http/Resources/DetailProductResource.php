<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nama_sayur' => $this->nama_sayur,
            'deskripsi' => $this->deskripsi,
            'harga_sayur' => $this->harga_sayur,
            'stock' => $this->stock,
            'gambar' => $this->gambar
        ];
    }
}
