<?php

namespace App\Livewire\Admin;
use App\Models\User;
use App\Models\Health as HealthModel;
use Livewire\Component;
use Livewire\WithPagination;

class Health extends Component
{
    use WithPagination;

    public $blood_pressure;
    public $blood_type;
    public $weight;
    public $height;
    public $respiratory_rate;
    public $pulse_rate;
    public $o2_stat;
    public $temperature;
    public $other_conditions;
    public $health_id;
    public $user_id;
    public $isEdit = false;

    protected $rules = [
        'user_id' => 'required|exists:users,id',
        'blood_pressure' => 'required|string|max:255',
        'blood_type' => 'required|string|max:3',
        'weight' => 'required|numeric|min:1',
        'height' => 'required|numeric|min:1',
        'respiratory_rate' => 'required|numeric|min:1',
        'pulse_rate' => 'required|numeric|min:1',
        'o2_stat' => 'required|numeric|min:1',
        'temperature' => 'required|numeric|min:1',
        'other_conditions' => 'nullable|string|max:500',
    ];
    public function resetFields()
    {
        $this->reset([
            'blood_pressure',
            'blood_type',
            'weight',
            'height',
            'respiratory_rate',
            'pulse_rate',
            'o2_stat',
            'temperature',
            'other_conditions',
            'health_id',
            'isEdit',
        ]);
    }
    public function createHealthInfo()
    {
        $this->validate();

        HealthModel::create([
            'user_id' => $this->user_id, // Associate health info with the user
            'blood_pressure' => $this->blood_pressure,
            'blood_type' => $this->blood_type,
            'weight' => $this->weight,
            'height' => $this->height,
            'respiratory_rate' => $this->respiratory_rate,
            'pulse_rate' => $this->pulse_rate,
            'o2_stat' => $this->o2_stat,
            'temperature' => $this->temperature,
            'other_conditions' => $this->other_conditions,
        ]);

        session()->flash('message', 'Health information added successfully.');
        $this->resetFields();
    }

    public function editHealthInfo($id)
    {
        $record = HealthModel::findOrFail($id);
        $this->health_id = $record->id;
        $this->user_id = $record->user_id;
        $this->blood_pressure = $record->blood_pressure;
        $this->blood_type = $record->blood_type;
        $this->weight = $record->weight;
        $this->height = $record->height;
        $this->respiratory_rate = $record->respiratory_rate;
        $this->pulse_rate = $record->pulse_rate;
        $this->o2_stat = $record->o2_stat;
        $this->temperature = $record->temperature;
        $this->other_conditions = $record->other_conditions;
        $this->isEdit = true;
    }


    public function updateHealthInfo()
    {
        $this->validate();

        $record = HealthModel::findOrFail($this->health_id);
        $record->update([
            'user_id' => $this->user_id, // Update user_id
            'blood_pressure' => $this->blood_pressure,
            'blood_type' => $this->blood_type,
            'weight' => $this->weight,
            'height' => $this->height,
            'respiratory_rate' => $this->respiratory_rate,
            'pulse_rate' => $this->pulse_rate,
            'o2_stat' => $this->o2_stat,
            'temperature' => $this->temperature,
            'other_conditions' => $this->other_conditions,
        ]);

        session()->flash('message', 'Health information updated successfully.');
        $this->resetFields();
    }


    public function deleteHealthInfo($id)
    {
        $record = HealthModel::findOrFail($id);
        $record->delete();

        session()->flash('message', 'Health information deleted successfully.');
    }

    public function render()
    {
        return view('livewire.admin.health', [
            'users' => User::with('healthRecords')->paginate(10),
        ]);
    }


}
