@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold text-gray-900">Update Category</h2>
        <p class="text-sm text-gray-600 mb-4">Edit the details of the category below.</p>
        @include('admin.categories.partials.form', ['category' => $category, 'categories' => $categories])
    </div>
@endsection
