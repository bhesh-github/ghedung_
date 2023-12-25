<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SamitiMemberCard extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $appends = ['image_link'];

    public function getImageLinkAttribute()
    {
        return asset("upload/images/samitis/" . $this->image);
    }
}
