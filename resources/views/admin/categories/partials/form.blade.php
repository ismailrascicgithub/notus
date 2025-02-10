@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-8 px-4 bg-white shadow-lg rounded-lg">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">
        @isset($category)
            Update Category
        @else
            Add New Category
        @endisset
    </h1>

    <form
        action="@isset($category) {{ route('admin.categories.update', $category->id) }} @else {{ route('admin.categories.store') }} @endisset"
        method="POST">
        @csrf
        @isset($category)
            @method('PUT')
        @endisset

        <div class="mb-6">
            <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $category->name ?? '') }}"
                class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required title="Enter the name of the new category">
            @error('name')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-6">
            <label for="parent_id" class="block text-sm font-medium text-gray-700">Parent Category</label>
            <select name="parent_id" id="parent_id"
                class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">No Parent</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" @isset($category) {{ $category->parent_id == $cat->id ? 'selected' : '' }}
                    @endisset>{{ $cat->name }}</option>
                @endforeach
            </select>
            @error('parent_id')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex justify-end">
            <button type="submit"
                class="px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                @isset($category)
                    Update
                @else
                    Save
                @endisset
            </button>
        </div>
    </form>

    <a href="{{ route('admin.categories.index') }}"
        class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition duration-200 mt-4">Back</a>
</div>
@endsection