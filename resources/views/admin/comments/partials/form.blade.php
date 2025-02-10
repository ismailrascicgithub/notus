<form action="{{ $comment ? route('admin.comments.update', $comment) : route('admin.comments.store') }}" method="POST">
    @csrf
    @if($comment)
        @method('PUT')
    @endif

    <div class="mb-4">
        <label class="block text-gray-700">Product</label>
        <select name="product_id" class="w-full border rounded px-3 py-2">
            @foreach($products as $product)
                <option value="{{ $product->id }}" {{ old('product_id', $comment->product_id ?? '') == $product->id ? 'selected' : '' }}>
                    {{ $product->name }}
                </option>
            @endforeach
        </select>
        @error('product_id') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-700">Author Name</label>
        <input type="text" name="author_name" value="{{ old('author_name', $comment->author_name ?? '') }}" class="w-full border rounded px-3 py-2">
        @error('author_name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-700">Content</label>
        <textarea name="content" class="w-full border rounded px-3 py-2">{{ old('content', $comment->content ?? '') }}</textarea>
        @error('content') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-700">Rating</label>
        <input type="number" name="rating" value="{{ old('rating', $comment->rating ?? '') }}" class="w-full border rounded px-3 py-2" min="0" max="5">
        @error('rating') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
        Save
    </button>
</form>
