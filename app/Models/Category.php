<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'icon',
        'name',
        'description',
    ];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
