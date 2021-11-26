<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [     
    'id',       
    'name',
    'tele_phone_no',
    'email',
    'speciality',
    'room_no',
    'status',    
    'isDeleted'
];




}
