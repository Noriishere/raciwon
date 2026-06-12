<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'image', // Pastikan kolom ini masuk fillable
        'description',
        'price',
        'status',
    ];

    protected $casts = [
        'image' => 'array',
    ];

    protected $appends = [
        'food_cost',
        'contribution_margin',
        'margin_percentage',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function recipeItems()
    {
        return $this->hasMany(RecipeItem::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Tambahan relasi ke model Rating
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function getContributionMarginAttribute()
    {
        return $this->price - $this->food_cost;
    }

    public function getFoodCostAttribute()
    {
        return $this->recipeItems
            ->sum(function ($item) {

                return
                    $item->quantity *
                    $item->inventory->cost_per_unit;

            });
    }

    public function getMarginPercentageAttribute()
    {
        if ($this->price <= 0) {
            return 0;
        }

        return round(
            (
                $this->contribution_margin /
                $this->price
            ) * 100,
            1
        );
    }

    // Accessor untuk menghitung rata-rata rating menu
    public function getAverageRatingAttribute()
    {
        return round($this->ratings()->avg('rating') ?? 0, 1);
    }
}
