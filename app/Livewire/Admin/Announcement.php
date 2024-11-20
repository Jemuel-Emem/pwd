<?php

namespace App\Livewire\Admin;

use App\Models\Announcement as Ann;
use Livewire\Component;
use Livewire\WithPagination;

class Announcement extends Component
{
    use WithPagination;

    public $title;
    public $description;
    public $announcementId;
    public $isEdit = false;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
    ];

    public function resetFields()
    {
        $this->title = '';
        $this->description = '';
        $this->announcementId = null;
        $this->isEdit = false;
    }

    public function createAnnouncement()
    {
        $this->validate();

        Ann::create([
            'title' => $this->title,
            'description' => $this->description,
        ]);

        $this->resetFields();
        session()->flash('message', 'Announcement created successfully!');
    }

    public function editAnnouncement($id)
    {
        $announcement = Ann::findOrFail($id);

        $this->announcementId = $announcement->id;
        $this->title = $announcement->title;
        $this->description = $announcement->description;
        $this->isEdit = true;
    }

    public function updateAnnouncement()
    {
        $this->validate();

        $announcement = Ann::findOrFail($this->announcementId);
        $announcement->update([
            'title' => $this->title,
            'description' => $this->description,
        ]);

        $this->resetFields();
        session()->flash('message', 'Announcement updated successfully!');
    }

    public function deleteAnnouncement($id)
    {
        Ann::findOrFail($id)->delete();
        session()->flash('message', 'Announcement deleted successfully!');
    }

    public function render()
    {
        return view('livewire.admin.announcement', [
            'announcements' => Ann::orderBy('created_at', 'desc')->paginate(10),
        ]);
    }
}
