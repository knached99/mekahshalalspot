<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DealsSection extends Model
{
    protected $table = 'deals_section';

    protected $primaryKey = 'deal_id';

    protected $fillable = [
        'deal_id',
        'deal_title',
        'deal_content',
        'deal_price',
        'deal_image',
    ];


    protected $casts = [
        'deal_id'=>'string',
    ];
}
