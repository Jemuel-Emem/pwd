<div>
    <div class="p-6 bg-white rounded-lg shadow-md">
        <!-- Success and Error Messages -->
        @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('message') }}
        </div>
        @endif

        @if (session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            {{ session('error') }}
        </div>
        @endif

        <!-- Search Input -->
        <div class="flex justify-between mb-4">
            <input type="text" wire:model="search" placeholder="Search by name" class="w-80 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
            <button class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition-colors" wire:click="searchh">Search</button>
        </div>

        <!-- Beneficiaries Table -->
        <div class="overflow-x-auto">
            <table id="printTable" class="min-w-full bg-white border border-gray-200">
                <thead class="bg-gray-800">
                    <tr>
                        <th class="px-6 py-3 text-white text-left text-xs font-medium uppercase tracking-wider">First Name</th>
                        <th class="px-6 py-3 text-white text-left text-xs font-medium uppercase tracking-wider">Middle Name</th>
                        <th class="px-6 py-3 text-white text-left text-xs font-medium uppercase tracking-wider">Last Name</th>
                        <th class="px-6 py-3 text-white text-left text-xs font-medium uppercase tracking-wider">Suffix</th>
                        <th class="px-6 py-3 text-white text-left text-xs font-medium uppercase tracking-wider">Sex</th>
                        <th class="px-6 py-3 text-white text-left text-xs font-medium uppercase tracking-wider">DOB</th>
                        <th class="px-6 py-3 text-white text-left text-xs font-medium uppercase tracking-wider">Age</th>
                        <th class="px-6 py-3 text-white text-left text-xs font-medium uppercase tracking-wider">Civil Status</th>
                        <th class="px-6 py-3 text-white text-left text-xs font-medium uppercase tracking-wider">Contact No.</th>
                        <th class="px-6 py-3 text-white text-left text-xs font-medium uppercase tracking-wider">Address</th>
                        <th class="px-6 py-3 text-white text-left text-xs font-medium uppercase tracking-wider">Barangay</th>
                        <th class="px-6 py-3 text-white text-left text-xs font-medium uppercase tracking-wider">Disability</th>
                        <th class="px-6 py-3 text-white text-left text-xs font-medium uppercase tracking-wider">Cause of Disability</th>
                        <th class="px-6 py-3 text-white text-left text-xs font-medium uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-white text-left text-xs font-medium uppercase tracking-wider">Benefit</th>
                        <th class="px-6 py-3 text-white text-left text-xs font-medium uppercase tracking-wider">Action</th>
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
                        <td class="px-6 py-4 text-sm text-gray-900">
                            <button wire:click="viewBenefits({{ $beneficiary->id }})" class=" text-blue-500 px-3 py-1 rounded-lg hover:text-blue-600">View Benefits</button>
                        </td>
                        <td class="px-6 py-4">
                            @if($beneficiary->benefits->isNotEmpty())
                                <span class="text-gray-500">No Actions Needed</span>
                                <button wire:click="openModal({{ $beneficiary->id }})" class="bg-green-500 text-white px-3 py-1 rounded-lg hover:bg-green-600 w-40 mt-2">Add Another Benefit</button>
                            @else
                                <button wire:click="openModal({{ $beneficiary->id }})" class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600 w-32">Add Benefit</button>
                            @endif
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="15" class="px-6 py-4 text-center text-sm text-gray-500">No beneficiaries found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Print Button -->
            <div class="no-print">
                <button onclick="printTable()" class="bg-gray-500 text-white w-64 p-1 text-center mt-2">Print</button>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $beneficiaries->links() }}
        </div>
    </div>
    @if($viewBenefitsModal)
    <div class="fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Benefits for {{ $selectedBeneficiaryName }}</h3>
                    <div class="mt-2">
                        @if(empty($benefitsList) || count($benefitsList) === 0)
                            <p class="text-gray-500">No benefits assigned.</p>
                        @else
                            <ul class="list-disc pl-6">
                                @foreach($benefitsList as $benefit)
                                    <li class="text-gray-800 font-medium">{{ $benefit->particular }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button wire:click="closeViewBenefitsModal" class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:w-auto sm:text-sm">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Modal for Adding Benefit -->
    @if($modalVisible)
    <div class="fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <!-- Modal content -->
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Add Benefit for {{ $selectedBeneficiary->first_name }}</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">Select a benefit to assign to this beneficiary.</p>
                                <select wire:model="benefit" class="w-full px-4 py-2 mt-2 border-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                    <option value="">Select Benefit</option>
                                    @foreach($benefits as $benefit)
                                        <option value="{{ $benefit->id }}">{{ $benefit->particular }}</option>
                                    @endforeach
                                </select>
                                @error('benefit') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
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

    <!-- Print Script -->
    <script>
        function printTable() {
            var tableContent = document.getElementById('printTable').outerHTML;
            var originalContent = document.body.innerHTML;
            document.body.innerHTML = tableContent;
            window.print();
            document.body.innerHTML = originalContent;
            location.reload();
        }
    </script>
</div>
