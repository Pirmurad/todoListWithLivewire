<div>
    <div class="flex justify-center px-4">
        <h2 class="text-lg border-b pb-4">Add steps for task</h2>
        <span wire:click="increment" class="fas fa-plus px-2 py-1 cursor-pointer"></span>
    </div>

         @foreach($steps as $step)
            <div class="mb-2" wire:key="{{ $loop->index }}">
                <input type="text" name="step[]" class="px-2 py-1 border rounded" placeholder="{{ 'Step '. ($step +1)  }}">
                <span wire:click="remove({{ $step }})" class="fas fa-times text-red-400 px-2 py-1 cursor-pointer"></span>
            </div>
        @endforeach

</div>
