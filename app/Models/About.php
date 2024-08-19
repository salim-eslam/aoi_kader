<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class About extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['title','body'];

    protected $fillable = [
        'image',
        'title',
        'status',
        'body'
    ];
    public function scopeActive($query)
    {
        return $query->where('status','active');
    }
}
