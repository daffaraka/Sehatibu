<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('dashboard.users.user-index', compact('users'));
    }

    public function create()
    {
        return view('dashboard.users.user-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'usia' => $request->usia,
            'password' => bcrypt($request->password),
            'tanggal_lahir' => $request->tanggal_lahir,
            'role' => $request->role,
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan ');
    }

    public function show(User $user)
    {
        $data['pageName'] = 'Detail User';
        $data['user'] = $user;
        return view('dashboard.users.user-show', $data);
    }

    public function edit(User $user)
    {
        $data['pageName'] = 'Edit User';
        $data['user'] = $user;
        return view('dashboard.users.user-edit', $data);
    }

    public function update(Request $request, User $user)
    {


        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'sometimes|string|min:8',
            'role' => 'sometimes|string|in:admin,opd,walidata',
        ]);

        $user->update($request->only('name', 'email', 'alamat', 'nomor_telepon', 'role','usia'));

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }
}
