<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
