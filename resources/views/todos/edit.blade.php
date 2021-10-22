@extends('todos.layout')
@section('title')
    Edit Todo
@endsection
@section('content')
    <div class="flex justify-between px-4">
        <h1 class="text-2xl border-b pb-4">Update this To-DO list</h1>
        <a class="mx-5 py-2 text-gray-400 cursor-pointer" href="{{ route( 'todo.index') }}">
            <i class="fas fa-arrow-left"></i>
        </a>
    </div>
    <h2>{{ $todo->title }}</h2>
    <x-alert/>
    <form action="{{ route('todo.update',$todo['id']) }}" method="post" class="py-5">
        @csrf
        @method('patch')
        <div class="py-1">
            <input type="text" name="title" class="p-2 border rounded" value="{{ $todo['title'] }}">
        </div>
        <div class="py-1">
            <textarea name="description" class="py-2 px-4 border rounded">{{ $todo['description'] }}</textarea>
        </div>

        <div class="py-1">
            @livewire('edit-step',['steps'=>$todo->steps])
        </div>
        <div class="py-1">
            <input type="submit" value="Update" class="p-2 border rounded">
        </div>
    </form>
@endsection
