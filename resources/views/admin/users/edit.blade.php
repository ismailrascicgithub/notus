@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold text-gray-900">Edit User</h2>
        @include('admin.users.partials.form', ['user' => $user]) 
    </div>
@endsection
