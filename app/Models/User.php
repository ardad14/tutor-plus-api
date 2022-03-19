<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Passport\HasApiTokens;

class User extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'role'
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
