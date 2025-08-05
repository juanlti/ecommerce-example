<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    protected $fillable = [
        'title',
        'description',
        'done'
    ];


    protected static function boot(): void
    {
        //el metodo boot() sirve para asignar de manera automatica la nueva tarea al usuario registrado en ese momento
        parent::boot();

        static::creating(function ($todo) {
            $todo->user_id = auth()->id();
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
