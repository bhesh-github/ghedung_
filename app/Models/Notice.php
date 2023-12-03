<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;
    protected $appends = ['image_link'];

    public function getImageLinkAttribute()
    {
        return asset("upload/images/notice/" . $this->image);
    }
}
