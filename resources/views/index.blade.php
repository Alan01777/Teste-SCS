@extends('layouts.app')

@section('title', 'Teste SCS Task-List')

@section('content')
    <div>
        @forelse ($tasks as $task)
            <li>
                <a href="{{ route('tasks.show', ['id' => $task->id]) }}">{{ $task->title }}</a>
            </li>
        @empty
            <div>No tasks</div>
        @endforelse
       <a href="{{ route('tasks.create') }}">Create a new Task</a>
    </div>
@endsection
