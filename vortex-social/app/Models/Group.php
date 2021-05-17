<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public function guru()
    {
        return $this->belongsTo('Guru');
    }

    public function stans()
    {
        return $this->belongsToMany('Stan');
    }

}
