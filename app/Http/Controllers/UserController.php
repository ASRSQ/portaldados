<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function edit()
    {
        $user = User::user();
        return view('users.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::user();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($request->all());
        return redirect()->route('home')->with('success', 'Dados atualizados com sucesso');
    }
}
