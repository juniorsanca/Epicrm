<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    // use SoftDeletes, MultiTenantRoleTrait;

    protected $fillable = [
        'title', 'state_id',
    ];

    public function state()
    {
        return $this->belongsTo(Lead::class);
    }
}
