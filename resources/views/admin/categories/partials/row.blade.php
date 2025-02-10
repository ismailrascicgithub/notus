<tr class="border-b hover:bg-gray-100 transition duration-200">
    <td class="py-3 px-6 text-gray-700 pl-{{ $level * 8 }}">{{ $category->name }}</td> 
    <td class="py-3 px-6 text-gray-700 pl-{{ $level * 8 }}">
        @if($category->parent)
            {{ $category->parent->name }}
        @else
            No Parent
        @endif
    </td>
    <td class="py-3 px-6">
        <a href="{{ route('admin.categories.edit', $category) }}" class="px-3 py-2 bg-green-500 text-white rounded-lg shadow hover:bg-green-600 transition duration-150">Edit</a>
        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline-block ml-4">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-3 py-2 bg-red-500 text-white rounded-lg shadow hover:bg-red-600 transition duration-150">Delete</button>
        </form>
    </td>
</tr>

@foreach($category->children as $child)
    @include('admin.categories.partials.row', ['category' => $child, 'level' => $level + 1])
@endforeach
