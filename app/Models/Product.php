<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    public $timestamps = false;

    public function productContents() {
        return $this->hasMany(ProductContents::class);
    }

    public function calculateFinalPrice(int $percent) : float {

        return $this->price + ($this->price * $percent / 100);
    }
}
