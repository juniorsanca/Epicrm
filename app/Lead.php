<?php

namespace App;

use App\Traits\MultiTenantAssetTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Lead extends Model
{
    use SoftDeletes, MultiTenantAssetTrait;
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client', 'company', 'coast', 'origin', 'state', 'email', 'phone', 'description', 'tenant_id', 'user_id', 'state_id',
    ];


    public function tenant()
    {
        return $this->belongsTo(User::class, 'tenant_id');
    }

    public function states()
    {
        return $this->belongsTo(State::class, 'state_id');

        //return $this->belongsToMany(State::class);
    }

    // public function lead()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }

    /*
    public function lead()
    {
        return $this->belongsTo(User::class, 'user_id')
    }
    */
}
