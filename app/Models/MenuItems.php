<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MenuSections;

class MenuItems extends Model
{
    protected $table = 'menu_items';

    protected $fillable = [

        'menu_section_id',
        'name',
        'price',
        'image_path',
    ];

    protected $casts = [
        'menu_section_id' => 'string',
        'price'=>'double',
        'image_path'=> 'string',
    ];


    public function menuSection(){
        return $this->belongsTo(MenuSection::class, 'menu_section_id', 'menu_section_id');
    }
}
