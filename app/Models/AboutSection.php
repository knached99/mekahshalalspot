<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    protected $table = 'about_section';

    protected $primaryKey = 'about_section_id';

    protected $fillable = [
        'about_section_id',
        'section_title',
        'section_content',
    ];

    protected $casts = [
        'about_section_id'=> 'string'
    ];
}
