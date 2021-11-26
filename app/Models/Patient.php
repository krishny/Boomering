<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [            
        'name',
        'tele_phone_no',
        'email',
        'date_of_birth',
       // 'doctor_id',
        'status',
        'isDeleted'
    ];

  /*  public function doctor(){
        return $this->belongToMany('App/Doctor');
    }

    public function doctors(){
        return $this->hasMany('App/Doctor');
    }
   */ 
}
