<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCompanySectionContent extends Model
{
    use HasFactory;
    protected $appends = ['image_link', 'pdf_link'];

    public function getImageLinkAttribute()
    {
        return asset("upload/images/sub_company/section_content/" . $this->image);
    }
    public function getPdfLinkAttribute()
    {
        return asset("upload/files/sub_company/section_content/" . $this->pdf);
    }

    function type(){
        return $this->belongsTo(SubCompanySection::class,'sub_company_section_id','id');
    }
}
