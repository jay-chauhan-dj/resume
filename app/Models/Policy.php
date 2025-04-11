<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $table = 'tblPolicies';

    protected $primaryKey = 'policyId';

    public $timestamps = false;

    protected $fillable = [
        'policyName',
        'policyDescription',
        'policyStatus',
        'policyEffectiveDate',
        'policyCreatedDate'
    ];

    // Cast policyDescription as JSON
    protected $casts = [
        'policyDescription' => 'array',
    ];
}
