<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required'],
            'nrc' => ['required'],
            'phone' => ['required'],
            'address'=>['required'],
            'parentCode'=> ['required'],
            'password' => $this->passwordRules(),
            'password_confirmation'=> ['required'],
            'gender' => ['required'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : ''
        ])->validate();

        return User::create([
            'username' => $input['username'],
            'email'=> $input['email'],
            'nrc' => $input['nrc'],
            'phone' => $input['phone'],
            'address'=> $input['address'],
            'parent_code'=> $input['parentCode'],
            'gender' => $input['gender'],
            'password' => Hash::make($input['password']),
        ]);

    }
}
