<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientPlaces extends Model
{
    use HasFactory;

    private $client_id;
    private $place_id;
    private $spend_money;

    protected $table = 'clients_places';
}
