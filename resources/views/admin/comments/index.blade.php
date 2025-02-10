@extends('layouts.app')

@section('content')
@if (session('success'))
    <div class="bg-green-500 text-white p-4 mb-4 rounded">
        {{ session('success') }}
    </div>
@endif

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Comments') }}
    </h2>
</x-slot>

<!-- Include flash message component -->
<x-flash-message />

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="px-4 py-3 bg-gray-100 flex justify-between items-center">
                <h3 class="text-lg font-medium text-gray-700">Comments List</h3>
                <a href="{{ route('admin.comments.create') }}"
                    class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-200"
                    title="Click to add a new comment">
                    Add New Comment
                </a>
            </div>
            <table class="min-w-full bg-white border-collapse">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-500 uppercase">Product</th>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-500 uppercase">Author Name</th>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-500 uppercase">Content</th>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-500 uppercase">Rating</th>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comments as $comment)
                        <tr class="border-b hover:bg-gray-100 transition duration-200">
                            <td class="py-3 px-6 text-gray-700">{{ isset($comment->product) && $comment->product->name }}
                            </td>
                            <td class="py-3 px-6 text-gray-700">{{ $comment->author_name }}</td>
                            <td class="py-3 px-6 text-gray-700">{{ $comment->content }}</td>
                            <td class="py-3 px-6 text-gray-700">{{ $comment->rating }}</td>
                            <td class="py-3 px-6">
                                <a href="{{ route('admin.comments.edit', $comment) }}"
                                    class="px-3 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition duration-150">Edit</a>
                                <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST"
                                    class="inline-block ml-4">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-2 bg-red-500 text-white rounded-lg shadow hover:bg-red-600 transition duration-150">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection