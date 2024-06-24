<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'name', 'semester', 'description', 'credit', 'status', 'course_id', 'batch_year'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
