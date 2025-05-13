<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MenuSections;

class MenuItems extends Model
{
    protected $table = 'menu_items';

    protected $primaryKey = 'itemID';
    
    protected $fillable = [
        'itemID',
        'menu_section_id',
        'name',
        'price',
        'image_path',
    ];

    protected $casts = [
        'itemID'=>'string',
        'menu_section_id' => 'string',
        'price'=>'double',
        'image_path'=> 'string',
    ];


    public function menuSection(){
        return $this->belongsTo(MenuSections::class, 'menu_section_id', 'menu_section_id');
    }
    
}
