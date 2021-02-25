<?php

namespace App\Models\Faq;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Faq\Traits\Attribute;

class Faq extends Model
{
    use SoftDeletes,Attribute;

    protected $fillable = [
        'id',
        'title',
        'desc',
    ];
}
