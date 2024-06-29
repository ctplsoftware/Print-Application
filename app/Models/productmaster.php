<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productmaster extends Model
{
    use HasFactory;
    protected $table = 'product_master';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = [];

    public function usernamedata()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public function upadtedusernamedata()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function usernameapprove()
    {
        return $this->belongsTo(User::class, 'approved_by', 'id');
    }

}
