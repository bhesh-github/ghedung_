<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;
    protected $appends = ['image_link','pdf_link'];

    public function getImageLinkAttribute()
    {
        return asset("upload/images/notice/" . $this->image);
    }
    public function getPdfLinkAttribute()
    {
        return asset("upload/files/notice/" . $this->pdf);
    }
}
