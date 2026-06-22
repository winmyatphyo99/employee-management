<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function me(Request $request)
    {
        return response()->json($request->user());
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->userService->register($request->validated());

        return response()->json([
            'status' => true,
            'message' => 'User registered successfully',
            'data' => $user
        ], 201);
    }

    public function login(LoginRequest $request)
    {
        $user = $this->userService->authenticate($request->validated());

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid credentials'
            ], 401);
        }

        $token = $user->createToken('UserToken')->accessToken;

        return response()->json([
            'status' => true,
            'message' => 'Login successful',
            'token' => $token,
            'data' => $user
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'status' => true,
            'message' => 'Logged out successfully'
        ]);
    }

    public function users(Request $request)
    {
        return response()->json(
            $this->userService->getAll(
                $request->get('per_page', 10)
            )
        );
    }

    public function show($id)
    {
        $user = $this->userService->findById($id);

        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        return response()->json([
            'user' => $user
        ]);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = $this->userService->findById($id);

        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        $user = $this->userService->update($user, $request->validated());

        return response()->json([
            'message' => 'User updated successfully',
            'user' => $user
        ]);
    }
    public function destroy($id)
    {
        $user = $this->userService->findById($id);

        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        $this->userService->delete($user);

        return response()->json([
            'message' => 'User deleted successfully'
        ]);
    }
}
