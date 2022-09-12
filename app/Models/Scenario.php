<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Department;

class Scenario extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'user_id','sce_id','department_id','name','path','file_name','deleted_at','created_at','updated_at',
    ];
   
}
