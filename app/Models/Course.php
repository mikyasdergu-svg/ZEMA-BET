<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    // These are the only fields allowed to be saved in the database
    protected $fillable = [
        'title', 
        'instrument_type', 
        'description', 
        'user_id'
    ];

    /**
     * This links the 'user_id' in your courses table 
     * to the 'id' in your users table.
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * This allows one course to have many video lessons.
     */
    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class);
    }
}