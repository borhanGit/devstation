<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'price',
        'invoice_date',
        'due_date',
        'product_qty',
        'discount',
        'tax',
        'email',
        'total'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
