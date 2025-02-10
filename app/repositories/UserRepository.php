<?php

namespace App\Repositories;

use App\Models\User;
use Spatie\Permission\Models\Role;

class UserRepository
{
    public function getAllUsers()
    {
        return User::all();
    }

    public function createUser(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $user->assignRole($data['role']);
        return $user;
    }

    public function updateUser(User $user, array $data)
    {
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' =>$data['password'] ? bcrypt($data['password']) : $user->password,

        ]);

        $user->syncRoles($data['role']);

        return $user;
    }

    public function deleteUser(User $user)
    {
        $user->delete();
    }

    public function getRoles()
    {
        return Role::all();
    }
}
