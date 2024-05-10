<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabelDesign extends Model
{
    use HasFactory;
    protected $table = 'label_design';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];

    public function usernamedata()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function usernameapprove()
    {
 return $this->belongsTo(User::class, 'approve_rejected_by', 'id');
    }
}
