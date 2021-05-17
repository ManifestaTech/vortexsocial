<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Guru extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['phone'];

    public function groups()
    {
        return $this->hasMany('Group');
    }

    public function stans()
    {
        return $this->belongsToMany('Stan', 'gurus_stans', 'guru_id', 'stan_id');
    }

    // public function profile()
    // {
    //     return $this->hasOne('Profile');
    // }

    public function user()
    {
        return $this->belongsTo('User');
    }
}
