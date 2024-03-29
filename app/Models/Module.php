<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use SDamian\Larasort\AutoSortable;

class Module extends Model
{
    use HasFactory,AutoSortable,SoftDeletes;

    protected $fillable = [
        'module_number',
        'subject_id',
    ];

    private array $sortables = [
        'id',
        'module_number',
        'subject_id',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function lecturers()
    {
        return $this->belongsToMany(User::class,'module_lecturer');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class,'module_course');
    }
}
