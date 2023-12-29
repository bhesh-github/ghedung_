<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $appends = ['image_link', 'writer_image_link', 'pdf_file_link'];

    public function getImageLinkAttribute()
    {
        return asset("upload/images/article/" . $this->image);
    }

    public function getWriterImageLinkAttribute()
    {
        return asset("upload/images/article/" . $this->writer_image);
    }
    public function getPdfFileLinkAttribute()
    {
        return asset("upload/files/article/" . $this->pdf_file);
    }
}
