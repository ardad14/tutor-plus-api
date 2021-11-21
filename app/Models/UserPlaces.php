<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPlaces extends Model
{
    use HasFactory;

    private $user_id;
    private $place_id;

    protected $table = 'users_places';
}
