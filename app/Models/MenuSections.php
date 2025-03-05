<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MenuItems;

class MenuSections extends Model

{
    protected $table = 'menu_sections';
    protected $primaryKey = 'menu_section_id';

    protected $fillable = [
        'menu_section_id',
        'name',
    ];

    protected $casts = [
        'menu_section_id' => 'string'
    ];

    public function menuItems()
    {
        return $this->hasMany(MenuItems::class, 'menu_section_id');
    }
}
