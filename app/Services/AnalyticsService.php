<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class AnalyticsService
{
    public static function getAllActionsForPlace(): string
    {
        $admin = User::find(session()->get('userId'));

        $actions = DB::table('clients_places')
            ->where('place_id', $admin->place_id)
            ->get();

        return $actions;
    }
}
