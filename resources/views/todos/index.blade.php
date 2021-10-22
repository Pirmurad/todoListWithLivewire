@extends('todos.layout')
@section('title')
    Todos
@endsection
@section('content')
    <div class="flex justify-between  border-b p-4">
        <h1 class="text-2xl">All your TODOs</h1>
        <a class="mx-5 py-2 text-blue-400 text-white cursor-pointer" href="{{ route( 'todo.create') }}">
            <span class="fas fa-plus-circle" />
        </a>
    </div>
    <x-alert/>
    <ul class="m-5">
        @forelse($todos as $todo)
            <li class="flex justify-between my-2">
                @include('todos.completeButton')

            @if($todo['completed'])
                    <a class="cursor-pointer line-through" href="{{ route('todo.show') }}"> {{ $todo->title }}</a>
                @else
                    <a class="cursor-pointer" href="{{ route('todo.show',$todo['id']) }}"> {{ $todo->title }}</a>
                @endif
                <div>
                     <a class="mx-5 p-1 text-yellow-500 cursor-pointer" href="{{ route('todo.edit',$todo['id']) }}">
                         <span class="fas fa-pencil"></span>
                     </a>
                    <a class="mx-5 p-1 text-red-500 cursor-pointer" href="javascript:void(0)">
                        <span onclick="event.preventDefault(); if(confirm('Are you want to delete it?')) {document.getElementById('form-delete-{{ $todo['id'] }}').submit()} " class="fas fa-times cursor-pointer"></span>

                        <form id="{{  'form-delete-'.$todo['id'] }}" action="{{ route('todo.destroy',$todo['id']) }}" method="post" style="display: none">
                            @csrf
                            @method('delete')
                        </form>
                    </a>

                </div>
            </li>
        @empty
            <div class="py-4 px-2 bg-red-200">There not single TODO</div>
        @endforelse
    </ul>
@endsection

