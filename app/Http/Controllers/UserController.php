<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $password = $request->get('password');
        $newpassword = $request->get('newpassword');

        if (Hash::check($newpassword, $user->password)) {
            return response()->json([
                'erro' => 'As senhas não podem ser igual.'
            ], 400);
        }

        if (! Hash::check($password, $user->password)) {
            return response()->json([
                'erro' => 'A senha atual não corresponse a senha de sua conta.'
            ], 400);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($newpassword)
        ]);

        return ['mensagem' => 'Perfil atualizado com sucesso.'];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if (Auth::id() !== $user->id) {
            return response()->json(['error' => 'Acesso negado'], 403);
        }

        $user->delete();

        return response()->json(['response' => 'Conta excluída com sucesso.']);
    }
}
