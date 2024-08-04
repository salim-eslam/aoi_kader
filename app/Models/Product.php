<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name', 'description', 'material'  , 'seo_description',
    'seo_keywords'];

    protected $fillable = [
        'code',
        'name',
        'description',
        'image',
        'length',
        'height',
        'width',
        'material',
        'offerd',
        'offer_price',
        'status',
        'department_id',
        'stocked',
        'seo_description',
        'seo_Keywords',
        'views'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function photos()
    {
        return $this->morphMany(Photo::class, 'photoable');
    }
    public function scopeOfferd($query)
    {
        return $query->where('offerd',true);
    }
    public function scopeStocked($query)
    {
        return $query->where('stocked',true);
    }
    public function scopeActive($query)
    {
        return $query->where('status','active');
    }
}
