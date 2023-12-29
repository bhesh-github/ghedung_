<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCompany extends Model
{
    use HasFactory;
    protected $appends = ['company_logo_link'];

    public function getCompanyLogoLinkAttribute()
    {
        return asset("upload/images/sub_company/company_profile/" . $this->company_logo);
    }

    function sub_company_sections(){
        return $this->hasMany(SubCompanySection::class, 'sub_company_id', 'id');
    }
}
