<!-- resources/views/livewire/admin/applicant.blade.php -->
<div class="max-w-6xl mx-auto py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Applicants</h1>
        <a href="{{ route('add-applicant') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Applicant</a>
    </div>

    <div class="mb-6 flex items-center">
        <input type="text" wire:model.debounce.300ms="search" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Search applicants...">
        <button wire:click="searchApplicants" class="ml-4 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Search</button>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="overflow-x-auto max-h-96">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-800">
                    <tr>

                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">First Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Middle Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Last Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Suffix</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Sex</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Date of Birth</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Age</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Civil Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Contact Number</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Address</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Barangay</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Type of Disability</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Cause of Disability</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Guardian First Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Guardian Middle Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Guardian Last Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Guardian Suffix</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Guardian Sex</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Guardian Date of Birth</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Guardian Age</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Guardian Civil Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Guardian Contact Number</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Guardian Address</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Benefit</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Relationship with PWD</th>


                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($applicants as $applicant)
                        <tr>

                            <td class="px-6 py-4 whitespace-nowrap">{{ $applicant->first_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $applicant->middle_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $applicant->last_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $applicant->suffix }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $applicant->sex }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $applicant->date_of_birth }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $applicant->age }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $applicant->civil_status }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $applicant->contact_number }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $applicant->address }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $applicant->barangay }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $applicant->type_of_disability }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $applicant->cause_of_disability }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $applicant->g_first_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $applicant->g_middle_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $applicant->g_last_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $applicant->g_suffix }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $applicant->g_sex }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $applicant->g_date_of_birth }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $applicant->g_age }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $applicant->g_civil_status }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $applicant->g_contact_number }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $applicant->g_address }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($applicant->benefit_id)
                                    @php
                                        $benefit = App\Models\Benefits::find($applicant->benefit_id);
                                    @endphp
                                    @if($benefit)
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            {{ $benefit->particular }}
                                        </span>
                                    @else
                                        <span class="text-gray-500">No benefits (invalid ID: {{ $applicant->benefit_id }})</span>
                                    @endif
                                @else
                                    <span class="text-gray-500">No benefits</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $applicant->relationship_with_pwd }}</td>


                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($applicant->status === 'approved' || $applicant->status === 'decline')
                                    <span class="text-gray-500 font-semibold">No Actions Needed</span>
                                @else
                                    <button
                                        wire:click="approveApplicant({{ $applicant->id }})"
                                        class="font-bold py-1 px-3 rounded bg-green-500 hover:bg-green-700 text-white">
                                        Approve
                                    </button>

                                    <button
                                        wire:click="rejectApplicant({{ $applicant->id }})"
                                        class="font-bold py-1 px-3 rounded bg-red-500 hover:bg-red-700 text-white">
                                        Decline
                                    </button>
                                @endif
                            </td>


                        </tr>
                    @empty
                        <tr>
                            <td colspan="24" class="px-6 py-4 text-center text-gray-500">No applicants found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-3">
            {{ $applicants->links() }}
        </div>
    </div>
</div>
