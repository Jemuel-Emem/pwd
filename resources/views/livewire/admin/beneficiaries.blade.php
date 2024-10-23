<div class="p-6 bg-white rounded-lg shadow-md">
    <!-- Search Input -->
    <div class="flex justify-between mb-4">
        <input type="text" wire:model="search" placeholder="Search by name" class="w-80 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
        <button class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition-colors" wire:click="searchh">Search</button>
    </div>

    <!-- Beneficiaries Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead class="bg-gray-800">
                <tr>
                    <th class="px-6 py-3 text-white text-left text-xs font-medium text-gray-500 uppercase tracking-wider">First Name</th>
                    <th class="px-6 py-3 text-white text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Middle Name</th>
                    <th class="px-6 py-3 text-white text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Name</th>
                    <th class="px-6 py-3 text-white text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Suffix</th>
                    <th class="px-6 py-3 text-white text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sex</th>
                    <th class="px-6 py-3 text-white text-left text-xs font-medium text-gray-500 uppercase tracking-wider">DOB</th>
                    <th class="px-6 py-3 text-white text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Age</th>
                    <th class="px-6 py-3 text-white text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Civil Status</th>
                    <th class="px-6 py-3 text-white text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact No.</th>
                    <th class="px-6 py-3 text-white text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Address</th>
                    <th class="px-6 py-3 text-white text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Barangay</th>
                    <th class="px-6 py-3 text-white text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Disability</th>
                    <th class="px-6 py-3 text-white text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cause of Disability</th>
                    <th class="px-6 py-3 text-white text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-white text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Benefit</th>
                    <th class="px-6 py-3 text-white text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($beneficiaries as $beneficiary)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $beneficiary->first_name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $beneficiary->middle_name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $beneficiary->last_name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $beneficiary->suffix }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ ucfirst($beneficiary->sex) }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ \Carbon\Carbon::parse($beneficiary->date_of_birth)->format('Y-m-d') }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $beneficiary->age }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $beneficiary->civil_status }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $beneficiary->contact_number }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $beneficiary->address }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $beneficiary->barangay }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $beneficiary->type_of_disability }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $beneficiary->cause_of_disability }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ ucfirst($beneficiary->applicantstatus) }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $beneficiary->benefit }}</td>
                        <td class="px-6 py-4">
                            <button wire:click="openModal({{ $beneficiary->id }})" class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600 w-32">Add Benefit</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="15" class="px-6 py-4 text-center text-sm text-gray-500">No beneficiaries found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination Links -->
    <div class="mt-4">
        {{ $beneficiaries->links() }}
    </div>

    <!-- Add Benefit Modal -->
    @if($modalVisible)
    <div class="fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Add Benefit for {{ $selectedBeneficiary->first_name }}</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">Please add the benefit for this beneficiary below.</p>
                                <input type="text" wire:model="benefit" placeholder="Enter benefit" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button wire:click="addBenefitToBeneficiary" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">Save</button>
                    <button wire:click="closeModal" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:w-auto sm:text-sm">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
