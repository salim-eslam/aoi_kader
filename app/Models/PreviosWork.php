<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class PreviosWork extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['title','description','body',  'seo_description','seo_keywords'];
    protected $fillable=['title','description','body','image','status' , 'seo_description',
    'seo_keywords','views'];
    public function photos()
    {
        return $this->morphMany(Photo::class,'photoable');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function scopeActive($query)
    {
        return $query->where('status','active');
    }
    public function comments_show()
    {
        return $this->hasMany(Comment::class)->where('status','active');
    }
}
