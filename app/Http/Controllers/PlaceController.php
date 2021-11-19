<?php

namespace App\Http\Controllers;

use App\Services\PlaceService;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function createPlace(Request $request): void
    {
        PlaceService::createPlace($request);
    }
}
