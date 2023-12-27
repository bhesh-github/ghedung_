<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SamitiActivityPdf extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $appends = ['file_link'];

    public function getFileLinkAttribute()
    {
        return asset("upload/files/samitis/activity/" . $this->file);
    }
}
