<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class branch extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function company() {
        return  $this->belongsTo(company::class);

    }
    public function class_rooms(){

        return $this->HasMany(ClassRoom::class);
    }
}
