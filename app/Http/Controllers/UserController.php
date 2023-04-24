<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function edit()
        {
            $user = Auth::user();
            return view('users.edit', compact('user'));
        }

        public function update(Request $request)
        {
            $user = Auth::user();
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'phone' => 'required',
            ]);

            $user->update($request->all());
            return redirect()->route('home')->with('success', 'Dados atualizados com sucesso');
        }

}
