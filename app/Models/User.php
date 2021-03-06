<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get teams owned by this user
     */
    public function teamsOwned()
    {
        return $this->hasMany('App\Models\Team');
    }

    /**
     * Get teams where user belongs
     */
    public function userTeams()
    {
        return $this->hasMany('App\Models\UserTeam');
    }

    /**
     * Get teams where user belongs
     */
    public function gamesAttended()
    {
        return $this->hasMany('App\Models\GameSchedulePlayer');
    }

    /**
     * Get fields belonging to this user
     */
    public function fields()
    {
        return $this->belongsToMany('App\Models\Field', 'field_owners');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    /**
     * Get teams where user belongs
     */
    public function teams()
    {
        return $this->belongsToMany('App\Models\Team','user_teams');
    }
}
