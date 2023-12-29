<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $appends = ['image_link', 'pdf_file_link'];

    public function getImageLinkAttribute()
    {
        return asset("upload/images/activity/" . $this->image);
    }
    public function getPdfFileLinkAttribute()
    {
        return asset("upload/files/article/" . $this->pdf_file);
    }
}
