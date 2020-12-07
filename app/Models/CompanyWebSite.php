<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyWebSite extends Model
{
    use HasFactory;

    protected $fillable = ['site_content', 'company_id'];

    public function company(){
        return $this->belongsTo('App\Models\Company');
    }
}
