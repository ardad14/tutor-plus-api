<?php

namespace App\Services;

use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlaceService
{
    public static function createPlace(Request $request): void
    {
        DB::table('places')->insert([
           'name' => $request['name'],
           'address' => $request['address'],
           'working_hours_start' => $request['working_start'],
           'working_hours_end' => $request['working_end']
        ]);
        header("Location: /signIn");
    }

    public static function getAllPlaces(): string
    {
        return json_encode(Place::all());
    }

}
