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
                // Assign benefit to beneficiary
                $this->selectedBeneficiary->benefit_id = $this->benefit;
                $this->selectedBeneficiary->save();

                // Decrease the quantity by 1
                $benefit->decrement('quantity');

                // Send SMS notification
                $phoneNumber = $this->selectedBeneficiary->contact_number;
                $message = "Hello {$this->selectedBeneficiary->first_name}, you have been granted the benefit '{$benefit->particular}'. Please visit the office to claim your benefits at your earliest convenience. Thank you!\n\n- UNIFIED Assistance Program";

                $ch = curl_init();

                $parameters = [
                    'apikey' => '046125f45f4f187e838905df98273c4e',
                    'number' => $phoneNumber,
                    'message' =>  $message,
                    'sendername' => 'Estanz',
                ];

                curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                $output = curl_exec($ch);
                curl_close($ch);
            } else {
                session()->flash('error', 'Insufficient quantity for this benefit.');
            }
        }

        $this->modalVisible = false;
    }







    // private function sendSms($phoneNumber, $message)
    // {
    //     $apiKey = '046125f45f4f187e838905df98273c4e'; // Replace with your Semaphore API key
    //     $senderName = 'Eztanz';

    //     $parameters = [
    //         'apikey' => $apiKey,
    //         'number' => $phoneNumber,
    //         'message' => $message,
    //         'sendername' => $senderName,
    //     ];

    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
    //     curl_setopt($ch, CURLOPT_POST, 1);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //     $output = curl_exec($ch);
    //     $curlError = curl_error($ch);
    //     curl_close($ch);

    //     // ✅ Log API response
    //     Log::info('SMS API Response:', ['response' => $output]);

    //     // ✅ Log cURL errors if any
    //     if ($curlError) {
    //         Log::error('cURL Error:', ['error' => $curlError]);
    //         return false;
    //     }

    //     $responseData = json_decode($output, true);

    //     // ✅ Check and log Semaphore API response
    //     if (!isset($responseData[0]['status']) || $responseData[0]['status'] !== 'Queued') {
    //         Log::error('Semaphore API Response Error:', ['response' => $responseData]);
    //         return false;
    //     }

    //     return true;
    // }

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
