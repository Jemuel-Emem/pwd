<?php

namespace App\Livewire\Admin;

use App\Models\benefits as Benefit;
use Livewire\Component;

class Benefits extends Component
{
    public $particular;
    public $quantity;
    public $benefits;
    public $benefitId;

    protected $rules = [
        'particular' => 'required|string|max:255',
        'quantity' => 'required|integer',
    ];

    public function mount()
    {
        $this->benefits = Benefit::all();
    }

    public function submit()
    {
        $this->validate();

        Benefit::create([
            'particular' => $this->particular,
            'quantity' => $this->quantity,
        ]);

        flash()->success('Bebefits added successfully!');
        $this->resetFields();
        $this->benefits = Benefit::all();
    }

    public function editBenefit($id)
    {
        $benefit = Benefit::find($id);
        $this->benefitId = $benefit->id;
        $this->particular = $benefit->particular;
        $this->quantity = $benefit->quantity;
    }

    public function deleteBenefit($id)
    {
        Benefit::find($id)->delete();
        $this->benefits = Benefit::all();
    }

    public function resetFields()
    {
        $this->particular = '';
        $this->quantity = '';
    }

    public function render()
    {
        return view('livewire.admin.benefits');
    }
}
