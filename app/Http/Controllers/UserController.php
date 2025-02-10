<?php
namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;
use App\Models\User;

class UserController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function index()
    {
        $users = $this->userRepo->getAllUsers();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = $this->userRepo->getRoles();
        return view('admin.users.create', compact('roles'));
    }

    public function store(UserRequest $request)
    {
        try {
            $this->userRepo->createUser($request->validated());
            return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.users.index')->with('error', 'Failed to create user: ' . $e->getMessage());
        }
    }

    public function edit(User $user)
    {
        $roles = $this->userRepo->getRoles();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(UserRequest $request, User $user)
    {
        try {
            $this->userRepo->updateUser($user, $request->validated());
            return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.users.index')->with('error', 'Failed to update user: ' . $e->getMessage());
        }
    }

    public function destroy(User $user)
    {
        try {
            $this->userRepo->deleteUser($user);
            return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.users.index')->with('error', 'Failed to delete user: ' . $e->getMessage());
        }
    }
}
