<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    use HasFactory;

    protected $fillable = ['latitude', 'longitude', 'company_id'];

    public function company(){
        $this->belongsTo('App\Models\Company');
    }
}
