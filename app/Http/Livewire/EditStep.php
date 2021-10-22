<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditStep extends Component
{
    public $steps = [];

    public function mount($steps)
    {
        $this->$steps = $steps->toArray();
    }

    public function increment()
    {
        $this->steps[] = count($this->steps);
    }

    public function remove($index)
    {
        $step =$this->steps[$index];
        \App\Step::find($step['id'])->delete();

        unset($step);
    }

    public function render()
    {
        return view('livewire.edit-step');
    }
}
