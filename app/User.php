<?php

namespace App;

use App\Traits\MultiTenantUserTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;


class User extends Authenticatable
{
    use Notifiable, MultiTenantUserTrait, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'name','phone', 'email', 'password', 'domain', 'is_suspended', 'tenant_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $cascadeDeletes = [
        'tenantUsers', 'roles', 'assetGroups',
    ];

    protected $with = [
        'roles',
    ];

    protected static function booted()
    {
        static::deleting(function ($user) {
            if ($user->domain) {
                $user->update([
                    'domain' => $user->domain . '-deleted-' . time()
                ]);
            }
        });
    }

    public function getIsAdminAttribute()
    {
        return $this->roles()->withoutGlobalScopes()->whereId(1)->exists();
    }

    public function getIsTenantAdminAttribute()
    {
        return $this->roles()->withoutGlobalScopes()->whereId(2)->exists();
    }

    public function getIsTenantUserAttribute()
    {
        return $this->roles()->withoutGlobalScopes()->whereId(3)->exists();
    }

    public function tenant()
    {
        return $this->belongsTo(self::class, 'tenant_id');
    }

    public function lead()
    {
        return $this->belongsTo('App\Lead');
    }

    //examiner ce code
    public function user()
    {
        return $this->belongsTo(Lead::class);
    }

    public function tenantUsers()
    {
        return $this->hasMany(self::class, 'tenant_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function assetGroups()
    {
        return $this->hasMany(AssetGroup::class, 'tenant_id');
    }
}
