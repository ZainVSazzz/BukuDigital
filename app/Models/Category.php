<?php

namespace App\Models;

use App\Traits\GenerateSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory, GenerateSlug;

    protected $guarded = [];

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
