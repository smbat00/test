<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'created_by',
        'assigned_to',
        'status',
        'description',
    ];

    public function assigned_to_developer()
    {
        return $this->hasOne(User::class, 'id', 'assigned_to');
    }

}
