<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailVerifRequest;
use App\Http\Requests\User\CreateUserRequest;
use App\Jobs\SendEmailVerification;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function createUser(CreateUserRequest $createUserRequest)
    {
        DB::beginTransaction();
        $data = $createUserRequest->validated();

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        SendEmailVerification::dispatch($user);

        DB::commit();
        return response()->json([
            'status' => true,
            'message' => 'User Created Successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ], 200);
    }

    public function verifyEmail(EmailVerifRequest $request, $id)
    {
        $request->fulfillEmail();

        return \response()->json([
            'status' => 'success',
        ]);
    }
}
