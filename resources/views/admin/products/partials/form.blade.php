@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-6">
        <h2 class="text-2xl font-semibold">{{ isset($product) ? 'Edit Product' : 'Add New Product' }}</h2>

        <!-- Include flash message component -->
        <x-flash-message />

        <form action="{{ isset($product) ? route('admin.products.update', $product->id) : route('admin.products.store') }}" 
              method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($product))
                @method('PUT')
            @endif

            <div class="mb-4">
                <label class="block text-gray-700">Product Name</label>
                <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}" 
                       class="w-full border rounded px-3 py-2">
                @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Price</label>
                <input type="text" name="price" value="{{ old('price', $product->price ?? '') }}" 
                       class="w-full border rounded px-3 py-2">
                @error('price') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Categories</label>
                <div class="space-y-2">
                    @foreach($categories as $category)
                        <div>
                            <input type="checkbox" name="category_id[]" value="{{ $category->id }}" 
                                {{ isset($product) && in_array($category->id, old('category_id', $product->categories->pluck('id')->toArray())) ? 'checked' : '' }}>
                            <span>{{ $category->name }}</span>
                        </div>
                    @endforeach
                </div>
                @error('category_id') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Description</label>
                <textarea name="description" class="w-full border rounded px-3 py-2">{{ old('description', $product->description ?? '') }}</textarea>
                @error('description') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Product Images</label>

                <div class="flex space-x-2 mb-2">
                    @if(isset($product) && $product->images->isNotEmpty())
                        @foreach($product->images as $image)
                            <div class="relative">
                                <img src="{{ asset('storage/' . $image->path) }}" class="w-32 h-32 object-cover rounded-lg">
                                
                                @if($image->is_main)
                                    <span class="absolute top-0 right-0 bg-green-500 text-white text-xs rounded-full px-2 py-1">Main</span>
                                @else
                                    <a href="{{ route('admin.products.setMainImage', ['product' => $product->id, 'image' => $image->id]) }}" 
                                       class="absolute top-0 left-0 bg-blue-500 text-white px-2 py-1 rounded-full text-xs">
                                        Set as Main
                                    </a>
                                @endif

                                <a href="{{ route('admin.products.deleteImage', ['product' => $product->id, 'image' => $image->id]) }}" 
                                   class="absolute bottom-0 right-0 bg-red-500 text-white px-2 py-1 rounded-full text-xs">
                                    Delete
                                </a>
                            </div>
                        @endforeach
                    @else
                        <p>No images uploaded yet.</p>
                    @endif
                </div>
            </div>

            <input type="file" name="images[]" multiple class="w-full border rounded px-3 py-2">
            @error('images') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

            <button data-form-id="product-form" type="submit" class="mt-4 px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                Save
            </button>
            
        </form>
    </div>
@endsection
