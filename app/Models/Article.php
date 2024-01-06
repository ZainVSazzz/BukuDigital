<?php

namespace App\Models;

use App\Traits\GenerateSlug;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class Article extends Model
{
    use HasFactory, HasTrixRichText, GenerateSlug;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function imageUrl(): Attribute
    {
        return Attribute::get(function () {
            if (Str::startsWith($this->image, 'http')) {
                return $this->image;
            }

            return Storage::url($this->image);
        });
    }
}
