<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [            
        'doctor_id',
        'patient_id',
        'appointment_date',
        'appointment_time',
        'appointment_day',
        'room_no',
        'note',
        'status',
        'isDeleted'
    ];

    public function doctor(){
        return $this->belongTo('App/Doctor');
    }
    public function patient(){
        return $this->belongTo('App/Patient');
    }
}

