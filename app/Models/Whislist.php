<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whislist extends Model
{
    protected $fillable =[
        'category_ram', 'category_colors', 'category_bundles', 'category_ssd', 'category_types'
    ];
}
