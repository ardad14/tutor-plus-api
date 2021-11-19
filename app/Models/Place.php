<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    private $name;
    private $address;
    private $working_hours_start;
    private $working_hours_end;

    protected $table = 'places';
}
