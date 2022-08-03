<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'comments',
    ];
    public $timestamps = false;

    public function getCommentsAttribute(){
        return nl2br($this->attributes['comments']);
    }

    public function setCommentsAttribute($value){
        $this->attributes['comments'] = str_replace("<br />\n","\n",$value);
    }
    
}
