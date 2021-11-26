<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorSchedule extends Model
{
    use HasFactory;
    protected $fillable = [            
        'schedule_date',
        'schedule_day',
        'start',
        'end',
        'doctor_id',
        'isDeleted'
    ];

    public function doctor(){
        return $this->belongToMany('App/Doctor');
    }
    
}
