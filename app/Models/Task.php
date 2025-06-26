<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // Allow these fields to be mass assignable
    protected $fillable = [
        'id',          // Needed if you're using updateOrCreate() with 'id'
        'title',
        'description',
        'status',
        'user_id',
    ];

    // Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }



}
