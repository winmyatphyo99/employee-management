<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthMutation
{
    public function register($_, array $args)
    {
        $user = User::create([
            'username' => $args['username'],
            'email' => $args['email'],
            'password' => Hash::make($args['password']),
        ]);

        $token = $user->createToken('graphql')->accessToken;

        return [
            'token' => $token,
            'user' => $user,
        ];
    }

    public function login($_, array $args)
    {
        $user = User::where('username', $args['username'])->first();

        if (!$user || !Hash::check($args['password'], $user->password)) {
            throw new \Exception('Invalid credentials');
        }

        $token = $user->createToken('graphql')->accessToken;

        return [
            'token' => $token,
            'user' => $user,
        ];
    }

    public function logout($_, array $args)
    {
        $user = Auth::user();

        if (!$user) {
            throw new \Exception("Unauthenticated");
        }

        $token = $user->token();

        if ($token) {
            $token->revoke();
        }

        return [
            'message' => 'Logged out successfully'
        ];
    }
}
