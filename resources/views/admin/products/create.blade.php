@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden p-6">
                <form action="{{ route('admin.products.store') }}" method="POST">
                    @csrf
                    @include('admin.products.partials.form', ['categories' => $categories])
                </form>
            </div>
        </div>
    </div>
@endsection
