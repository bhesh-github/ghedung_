<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadType extends Model
{
    use HasFactory;

    protected $guarded = [];

    function downloads(){
        return $this->hasMany(Download::class, 'download_type_id', 'id');
    }
}
