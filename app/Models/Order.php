<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;
use App\Models\Student;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filter)
    {
        if (isset($filter['status'])) {
            if ($filter['status'] == "done") {
                $boolean = true;
            } else if ($filter['status'] == "pending") {
                $boolean = null;
            } else if ($filter['status'] == "reject") {
                $boolean = false;
            }
        }

        $query->when(
            $filter['status'] ?? false,
            fn ($query) => $query->where('status_order', $boolean)
        );
    }


    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
