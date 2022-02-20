<?php

namespace App\Models;

use App\Http\Traits\HasCountry;
use App\Models\ClanWars\Game;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use App\Models\ClanWars\GameHomePlayer;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasCountry;
    use Notifiable;
    use TwoFactorAuthenticatable;

    //User roles.
    public const ADMIN = 1;
    public const CAPTAIN = 2;
    public const VICE_CAPTAIN = 3;
    public const PLAYER = 4;
    public const INACTIVE = 5;
    public const EX_MEMBER = 6;
    public const USER = 7;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'country',
        'race',
    ];

    /**
     * The attributes that should be hidden for serialization.
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
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function ingameRace()
    {
        return ucfirst($this->race);
    }

    public function teamRaceBackground(): string
    {
        switch ($this->race) {
            case 'none':
                return 'from-gray-400';
                break;

            case 'random':
                return 'from-red-800 via-yellow-400 to-indigo-800';
                break;

            case 'protoss':
                return 'from-yellow-400 to-black';
                break;

            case 'zerg':
                return 'from-red-400 to-black';
                break;

            case 'terran':
                return 'from-indigo-400 to-black';
                break;
        }
    }

    public function createdAt(): string
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('Y-m-d');
    }

    public function role(): string
    {
        switch ($this->role) {
            case '1':
                return 'ADMIN';
                break;

            case '2':
                return 'CAPTAIN';
                break;

            case '3':
                return 'VICE CAPTAIN';
                break;

            case '4':
                return 'PLAYER';
                break;

            case '5':
                return 'INACTIVE';
                break;

            case '6':
                return 'EX MEMBER';
                break;

            case '7':
                return 'USER';
                break;
        }
    }

    public function isAdmin(): bool
    {
        return $this->role == self::ADMIN ? true : false;
    }

    public function isCaptain(): bool
    {
        return $this->role <= self::CAPTAIN ? true : false;
    }

    public function isViceCaptain(): bool
    {
        return $this->role <= self::VICE_CAPTAIN ? true : false;
    }

    public function isPlayer(): bool
    {
        return $this->role <= self::PLAYER ? true : false;
    }

    public function isInactive(): bool
    {
        return $this->role <= self::INACTIVE ? true : false;
    }

    public function isExMember(): bool
    {
        return $this->role <= self::EX_MEMBER ? true : false;
    }

    public function isUser(): bool
    {
        return $this->role <= self::USER ? true : false;
    }


}
