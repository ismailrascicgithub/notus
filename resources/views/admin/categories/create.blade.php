@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold text-gray-900">Add New Category</h2>
        <p class="text-sm text-gray-600 mb-4">Fill in the fields below to add a new category.</p>
        @include('admin.categories.partials.form', ['categories' => $categories])
    </div>
@endsection
