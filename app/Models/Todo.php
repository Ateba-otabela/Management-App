<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Todo extends Model
{
        /** @use HasFactory<\Database\Factories\UserFactory> */
        use HasFactory, Notifiable;

        /**
         * The attributes that are mass assignable.
         *
         * @var list<string>
         */
        protected $fillable = [
            'title',
            'date',
            'time',
            'assigned_to',
            'assigned_by'
           
        ];
     // In the Todo model
public function assignedBy()
{
    return $this->belongsTo(User::class, 'assigned_by'); // relationship with the user who assigned the task
}

public function assignedTo() 
{
    return $this->belongsTo(User::class, 'assigned_to'); // relationship with the user to whom the task is assigned
}

}
