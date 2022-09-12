<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Scenario;

class Department extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'name','user_id','path','file_name','deleted_at','created_at', 'updated_at', 
    ];
   
}
