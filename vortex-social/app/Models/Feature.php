<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    public function plans()
    {
        return $this->belongsToMany('Plan', 'plans_features', 'feature_id', 'plan_id');
    }
}
