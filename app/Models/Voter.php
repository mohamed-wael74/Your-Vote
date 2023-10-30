<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Voter extends Authenticatable
{
    use HasFactory;
    protected $table = "voters";
    protected $fillable = ['id','name','email','org_code','SSN','password'];

    public function polls()
    {
        return $this->hasMany(Poll::class, 'created_by','org_code');
    }
    public function votes()
    {
        return $this->hasMany(Vote::class,'user_id','id');
    }

}
