<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'string', 'max:20', 'unique:customers,phone'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        $customer = Customer::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
        ]);

        $token = auth('customer')->login($customer);

        return response()->json([
            'success' => true,
            'message' => 'Registrasi berhasil',
            'customer' => $customer,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'phone' => ['required'],
            'password' => ['required'],
        ]);

        if (!$token = auth('customer')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Nomor HP atau password salah',
            ], 401);
        }

        return response()->json([
            'success' => true,
            'message' => 'Login berhasil',
            'customer' => auth('customer')->user(),
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth('customer')->factory()->getTTL() * 60,
        ]);
    }

    public function me()
    {
        return response()->json([
            'success' => true,
            'customer' => auth('customer')->user(),
        ]);
    }

    public function refresh()
    {
        $token = auth('customer')->refresh();

        return response()->json([
            'success' => true,
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth('customer')->factory()->getTTL() * 60,
        ]);
    }

    public function logout()
    {
        auth('customer')->logout();

        return response()->json([
            'success' => true,
            'message' => 'Logout berhasil',
        ]);
    }
}