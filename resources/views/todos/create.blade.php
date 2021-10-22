@extends('todos.layout')
@section('title')
    Create Todo
@endsection
@section('content')
    <div class="flex justify-between border-b px-4">
        <h1 class="text-2xl border-b pb-4">What next you need To-DO</h1>
        <a class="mx-5 py-2 text-gray-400 cursor-pointer" href="{{ route( 'todo.index') }}">
            <i class="fas fa-arrow-left"></i>
        </a>
    </div>

    <x-alert/>
    <form action="{{ route('todo.store') }}" method="post" class="py-5">
        @csrf
        <div class="py-1">
            <input type="text" name="title" class="p-2 border rounded" placeholder="Title">
        </div>
        <div class="py-1">
            <textarea name="description" class="py-2 px-4 border rounded" placeholder="Description"></textarea>
        </div>
        <div class="py-2">
            @livewire('step')
        </div>
        <div class="py-1">
            <input type="submit" value="Create" class="p-2 border rounded">
        </div>
    </form>

@endsection
