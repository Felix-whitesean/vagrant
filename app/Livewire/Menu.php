<?php

namespace App\Livewire;
use Livewire\Component;
class Menu extends Component
{
    public string $active = "view-ships";
    public array $shipMenuItems = [
        ["label"=>"View ships","action"=>"view-ships"],
        ["label"=> "Add new ship","action"=>"add-new-ship"],
    ];

    public array $crewMenuItems = [
        ["label"=>"View all employees","action"=>"view-employees"],
        ["label"=> "Assign ship to employee","action"=>"assign-ship-to-employee"],
    ];
    public function setActive($item)
    {
        $this->active = $item;
    }
    public function render()
    {
        return view('livewire.menu');
    }
}
