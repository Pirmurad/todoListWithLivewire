@if($todo['completed'])
    <span onclick="event.preventDefault(); document.getElementById('form-uncomplete-{{ $todo['id'] }}').submit()" class="fas fa-check text-green-500 cursor-pointer"></span>

    <form id="{{  'form-uncomplete-'.$todo['id'] }}" action="{{ route('todo.uncomplete',$todo['id']) }}" method="post" style="display: none">
        @csrf
        @method('put')
    </form>
@else
    <span onclick="event.preventDefault(); document.getElementById('form-complete-{{ $todo['id'] }}').submit()" class="fas fa-check text-gray-500 cursor-pointer"></span>

    <form id="{{  'form-complete-'.$todo['id'] }}" action="{{ route('todo.complete',$todo['id']) }}" method="post" style="display: none">
        @csrf
        @method('put')
    </form>
@endif
