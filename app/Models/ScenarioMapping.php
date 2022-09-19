<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScenarioMapping extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','hospital_id','scenarios_id','created_at','updated_at'
    ];
}
