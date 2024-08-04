<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Comment extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name', 'role', 'comment'];
    protected $fillable=['name', 'role', 'comment','status','previos_work_id'];

}
