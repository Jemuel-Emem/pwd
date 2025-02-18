<?php

namespace App\Livewire\Admin;
use App\Models\benefits;
use App\Models\Personalinfo as PF;
use App\Models\benefeciaries as Beneficiary;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Livewire\Component;

class Applicant extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search;
    protected $updatesQueryString = ['search'];

    public function searchApplicants()
    {
        $this->resetPage();
    }

    public function approveApplicant($applicantId)
    {
        $applicant = PF::findOrFail($applicantId);

        Beneficiary::create([
            'user_id' =>$applicant->user_id,
            'first_name' => $applicant->first_name,
            'middle_name' => $applicant->middle_name,
            'last_name' => $applicant->last_name,
            'suffix' => $applicant->suffix,
            'sex' => $applicant->sex,
            'date_of_birth' => $applicant->date_of_birth,
            'age' => $applicant->age,
            'civil_status' => $applicant->civil_status,
            'contact_number' => $applicant->contact_number,
            'address' => $applicant->address,
            'barangay' => $applicant->barangay,
            'type_of_disability' => $applicant->type_of_disability,
            'cause_of_disability' => $applicant->cause_of_disability,
            'applicantstatus' => 'approved',
        ]);

        $applicant->update(['status' => 'approved']);

        // Send Approval Notification
        $this->sendSmsNotification($applicant->contact_number, "Hello {$applicant->first_name}, your application has been APPROVED. You are now a beneficiary of the UNIFIED Assistance Program. Please visit our office for further instructions. Thank you!");

        flash()->success('Applicant approved and moved to beneficiaries.');
    }

    public function rejectApplicant($applicantId)
    {
        $applicant = PF::findOrFail($applicantId);

        // Update applicant status to 'declined' before deleting
        $applicant->update(['status' => 'declined']);

        // Delete the applicant instead of inserting them into the beneficiaries table
        $applicant->delete();

        // Send Decline Notification
        $this->sendSmsNotification($applicant->contact_number, "Hello {$applicant->first_name}, we regret to inform you that your application has been DECLINED. For further inquiries, please contact our office. Thank you!");

        flash()->success('Applicant has been declined and removed.');
    }

    /**
     * Send SMS Notification
     */
    private function sendSmsNotification($phoneNumber, $message)
    {
        $ch = curl_init();

        $parameters = [
            'apikey' => '046125f45f4f187e838905df98273c4e', // Replace with actual API key
            'number' => $phoneNumber,
            'message' => $message,
            'sendername' => 'Estanz',
        ];

        curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $output = curl_exec($ch);
        curl_close($ch);
    }



    public function render()
    {
        $search = '%' . $this->search . '%';
        $applicants = PF::query()
            ->where(function ($query) use ($search) {
                $query->where('first_name', 'like', $search)
                      ->orWhere('middle_name', 'like', $search)
                      ->orWhere('last_name', 'like', $search)
                      ->orWhere('suffix', 'like', $search)
                      ->orWhere('sex', 'like', $search)
                      ->orWhere('date_of_birth', 'like', $search)
                      ->orWhere('age', 'like', $search)
                      ->orWhere('civil_status', 'like', $search)
                      ->orWhere('contact_number', 'like', $search)
                      ->orWhere('address', 'like', $search)
                      ->orWhere('barangay', 'like', $search)
                      ->orWhere('type_of_disability', 'like', $search)
                      ->orWhere('cause_of_disability', 'like', $search)
                      ->orWhere('g_first_name', 'like', $search)
                      ->orWhere('g_middle_name', 'like', $search)
                      ->orWhere('g_last_name', 'like', $search)
                      ->orWhere('g_suffix', 'like', $search)
                      ->orWhere('g_sex', 'like', $search)
                      ->orWhere('g_date_of_birth', 'like', $search)
                      ->orWhere('g_age', 'like', $search)
                      ->orWhere('g_civil_status', 'like', $search)
                      ->orWhere('g_contact_number', 'like', $search)
                      ->orWhere('g_address', 'like', $search)
                      ->orWhere('relationship_with_pwd', 'like', $search);
            })
            ->paginate($this->perPage);

        return view('livewire.admin.applicant', [
            'applicants' => $applicants,
        ]);
    }
}
