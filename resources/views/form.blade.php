@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('styles')
<style>
    .error-message {
        color: red;
        font-size: 0.8em;
    }
</style>
@endsection

@section('content')
<div class="max-w-lg mx-auto">
    <form method="POST"
        action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}"
        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset

        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
            <input type="text" name="title" id="title"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                value="{{ $task->title ?? old('title') }}">
            @error('title')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
            <textarea name="description" id="description" rows="5"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $task->description ?? old('description') }}</textarea>
            @error('description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="long_description" class="block text-gray-700 text-sm font-bold mb-2">Details</label>
            <textarea name="long_description" id="long_description" rows="8"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                @isset($task)
                    Update Task
                @else
                    Add Task
                @endisset
            </button>
        </div>
    </form>
</div>
@endsection
