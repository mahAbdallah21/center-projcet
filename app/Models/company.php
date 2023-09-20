<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function branches(){

        return $this->hasMany(branch::class);
    }
    public function manager(){

        return $this->hasOne(Manager::class);
    }
}
