<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $appends = ['file_link'];

    public function getFileLinkAttribute()
    {
       return asset("upload/files/downloads/".$this->file);
    }

    function type(){
        return $this->belongsTo(DownloadType::class,'download_type_id','id');
    }
}
