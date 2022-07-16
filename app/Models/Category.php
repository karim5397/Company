<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model

{
    use HasFactory;
    use SoftDeletes;
    // protected $timestamp=false;
    protected $guarded=[];

    public function user(){
       return $this->hasOne(User::class ,'id' ,'user_id');
    }

}
