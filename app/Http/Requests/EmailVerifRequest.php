<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class EmailVerifRequest extends FormRequest
{
    public function authorize()
    {
        $user = User::find($this->route('id'));

        return hash_equals(
            (string)$this->route('hash'), sha1($user->email)
        );
    }

    public function rules()
    {
        return [
            //
        ];
    }

    public function fulfillEmail()
    {
        $user = User::find($this->route('id'));

        if (!$user->hasVerifiedEmail())
            $user->markEmailAsVerified();
    }
}
