<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriminalOffence extends Model
{
    use HasFactory;
    protected $fillable =['criminal_id','offence_category_id'];
    protected $hidden = ['created_at','updated_at','criminal_id','id'];

    public function offence()
    {
        return $this->belongsTo(OffenceCategory::class, 'id');
    }
}
