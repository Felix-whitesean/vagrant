<?php

namespace App\Livewire;
use App\Models\Crew;
use App\Models\Port;
use App\Models\Ship;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
class Menu extends Component
{
    public string $active = "";
    public array $shipMenuItems = [
        ["label"=>"View ships","action"=>"view-ships"],
    ];

    public array $crewMenuItems = [
        ["label"=>"View all employees","action"=>"view-crew"],
        ["label"=> "Assign ship to employee","action"=>"assign-ship-to-crew"],
    ];

    public array $clientMenuItems = [
        ["label"=>"clients stats","action"=>"client-home"],
    ];

    public array $portsMenuItems = [
        ["label"=>"Ports","action"=>"view-ports"],
        ["label"=>"Cargo","action"=>"view-cargo"],
        ["label"=>"Shipments","action"=>"view-shipments"],
    ];


    public $ships = [];
    public $ports = [];
    public $totalships = 0;
    public $activecrew = 0;
    public function mount()
    {
        $this->totalships = Ship::count();
        $this->activecrew = Crew::where('is_active', 1)->count();
    }
    public function setActive($item)
    {
        $this->active = $item;
        $this->totalships = Ship::count();
        if ($item === 'view-ships') {
            $this->ships = Ship::all()->toArray();
        }
        elseif($item === 'view-ports') {
            $this->ports = Port::all()->toArray();
        }

    }
    public function render()
    {
        return view('livewire.menu');
    }
}
