<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CateringMenu extends Model
{
    protected $table = 'catering_menu';

    protected $primaryKey = 'catering_menu_id';

    protected $fillable = [
        'catering_menu_id',
        'catering_menu_image',
    ];


    protected $casts = [
        'catering_menu_id'=>'string',
    ];
}
