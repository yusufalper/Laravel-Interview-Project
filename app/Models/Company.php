<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'internet_address'];

    public function people()
    {
        return $this->hasMany('App\Models\Person');
    }

    public function addresses()
    {
        return $this->hasMany('App\Models\Address');
    }
}
