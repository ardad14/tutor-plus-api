<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use HasFactory, Notifiable;

    private $name;
    private $surname;
    private $email;
    private $password;
    private $place_id;
    private $role;

    protected $table = 'users';
}
