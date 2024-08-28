<?php

namespace App\Livewire\User;

use WireUi\Traits\WireUiActions;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Requirements as Requirements;
use Livewire\Component;

class RequirementsForm extends Component
{
    use WireUiActions;
    use WithFileUploads;

    public $add_modal = false;
    public $edit_modal = false;
    public $delete_modal = false;
    public $medical_certification, $brgy_certification, $birth_certificate, $whole_body_picture, $id_picture;
    public $requirement_id;
    public $existing_medical_certification, $existing_brgy_certification, $existing_birth_certificate, $existing_whole_body_picture, $existing_id_picture;

    public function submit()
    {
        $this->validate([
            'medical_certification' => 'required|file|mimes:pdf,jpg,png',
            'brgy_certification' => 'required|file|mimes:pdf,jpg,png',
            'birth_certificate' => 'required|file|mimes:pdf,jpg,png',
            'whole_body_picture' => 'required|file|mimes:jpg,png',
            'id_picture' => 'required|file|mimes:jpg,png',
        ]);

        $requirement = new Requirements();
        $requirement->name = Auth::user()->name;
        $requirement->user_id = Auth::id();

        if ($this->medical_certification) {
            $requirement->medical_certification = $this->medical_certification->store('documents', 'public');
        }
        if ($this->brgy_certification) {
            $requirement->brgy_certification = $this->brgy_certification->store('documents', 'public');
        }
        if ($this->birth_certificate) {
            $requirement->birth_certificate = $this->birth_certificate->store('documents', 'public');
        }
        if ($this->whole_body_picture) {
            $requirement->whole_body_picture = $this->whole_body_picture->store('pictures', 'public');
        }
        if ($this->id_picture) {
            $requirement->id_picture = $this->id_picture->store('pictures', 'public');
        }

        $requirement->save();

        $this->resetInputFields();
        $this->add_modal = false;

        flash()->success('Requirements information saved successfully!');
    }

    public function edit($id)
    {
        $requirement = Requirements::findOrFail($id);
        $this->requirement_id = $id;
        $this->existing_medical_certification = $requirement->medical_certification;
        $this->existing_brgy_certification = $requirement->brgy_certification;
        $this->existing_birth_certificate = $requirement->birth_certificate;
        $this->existing_whole_body_picture = $requirement->whole_body_picture;
        $this->existing_id_picture = $requirement->id_picture;

        $this->edit_modal = true;
    }

    public function update()
    {
        $this->validate([
            'medical_certification' => 'nullable|file|mimes:pdf,jpg,png|max:1024',
            'brgy_certification' => 'nullable|file|mimes:pdf,jpg,png|max:1024',
            'birth_certificate' => 'nullable|file|mimes:pdf,jpg,png|max:1024',
            'whole_body_picture' => 'nullable|file|mimes:jpg,png|max:1024',
            'id_picture' => 'nullable|file|mimes:jpg,png|max:1024',
        ]);

        $requirement = Requirements::findOrFail($this->requirement_id);

        if ($this->medical_certification) {
            Storage::delete($requirement->medical_certification);
            $requirement->medical_certification = $this->medical_certification->store('documents', 'public');
        }
        if ($this->brgy_certification) {
            Storage::delete($requirement->brgy_certification);
            $requirement->brgy_certification = $this->brgy_certification->store('documents', 'public');
        }
        if ($this->birth_certificate) {
            Storage::delete($requirement->birth_certificate);
            $requirement->birth_certificate = $this->birth_certificate->store('documents', 'public');
        }
        if ($this->whole_body_picture) {
            Storage::delete($requirement->whole_body_picture);
            $requirement->whole_body_picture = $this->whole_body_picture->store('pictures', 'public');
        }
        if ($this->id_picture) {
            Storage::delete($requirement->id_picture);
            $requirement->id_picture = $this->id_picture->store('pictures', 'public');
        }

        $requirement->save();

        $this->resetInputFields();
        $this->edit_modal = false;

        flash()->success('Requirements information updated successfully!');
    }

    public function confirmDelete($id)
    {
        $this->requirement_id = $id;
        $this->delete_modal = true;
    }

    public function delete()
    {
        $requirement = Requirements::findOrFail($this->requirement_id);
        Storage::delete($requirement->medical_certification);
        Storage::delete($requirement->brgy_certification);
        Storage::delete($requirement->birth_certificate);
        Storage::delete($requirement->whole_body_picture);
        Storage::delete($requirement->id_picture);
        $requirement->delete();

        $this->delete_modal = false;

        flash()->success('Requirement deleted successfully!');
    }

    private function resetInputFields()
    {
        $this->medical_certification = null;
        $this->brgy_certification = null;
        $this->birth_certificate = null;
        $this->whole_body_picture = null;
        $this->id_picture = null;
        $this->existing_medical_certification = null;
        $this->existing_brgy_certification = null;
        $this->existing_birth_certificate = null;
        $this->existing_whole_body_picture = null;
        $this->existing_id_picture = null;
    }

    public function render()
    {
        $userRequirements = Requirements::where('user_id', Auth::id())->paginate(10);

    return view('livewire.user.requirements-form', [
        'requirements' => $userRequirements,
    ]);
    }
}
