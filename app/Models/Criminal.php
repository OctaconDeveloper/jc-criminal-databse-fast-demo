<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criminal extends Model
{
    use HasFactory;
    protected $hidden = ['created_at','updated_at','id','height','email','complexion'];
    protected $fillable = [ 
        "tag_number",
        "last_name",
        "other_names",
        "sex",
        "phone_number",
        "date_of_birth",
        "lga_of_origin",
        "state_of_origin",
        "address"
    ];

    public function offences()
    {
        return $this->hasMany(CriminalOffence::class);
    }

    public function photo()
    {
        return $this->belongsTo(CriminalPhoto::class, 'id');
    }
}
