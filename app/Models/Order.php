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
                $status_study = true;
            } else if ($filter['status'] == "pending") {
                $boolean = null;
                $status_study = false;
            } else if ($filter['status'] == "reject") {
                $boolean = false;
                $status_study = true;
            } else if ($filter['status'] == "ongoing") {
                $boolean = true;
                $status_study = false;
            }
        }

        $query->when(
            $filter['status'] ?? false,
            fn ($query) => $query->where('status_order', $boolean)->where('status_study', $status_study)
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
