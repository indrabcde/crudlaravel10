<?php

namespace App\Models;

use App\Models\Religion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function religions(){
        return $this->belongsTo(Religion::class,'id_religions','id');
    }

}
