<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecipeItem extends Model
{
    protected $fillable = [
        'menu_id',
        'inventory_id',
        'quantity',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
}