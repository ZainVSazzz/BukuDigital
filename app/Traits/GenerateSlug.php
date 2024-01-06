<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait GenerateSlug
{
    public static function bootGenerateUniqueSlugTrait(): void
    {
        static::saving(function ($model) {
            $slug = $model->slug;
            $model->slug = $model->generateUniqueSlug($slug);
        });
    }

    public function generateUniqueSlug(string $slug): string
    {
        $existingSlugs = $this->getExistingSlugs($slug);
        if (!in_array($slug, $existingSlugs)) {
            return $slug;
        }

        while (true) {
            $newSlug = $slug . '-' . Str::random(5);
            if (!in_array($newSlug, $existingSlugs)) {
                return $newSlug;
            }
        }
    }

    private function getExistingSlugs(string $slug): array
    {
        return $this->newQuery()
            ->where('slug', 'LIKE', $slug . '%')
            ->where('id', '!=', $this->id ?? null) // Exclude the current model's ID
            ->pluck('slug')
            ->toArray();
    }
}
