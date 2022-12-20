<?php

namespace App\Models;

use Attribute;
use App\Models\User;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected $with = ['education', 'certificate', 'feedback'];

    public function scopeFilter($query, array $filter)
    {
        $query->when(
            $filter['daerah'] ?? false,
            fn ($query, $daerah) => $query->whereHas('user', function ($query) use ($daerah) {
                $query->whereHas('location', function($query) use($daerah) {
                    $query->where('name', $daerah);
                });
            })
        )->when(
            $filter['category'] ?? false,
            fn ($query, $category) => $query->whereHas('category', function ($query) use ($category) {
                $query->where('name', $category);
            })
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function education()
    {
        return $this->hasMany(Education::class);
    }

    public function certificate()
    {
        return $this->hasMany(Certificate::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }

    public static function getRate($t)
    {
        $jumlah = 0;
        foreach ($t->feedback as $f) {
            $jumlah += $f->rate;
        }

        if ($jumlah == 0)
            return 0;
        else
            return $jumlah / count($t->feedback);
    }
}
