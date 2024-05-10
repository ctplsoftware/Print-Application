<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;
    protected $table = 'product_type_master';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
}
