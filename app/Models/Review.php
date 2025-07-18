<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Review extends Model
{
    /** @use HasFactory<\Database\Factories\ReviewFactory> */
    use HasFactory;

    protected $guarded = [];

    public function definition(): array
    {
        return [
            'comment' => $this->faker->paragraph(),
        ];
    }


    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

}
