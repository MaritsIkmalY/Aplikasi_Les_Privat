<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;

class Teacher extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected $with = ['education', 'certificate'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function education() {
        return $this->hasMany(Education::class);
    }

    public function certificate() {
        return $this->hasMany(Certificate::class);
    }
}
