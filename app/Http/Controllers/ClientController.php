<?php

namespace App\Http\Controllers;

use App\Services\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function editClient(Request $request, $id)
    {
        ClientService::editClient($request, $id);
    }
}
