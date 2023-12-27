<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Samiti extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $appends = ['pdf_file_link'];

    public function getPdfFileLinkAttribute()
    {
       return asset("upload/files/samitis/".$this->samiti_pdf);
    }

    function samiti()
    {
        return $this->hasMany(SamitiMemberCard::class, 'samiti_id', 'id');
    }
}

