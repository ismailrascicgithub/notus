<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Dashboard') }}</h2>
        </div>
    </x-slot>

    @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="text-gray-700">{{ __("Welcome to your admin dashboard.") }}</p>

                    <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-blue-100 p-4 rounded-lg shadow-sm hover:bg-blue-200 transition">
                            <a href="{{ route('admin.dashboard') }}" class="text-lg text-blue-600 hover:text-blue-800">
                                {{ __('Dashboard') }}
                            </a>
                        </div>

                        @if(auth()->user()->hasRole('admin'))
                            <div class="bg-purple-100 p-4 rounded-lg shadow-sm hover:bg-purple-200 transition">
                                <a href="{{ route('admin.users.index') }}" class="text-lg text-purple-600 hover:text-purple-800">
                                    {{ __('Manage Users') }}
                                </a>
                            </div>
                            <div class="bg-green-100 p-4 rounded-lg shadow-sm hover:bg-green-200 transition">
                                <a href="{{ route('admin.categories.index') }}" class="text-lg text-green-600 hover:text-green-800">
                                    {{ __('Manage Categories') }}
                                </a>
                            </div>
                            <div class="bg-yellow-100 p-4 rounded-lg shadow-sm hover:bg-yellow-200 transition">
                                <a href="{{ route('admin.products.index') }}" class="text-lg text-yellow-600 hover:text-yellow-800">
                                    {{ __('Manage Products') }}
                                </a>
                            </div>
                        @endif

                        @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('moderator'))
                            <div class="bg-red-100 p-4 rounded-lg shadow-sm hover:bg-red-200 transition">
                                <a href="{{ route('admin.comments.index') }}" class="text-lg text-red-600 hover:text-red-800">
                                    {{ __('Manage Comments') }}
                                </a>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
