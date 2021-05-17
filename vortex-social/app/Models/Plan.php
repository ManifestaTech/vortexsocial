<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    public function features()
    {
        return $this->belongsToMany('Feature', 'plans_features', 'plan_id', 'feature_id');
    }

    public function billingAccounts()
    {
        return $this->hasMany('BillingAccount', 'plan_id');
    }
}
