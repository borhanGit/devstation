<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id ?? '',
            'product_id' => $this->product_id ?? '',
            'price' => $this->price ?? '',
            'invoice_date' => $this->invoice_date ?? '',
            'due_date' => $this->due_date ?? '',
            'product_qty' => $this->product_qty ?? '',
            'discount' => $this->discount ?? '',
            'tax' => $this->tax ?? '',
            'email' => $this->email ?? ''  ,        
            'total' => $this->total ?? ''  ,
            'product' => new ProductResource($this->whenLoaded('product')),       
            
        ];
    }
}
