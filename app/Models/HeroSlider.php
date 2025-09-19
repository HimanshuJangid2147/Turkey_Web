<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSlider extends Model
{
    use HasFactory;
    protected $table = 'hero_slider';

    protected $fillable = [
        'title',
        'description',
        'image',
        'link',
        'status',
    ];

    public $timestamps = false;

}
