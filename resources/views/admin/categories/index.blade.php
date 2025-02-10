@extends('layouts.app')

@section('content')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Categories') }}
    </h2>
</x-slot>
<!-- Include flash message component -->
<x-flash-message />
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="px-4 py-3 bg-gray-100 flex justify-between items-center">
                <h3 class="text-lg font-medium text-gray-700">Categories List</h3>
                <a href="{{ route('admin.categories.create') }}"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200"
                    title="Click to add a new category">
                    Add New Category
                </a>
            </div>
            <table class="min-w-full bg-white border-collapse">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-500 uppercase">Name</th>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-500 uppercase">Parent Category</th>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        @if(is_null($category->parent_id))
                            <tr class="border-b hover:bg-gray-100 transition duration-200">
                                <td class="py-3 px-6 text-gray-700">{{ $category->name }}</td>
                                <td class="py-3 px-6 text-gray-700">
                                    @if($category->parent)
                                        {{ $category->parent->name }}
                                    @else
                                        No Parent
                                    @endif
                                </td>
                                <td class="py-3 px-6">
                                    <a href="{{ route('admin.categories.edit', $category) }}"
                                        class="px-3 py-2 bg-green-500 text-white rounded-lg shadow hover:bg-green-600 transition duration-150">Edit</a>
                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST"
                                        class="inline-block ml-4">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-2 bg-red-500 text-white rounded-lg shadow hover:bg-red-600 transition duration-150">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @foreach($category->children as $child)
                                @include('admin.categories.partials.row', ['category' => $child, 'level' => 1])
                            @endforeach
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection