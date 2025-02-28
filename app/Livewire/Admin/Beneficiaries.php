<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Log;
use App\Models\benefits as Benefit;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\benefeciaries as Beneficiary;

class Beneficiaries extends Component
{
    use WithPagination;

    public $modalVisible = false;
    public $selectedBeneficiary;
    public $benefit;
    public $benefits;
    public $search = '';
public $viewBenefitsModal = false;

public $selectedBeneficiaryName;
public $benefitsList = [];

public function viewBenefits($beneficiaryId)
{
    $this->selectedBeneficiary = Beneficiary::find($beneficiaryId);

    if ($this->selectedBeneficiary) {
        $this->selectedBeneficiaryName = $this->selectedBeneficiary->first_name . ' ' . $this->selectedBeneficiary->last_name;
        $this->benefitsList = $this->selectedBeneficiary->benefits; // Assuming there's a relationship in Beneficiary model
    } else {
        $this->selectedBeneficiaryName = null;
        $this->benefitsList = [];
    }

    $this->viewBenefitsModal = true;
}

public function closeViewBenefitsModal()
{
    $this->viewBenefitsModal = false;
}

    public function openModal($beneficiaryId)
    {
        $this->selectedBeneficiary = Beneficiary::find($beneficiaryId);
        $this->benefits = Benefit::all();
        $this->modalVisible = true;
    }



    public function addBenefitToBeneficiary()
{
    if ($this->benefit) {
        $benefit = Benefit::find($this->benefit);

        if ($benefit && $benefit->quantity > 0) {
            // Attach the benefit without replacing existing ones
            $this->selectedBeneficiary->benefits()->attach($this->benefit);

            // Decrease the quantity by 1
            $benefit->decrement('quantity');

            // Send SMS notification
            $phoneNumber = $this->selectedBeneficiary->contact_number;
            $message = "Hello {$this->selectedBeneficiary->first_name}, you have been granted the benefit '{$benefit->particular}'. Please visit the office to claim it.";

            $ch = curl_init();
            $parameters = [
                'apikey' => '046125f45f4f187e838905df98273c4e',
                'number' => $phoneNumber,
                'message' => $message,
                'sendername' => 'Estanz',
            ];

            curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_exec($ch);
            curl_close($ch);

            session()->flash('message', 'Benefit successfully added.');
        } else {
            session()->flash('error', 'Insufficient quantity for this benefit.');
        }
    }

    $this->modalVisible = false;
}









    public function closeModal()
    {
        $this->modalVisible = false;
    }

    public function searchh()
    {
        $this->render();
    }

    public function render()
    {
        $beneficiaries = Beneficiary::where(function ($query) {
            $query->where('first_name', 'like', '%' . $this->search . '%')
                  ->orWhere('middle_name', 'like', '%' . $this->search . '%')
                  ->orWhere('last_name', 'like', '%' . $this->search . '%');
        })
        ->paginate(10);

        return view('livewire.admin.beneficiaries', [
            'beneficiaries' => $beneficiaries,
            'benefits' => Benefit::all(),
        ]);
    }
}
