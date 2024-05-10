<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class configuration extends Model
{
    use HasFactory;
    protected $table = 'configuration';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = [];
   
}
