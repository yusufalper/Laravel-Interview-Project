<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'internet_adress'];

    public function people()
    {
        return $this->hasMany('App\Models\Person');
    }
}
