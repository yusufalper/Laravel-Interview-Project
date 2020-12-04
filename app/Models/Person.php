<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'lastname', 'email', 'phone', 'company_id'];

    public function company(){
        $this->belongsTo('App\Models\Company');
    }
}
