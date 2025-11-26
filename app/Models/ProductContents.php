<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductContents extends Model
{
    use HasFactory;
    protected $table = 'product_contents';
    public $timestamps = false;


    public function product() {
        return $this->belongsTo(Product::class);
    }
}
