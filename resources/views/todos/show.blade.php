@extends('todos.layout')
@section('title')
    Show Todo
@endsection
@section('content')
    <div>
        <div class="flex justify-between px-4">
            <h1 class="text-2xl border-b pb-4">{{ $todo['title'] }}</h1>
            <a class="mx-5 py-2 text-gray-400 cursor-pointer" href="{{ route( 'todo.index') }}">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
        <div class="py-4">
            <h3 class="text-lg">Description</h3>
            <p>{{ $todo['description'] }}</p>
        </div>
        @if($todo->steps->count())
            <div class="py-4">
                <h3 class="text-lg">Steps for this task</h3>
                @foreach($todo->steps as $step)
                    <p>{{ $step['name'] }}</p>
                @endforeach
            </div>
        @endif
    </div>

@endsection
