<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'pay_method_id',
        'date',
        'status_id',
        'review',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function pay_method()
    {
        return $this->belongsTo(PayMethod::class);
    }
}
