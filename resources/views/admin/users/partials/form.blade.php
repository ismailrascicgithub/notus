<form action="@isset($user) {{ route('admin.users.update', $user->id) }} @else {{ route('admin.users.store') }} @endisset" method="POST">
    @csrf
    @isset($user)
        @method('PUT')
    @endisset

    <div class="mb-6">
        <label for="name" class="block text-sm font-medium text-gray-700">User Name</label>
        <input type="text" name="name" id="name" value="{{ old('name', $user->name ?? '') }}" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        @error('name')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-6">
        <label for="email" class="block text-sm font-medium text-gray-700">User Email</label>
        <input type="email" name="email" id="email" value="{{ old('email', $user->email ?? '') }}" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        @error('email')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-6">
        <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
        <select name="role" id="role" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            @foreach($roles as $role)
                <option value="{{ $role->name }}" @isset($user) {{ $user->roles->contains($role->id) ? 'selected' : '' }} @endisset>{{ $role->name }}</option>
            @endforeach
        </select>
        @error('role')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-6">
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" name="password" id="password" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" @empty($user) required @endempty>
        @error('password')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="flex justify-end">
        <button type="submit" class="px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
            @isset($user)
                Update
            @else
                Save
            @endisset
        </button>
    </div>
</form>
