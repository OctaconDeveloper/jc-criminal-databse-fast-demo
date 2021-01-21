<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriminalPhoto extends Model
{
    use HasFactory;
    protected $fillable = ['image_path','image_id','criminal_id'];
    protected $hidden = ['created_at','updated_at','criminal_id','id'];
}
