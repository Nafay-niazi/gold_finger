<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customerMeasurement extends Model
{
    use HasFactory;

    protected $fillable = [
                'dress_length',
                'dress_teera',
                'dress_teera_style',
                'dress_bazoo',
                'dress_galla',
                'dress_galla_style',
                'dress_kandha',
                'dress_kohni',
                'dress_chaati',
                'dress_darmean',
                'dress_kamar',
                'dress_hip',
                'dress_shalwar_trouser',
                'dress_pancha',
                'dress_shalwar_ghaira',
                'dress_thai',
                'dress_godda',
                'customer_id',
    ];
}
