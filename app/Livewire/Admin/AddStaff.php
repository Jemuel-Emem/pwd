<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class AddStaff extends Component
{
    public $name;
    public $email;
    public $password;
    public $staffMembers;
    public $staffId;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8',
    ];

    public function mount()
    {
        $this->staffMembers = User::where('is_admin', 1)->get();
    }

    public function saveStaff()
    {
        $this->validate();

        User::updateOrCreate(
            ['id' => $this->staffId],
            [
                'is_admin' => 1,
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]
        );

      flash('message', $this->staffId ? 'Staff account updated successfully.' : 'Staff account created successfully.');


        $this->staffMembers = User::where('is_admin', 1)->get();


        $this->reset(['name', 'email', 'password', 'staffId']);
    }

    public function editStaff($id)
    {
        $staff = User::findOrFail($id);
        $this->staffId = $staff->id;
        $this->name = $staff->name;
        $this->email = $staff->email;
        // Do not load the password for editing
    }

    public function deleteStaff($id)
    {
        User::findOrFail($id)->delete();
 flash('message', 'Staff account deleted successfully.');


        $this->staffMembers = User::where('is_admin', 1)->get();
    }

    public function render()
    {
        return view('livewire.admin.add-staff');
    }
}
