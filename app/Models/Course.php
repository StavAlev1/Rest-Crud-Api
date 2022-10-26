<?php

namespace App\Models;

use App\Scopes\IsPremiumScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'status',
        'is_premium',
    ];

    protected $casts = [
        'is_premium' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
 
        static::addGlobalScope(new IsPremiumScope);
    }

    public function formatData()
    {
        return $this->map(function ($course) {
            return [
                'id' => $course->id,
                'title' => $course->title,
                'description' => $course->description,
                'status' => $course->status,
                'premium' => $course->is_premium,
                'created_at' => Carbon::parse($course->created_at)->toDateTimeString(),
                'updated_at' => Carbon::parse($course->updated_at)->toDateTimeString(),
                'deleted_at' => isset($course->deleted_at) ? Carbon::parse($course->deleted_at)->toDateTimeString() : null,
            ];
        });
    }
}
