<div>
    <div class="flex justify-center px-4">
        <h2 class="text-lg border-b pb-4">Add steps for task</h2>
        <span wire:click="increment" class="fas fa-plus px-2 py-1 cursor-pointer"></span>
    </div>

    @foreach($steps as $step)
        <div class="mb-2" wire:key="{{ $loop->index }}">
            <input type="text" name="stepName[]" class="px-2 py-1 border rounded" placeholder="{{ 'Step '.  ($loop->index+1) }}" value="{{ $step['name'] }}">
            <input type="hidden" name="stepId[]" value="{{ $step['id'] }}">
            <span wire:click="remove({{ $loop->index }})" class="fas fa-times text-red-400 px-2 py-1 cursor-pointer"></span>
        </div>
    @endforeach

</div>
