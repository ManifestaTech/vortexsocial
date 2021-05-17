<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Stan extends Model
{
    use HasFactory;
    use SoftDeletes;


    public function groups()
    {
        return $this->belongsToMany('Group');
    }

    public function gurus()
    {
        return $this->belongsToMany('Guru', 'gurus_stans', 'stan_id', 'guru_id');
    }

    public function profile()
    {
        return $this->hasOne('Profile');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }
}
