<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopicReply extends Model
{
    use HasFactory;

    public function Topic(){

        return $this->belongsTo('App\Models\Topic');
    }
    public function User(){

        return $this->belongsTo('App\Models\User');
    }
}
