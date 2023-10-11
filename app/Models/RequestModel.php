<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestModel extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table='requests';


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
