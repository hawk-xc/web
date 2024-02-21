<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    // protected $guarded = 'id';
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'body',
        'excerpt',
        'image'
    ];

    protected $with = ['category', 'user'];

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id');
    }

    public function User()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function scopeCari($query, array $data)
    {
        $query->when(
            $data['search'] ?? false,
            fn ($query, $search) =>
            $query->where('title', 'like', '%' . $search . '%')->orWhere('excerpt', 'like', '%' . $search . '%')->orWhere('body', 'like', '%' . $search . '%')
        );

        // $query->when($data['search'] ?? false, function ($query, $search) {
        //     return $query->where(function ($query) use ($search) {
        //         $query->where('title', 'like', '%' . $search . '%')
        //             ->orWhere('body', 'like', '%' . $search . '%');
        //     });
        // });

        $query->when(
            $data['category'] ?? false,
            fn ($query, $category) =>
            $query->whereHas(
                'Category',
                fn ($query) =>
                $query->where('name', $category)
            )
        );

        $query->when(
            $data['author'] ?? false,
            fn ($query, $author) =>
            $query->whereHas(
                'User',
                fn ($query) =>
                $query->where('username', $author)
            )
        );

        // return $query->latest();
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
