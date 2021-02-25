<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Cms\Traits\Attribute;

class Cms extends Model
{
    use SoftDeletes,Attribute;

    protected $table = 'cms_pages';

    protected $fillable = [
        'id',
        'slug',
        'title',
        'description',
    ];
}
