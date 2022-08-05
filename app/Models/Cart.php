<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nette\SmartObject;

class Cart extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'client_id',
        'product_id',
        'count',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }
}
