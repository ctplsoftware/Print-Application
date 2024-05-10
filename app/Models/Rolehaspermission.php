<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rolehaspermission extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'role_has_permission';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
}
