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
            return view('auth.edit', compact('user'));
        }

        public function update(Request $request)
        {
            $user = Auth::user();
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $user->id
            ]);

            $user->update($request->all());
            return redirect()->route('/')->with('success', 'Dados atualizados com sucesso');
        }

}
