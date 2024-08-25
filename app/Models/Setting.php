<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{

    use HasFactory;
    protected $fillable = [
        'site_email',
        'site_phone',
        'site_address',
        'site_fax',
        'site_map',
        'site_facebook',
        'site_youtube'
    ];
}
