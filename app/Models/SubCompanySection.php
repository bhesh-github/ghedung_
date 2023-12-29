<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCompanySection extends Model
{
    use HasFactory;
    protected $guarded = [];

    function type(){
        return $this->belongsTo(SubCompany::class,'sub_company_id','id');
    }

    function sub_company_section_contents(){
        return $this->hasMany(SubCompanySectionContent::class, 'sub_company_section_id', 'id');
    }

    
}
