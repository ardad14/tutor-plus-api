<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientService
{
    public static function getClientsForPlace()
    {
        $admin = User::find(session()->get('userId'));
        $place = DB::table('users_places')
            ->where('user_id', $admin->id)
            ->first();

        $actions = DB::select('select
                                    clients_places.id,
                                    clients_places.client_id,
                                    clients_places.place_id,
                                    clients_places.spend_money,
                                    clients_places.created_at,
                                    clients.id,
                                    clients.age,
                                    clients.name,
                                    clients.surname
                                from clients_places, clients
                                where clients_places.place_id = ? and clients.id = clients_places.client_id',
            [$place->place_id]
        );

        return json_encode($actions);
    }

    public static function editClient(Request $request, $id)
    {
        DB::table('clients')
            ->where('id', $id)
            ->update([
                'name' => $request['name'],
                'surname' => $request['surname'],
                'age' => $request['age']
            ]);
        header('location: /clients');
    }
}
