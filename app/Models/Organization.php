<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Organization extends Authenticatable
{
    use HasFactory;
    protected $table = "organizations";
    protected $fillable = ['name','email','industry','password'];

    public function voters ()
    {
        return $this->hasMany(Voter::class,'org_code','id');
    }
    public function polls()
    {
        return $this->hasMany(Poll::class,'created_by','id');
    }
}
