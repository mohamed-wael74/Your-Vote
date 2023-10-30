<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{

    protected $table = 'votes';
    protected $guarded = [];

    use HasFactory;
    protected $filable = [
        'poll_id',
        'option_id',
        'user_id',
    ];
    public $timestamps = false;


    public function option()
    {
        return $this->belongsTo(Option::class);
    }
}
