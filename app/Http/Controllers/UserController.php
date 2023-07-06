<?php

namespace App\Http\Controllers;

use App\Http\Resources\User\UserIndexResource;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        return UserIndexResource::collection(
            User::where('created_at', '>', Carbon::now()->subMinutes(5))
                ->whereNotNull('email_verified_at')
                ->get()
        );
    }
}
