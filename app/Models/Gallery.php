<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    
    protected $guarded = [];

    protected $appends = ['image_link'];

    public function getImageLinkAttribute()
    {
       return asset("upload/images/gallery/".$this->image);
    }

    function images(){
        return $this->belongsTo(GalleryImage::class, 'id', 'gallery_id');
    }
}
