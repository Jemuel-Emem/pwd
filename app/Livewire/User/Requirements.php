<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\requirements as RQ;

class RequirementComponent extends Component
{
    use WithPagination;

public $add_modal , $edit_id, $edit_modal;
    public function render()
    {
        return view('livewire.user.requirements', [
            'require' => RQ::paginate(10),
        ]);
    }

    public function submit()
    {
        $this->validate([
            'medical_certification' => 'nullable|file|mimes:pdf,jpeg,png,jpg',
            'brgy_certification' => 'nullable|file|mimes:pdf,jpeg,png,jpg',
            'birth_certificate' => 'nullable|file|mimes:pdf,jpeg,png,jpg',
            'whole_body_picture' => 'nullable|file|mimes:pdf,jpeg,png,jpg',
            'id_picture' => 'nullable|file|mimes:pdf,jpeg,png,jpg',
        ]);

        $requirement = new RQ();

        if ($this->medical_certification) {
            $requirement->medical_certification = $this->medical_certification->store('documents');
        }
        if ($this->brgy_certification) {
            $requirement->brgy_certification = $this->brgy_certification->store('documents');
        }
        if ($this->birth_certificate) {
            $requirement->birth_certificate = $this->birth_certificate->store('documents');
        }
        if ($this->whole_body_picture) {
            $requirement->whole_body_picture = $this->whole_body_picture->store('documents');
        }
        if ($this->id_picture) {
            $requirement->id_picture = $this->id_picture->store('documents');
        }

        $requirement->save();

        $this->reset();
        $this->add_modal = false;
    }

    public function edit($id)
    {
        $this->edit_id = $id;
        $this->edit_modal = true;
        // Load requirement details for editing if needed
    }

    public function submitedit()
    {
        $requirement = RQ::find($this->edit_id);

        if ($this->medical_certification) {
            $requirement->medical_certification = $this->medical_certification->store('documents');
        }
        if ($this->brgy_certification) {
            $requirement->brgy_certification = $this->brgy_certification->store('documents');
        }
        if ($this->birth_certificate) {
            $requirement->birth_certificate = $this->birth_certificate->store('documents');
        }
        if ($this->whole_body_picture) {
            $requirement->whole_body_picture = $this->whole_body_picture->store('documents');
        }
        if ($this->id_picture) {
            $requirement->id_picture = $this->id_picture->store('documents');
        }

        $requirement->save();

        $this->reset();
        $this->edit_modal = false;
    }
}
