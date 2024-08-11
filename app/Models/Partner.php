<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Partner extends Model
{
    use HasTranslations;
    public $translatable = ['title'];
    protected $fillable = ['title', 'image'];
    use HasFactory;
}
