<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Model implements Authenticatable
{
    use AuthenticableTrait, HasApiTokens, HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'phone',
        'password',
        'role'
    ];

    protected $hidden = [
        'password'
    ];

    /**
     * @return BelongsToMany
     */
    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class);
    }

    /**
     * @return BelongsToMany
     */
    public function announcements(): BelongsToMany
    {
        return $this->belongsToMany(Announcement::class);
    }
}
