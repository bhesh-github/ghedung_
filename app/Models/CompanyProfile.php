<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasFactory;

    protected $appends = ['company_logo_link', 'favicon_link', 'company_flag_link', 'chairperson_image_link'];

    public function getCompanyLogoLinkAttribute()
    {
        return asset("upload/images/company_profile/" . $this->company_logo);
    }
    public function getFaviconLinkAttribute()
    {
        return asset("upload/images/company_profile/" . $this->favicon);
    }
    public function getCompanyFlagLinkAttribute()
    {
        return asset("upload/images/company_profile/" . $this->company_flag);
    }
    public function getChairpersonImageLinkAttribute()
    {
        return asset("upload/images/company_profile/" . $this->chairperson_image);
    }
}
