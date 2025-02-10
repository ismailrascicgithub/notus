@extends('layouts.app')

@section('content')
<x-slot name="header">
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Users Management') }}</h2>
    </div>
</x-slot>

<!-- Include flash message component -->
<x-flash-message />

<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.users.create') }}"
            class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700">
            Add New User
        </a>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Email</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Role</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4 text-center text-gray-700">{{ $user->name }}</td>
                        <td class="px-6 py-4 text-center text-gray-700">{{ $user->email }}</td>
                        <td class="px-6 py-4 text-center text-gray-700">
                            {{ implode(', ', $user->roles->pluck('name')->toArray()) }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                class="px-3 py-2 bg-green-500 text-white rounded-lg shadow hover:bg-green-600">
                                Edit
                            </a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                class="inline-block ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-2 bg-red-500 text-white rounded-lg shadow hover:bg-red-600">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection