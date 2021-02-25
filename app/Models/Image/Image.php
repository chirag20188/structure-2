<?php

namespace App\Models\Image;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Image\Traits\Attribute;

class Image extends Model
{
    use SoftDeletes,Attribute;

    protected $fillable = [
        'id',
        'image',
        'status',
    ];

    public function getImageAttribute($value)
    { 
        return ($value) ? ('storage/image/' . $value) : ('admin-assets/images/no-image.png');
    }
}
