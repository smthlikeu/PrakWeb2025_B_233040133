<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Post extends Model
{
    use HasFactory;

    // Kolom yang dilindungi dari mass assignment
    protected $guarded = ['id'];

    // Eager loading relasi dengan Category dan User secara default
    protected $with = ['author', 'category'];

    // Relasi many-to-one dengan model Category
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi many-to-one dengan model User
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Scope untuk filter berdasarkan kategori
    public function scopeFilter(Builder $query, array $filters): void
    {
        // Filter berdasarkan judul
        $query->when(
            $filters['search'] ?? false,
            fn (Builder $query, $search) =>
                $query->where(fn (Builder $query) =>
                    $query->where('title', 'like', '%' . $search . '%')
                          ->orWhere('body', 'like', '%' . $search . '%')
                )
        );

        // Filter berdasarkan kategori
        $query->when(
            $filters['category'] ?? false,
            fn (Builder $query, $category) =>
                $query->whereHas('category', fn (Builder $query) =>
                    $query->where('slug', $category)
                )
        );

        // Filter berdasarkan author
        $query->when(
            $filters['author'] ?? false,
            fn (Builder $query, $author) =>
                $query->whereHas('author', fn (Builder $query) =>
                    $query->where('username', $author)
                )
        );
    }


}
