<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Hospitals extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'hospital_name','user_id','hospital_phone','hospital_email','hospital_address','hospital_small_logo', 'hospital_hi_rest_logo', 'primary_color',
        'secondary_color','deleted_at','created_at','updated_at',
    ];
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
