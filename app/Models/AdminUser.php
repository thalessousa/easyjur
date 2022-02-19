<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];

    protected $hidden = ['password','remenber_token'];

    public function hints()
    {
        return $this->hasMany(Hint::class);
    }
}
