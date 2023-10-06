@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <p>Description: {{ $task->description }}</p>

    @if ($task->long_description)
        <p>Long Description: {{ $task->long_description }}</p>
    @endif

    <p>Created at: {{ $task->created_at }}</p>

    @if ($task->updated_at)
        <p>Updated at: {{ $task->updated_at }}</p>
    @endif

    @if ($task->completed == true)
        <p>Completed at: {{ $task->completed_at }}</p>
    @else
        <p>Task not completed</p>
    @endif

    <div>
        <a href="{{ route('tasks.edit', ['id' => $task->id]) }}">Edit Task</a>
    </div>
@endsection
