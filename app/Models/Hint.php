<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hint extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];
    
    public function admin()
    {
        return $this->belongsTo(AdminUser::class);
    }

}
