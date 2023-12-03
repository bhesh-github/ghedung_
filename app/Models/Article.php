<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $appends = ['image_link', 'writer_image_link'];

    public function getImageLinkAttribute()
    {
        return asset("upload/images/article/" . $this->image);
    }
    // protected $appends = ['writer_image'];

    public function getWriterImageLinkAttribute()
    {
        return asset("upload/images/article/" . $this->writer_image);
    }
}

// protected $appends = ['logo_link','favicon_link','image_link'];

// public function getLogoLinkAttribute()
// {
//    return asset("upload/images/company_profile/".$this->logo);
// }
// public function getfaviconLinkAttribute()
// {
//    return asset("upload/images/company_profile/".$this->favicon);
// }