<div>
    <h1 class="text-2xl font-semibold text-gray-800 mb-4">Manage Health Information</h1>

    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-4 mb-4 rounded">
            {{ session('message') }}
        </div>
    @endif


    <form wire:submit.prevent="{{ $isEdit ? 'updateHealthInfo' : 'createHealthInfo' }}">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="user_id" class="block text-sm font-medium text-gray-700">User</label>
                <select id="user_id" wire:model="user_id"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="">Select Resident</option>
                @foreach (App\Models\User::where('is_admin', 0)->get() as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>

                @error('user_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="blood_pressure" class="block text-sm font-medium text-gray-700">Blood Pressure (BP)</label>
                <input type="text" id="blood_pressure" wire:model="blood_pressure"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('blood_pressure') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="blood_type" class="block text-sm font-medium text-gray-700">Blood Type (BY)</label>
                <input type="text" id="blood_type" wire:model="blood_type"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('blood_type') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="weight" class="block text-sm font-medium text-gray-700">Weight</label>
                <input type="text" id="weight" wire:model="weight"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('weight') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="height" class="block text-sm font-medium text-gray-700">Height</label>
                <input type="text" id="height" wire:model="height"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('height') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="respiratory_rate" class="block text-sm font-medium text-gray-700">Respiratory Rate</label>
                <input type="text" id="respiratory_rate" wire:model="respiratory_rate"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('respiratory_rate') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="pulse_rate" class="block text-sm font-medium text-gray-700">Pulse Rate</label>
                <input type="text" id="pulse_rate" wire:model="pulse_rate"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('pulse_rate') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="o2_stat" class="block text-sm font-medium text-gray-700">O2 Stat</label>
                <input type="text" id="o2_stat" wire:model="o2_stat"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('o2_stat') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="temperature" class="block text-sm font-medium text-gray-700">Temperature</label>
                <input type="text" id="temperature" wire:model="temperature"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('temperature') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="col-span-2">
                <label for="other_conditions" class="block text-sm font-medium text-gray-700">Other Health Conditions</label>
                <textarea id="other_conditions" wire:model="other_conditions"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                @error('other_conditions') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="col-span-2">
                <label for="remarks" class="block text-sm font-medium text-gray-700">Remarks</label>
                <textarea id="remarks" wire:model="remarks"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                @error('remarks') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="col-span-2">
                <label for="date" class="block text-sm font-medium text-gray-700">Date Completed</label>
                <input type="date" id="date" wire:model="date"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

        </div>

        <div class="mt-6">
            <button type="submit"
                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ $isEdit ? 'Update Health Info' : 'Add Health Info' }}
            </button>
            @if ($isEdit)
                <button type="button" wire:click="resetFields"
                    class="ml-2 inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    Cancel
                </button>
            @endif
        </div>
    </form>


    <div class="mt-8">
        <h2 class="text-xl font-semibold text-gray-800">Health Information List</h2>
        <div class="mt-4 overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">

                <thead class="bg-gray-800">
                    <tr>
                        {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">User ID</th> --}}
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Email</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">BP</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">BY</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Weight</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Height</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Remarks</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Date</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($users as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>

                            @if ($user->healthRecords->isNotEmpty())
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->healthRecords->first()->blood_pressure }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->healthRecords->first()->blood_type }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->healthRecords->first()->weight }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->healthRecords->first()->height }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->healthRecords->first()->remarks }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->healthRecords->first()->date }}</td>
                            @else
                                <td class="px-6 py-4 whitespace-nowrap text-center" colspan="6">No health records</td>
                            @endif

                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                @if ($user->healthRecords->isNotEmpty())
                                    <button wire:click="editHealthInfo({{ $user->healthRecords->first()->id }})"
                                        class="text-indigo-600 hover:text-indigo-900">Edit</button>
                                    <button wire:click="deleteHealthInfo({{ $user->healthRecords->first()->id }})"
                                        class="text-red-600 hover:text-red-900 ml-2">Delete</button>
                                    <button
                                        onclick="printHealthRecord({
                                            name: '{{ $user->name }}',
                                            blood_pressure: '{{ $user->healthRecords->first()->blood_pressure ?? 'N/A' }}',
                                            blood_type: '{{ $user->healthRecords->first()->blood_type ?? 'N/A' }}',
                                            weight: '{{ $user->healthRecords->first()->weight ?? 'N/A' }}',
                                            height: '{{ $user->healthRecords->first()->height ?? 'N/A' }}',
                                            respiratory_rate: '{{ $user->healthRecords->first()->respiratory_rate ?? 'N/A' }}',
                                            pulse_rate: '{{ $user->healthRecords->first()->pulse_rate ?? 'N/A' }}',
                                            o2_stat: '{{ $user->healthRecords->first()->o2_stat ?? 'N/A' }}',
                                            temperature: '{{ $user->healthRecords->first()->temperature ?? 'N/A' }}',
                                            other_conditions: '{{ $user->healthRecords->first()->other_conditions ?? 'N/A' }}',
                                            remarks: '{{ $user->healthRecords->first()->remarks ?? 'N/A' }}',
                                            date: '{{ $user->healthRecords->first()->date ?? 'N/A' }}'
                                        })"
                                        class="text-gray-600 hover:text-gray-900 ml-2">Print</button>
                                @else
                                    <span class="text-gray-500">No actions available</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center py-4">No users or health records found.</td>
                        </tr>
                    @endforelse
                </tbody>


            </table>

            <div class="mt-4">
                {{ $users->links() }}
            </div>
        </div>


    </div>


    <div class="mt-4">
        {{ $users->links() }}
    </div>
    <div id="printArea" class="hidden print:block">
        <h2 class="text-2xl font-bold text-center mb-4">Health Information</h2>
        <div class="grid grid-cols-3 gap-4 border p-4 rounded-md">
            <div class="col-span-1 border-b pb-2">
                <h3 class="font-semibold">Name</h3>
                <p id="printName" class="text-gray-700"></p>
            </div>
            <div class="col-span-1 border-b pb-2">
                <h3 class="font-semibold">Blood Pressure</h3>
                <p id="printBloodPressure" class="text-gray-700"></p>
            </div>
            <div class="col-span-1 border-b pb-2">
                <h3 class="font-semibold">Blood Type</h3>
                <p id="printBloodType" class="text-gray-700"></p>
            </div>
            <div class="col-span-1 border-b pb-2">
                <h3 class="font-semibold">Weight</h3>
                <p id="printWeight" class="text-gray-700"></p>
            </div>
            <div class="col-span-1 border-b pb-2">
                <h3 class="font-semibold">Height</h3>
                <p id="printHeight" class="text-gray-700"></p>
            </div>
            <div class="col-span-1 border-b pb-2">
                <h3 class="font-semibold">Respiratory Rate</h3>
                <p id="printRespiratoryRate" class="text-gray-700"></p>
            </div>
            <div class="col-span-1 border-b pb-2">
                <h3 class="font-semibold">Pulse Rate</h3>
                <p id="printPulseRate" class="text-gray-700"></p>
            </div>
            <div class="col-span-1 border-b pb-2">
                <h3 class="font-semibold">O2 Stat</h3>
                <p id="printO2Stat" class="text-gray-700"></p>
            </div>
            <div class="col-span-1">
                <h3 class="font-semibold">Temperature</h3>
                <p id="printTemperature" class="text-gray-700"></p>
            </div>
            <div class="col-span-3">
                <h3 class="font-semibold">Other Health Conditions</h3>
                <p id="printOtherConditions" class="text-gray-700"></p>
            </div>
            <div class="col-span-3 border-b pb-2">
                <h3 class="font-semibold">Remarks</h3>
                <p id="printRemarks" class="text-gray-700"></p>
            </div>
            <div class="col-span-3">
                <h3 class="font-semibold">Date</h3>
                <p id="printDateCompleted" class="text-gray-700"></p>
            </div>
        </div>
    </div>

    <style>
        @media print {
            .hidden {
                display: none !important;
            }
            .print:block {
                display: block !important;
            }
            #printArea {
                margin: 0 auto;
                padding: 20px;
                max-width: 800px;
                border: 1px solid #ddd;
                border-radius: 8px;
                font-family: Arial, sans-serif;
            }
            h2 {
                color: #333;
            }
            .grid {
                display: grid;
                gap: 16px;
            }
            .grid-cols-3 {
                grid-template-columns: repeat(3, 1fr);
            }
            .border {
                border: 1px solid #ccc;
            }
            .rounded-md {
                border-radius: 8px;
            }
            .text-gray-700 {
                color: #555;
            }
        }
    </style>


    <script>
     function printHealthRecord(data) {
    document.getElementById('printName').textContent = `Name: ${data.name}`;
    document.getElementById('printBloodPressure').textContent = `Blood Pressure: ${data.blood_pressure}`;
    document.getElementById('printBloodType').textContent = `Blood Type: ${data.blood_type}`;
    document.getElementById('printWeight').textContent = `Weight: ${data.weight}`;
    document.getElementById('printHeight').textContent = `Height: ${data.height}`;
    document.getElementById('printRespiratoryRate').textContent = `Respiratory Rate: ${data.respiratory_rate}`;
    document.getElementById('printPulseRate').textContent = `Pulse Rate: ${data.pulse_rate}`;
    document.getElementById('printO2Stat').textContent = `O2 Stat: ${data.o2_stat}`;
    document.getElementById('printTemperature').textContent = `Temperature: ${data.temperature}`;
    document.getElementById('printOtherConditions').textContent = `Other Conditions: ${data.other_conditions}`;
    document.getElementById('printRemarks').textContent = `Remarks: ${data.remarks}`;
    document.getElementById('printDate').textContent = `Date: ${data.date}`;

    const originalBodyContent = document.body.innerHTML;
    const printContents = document.getElementById('printArea').innerHTML;

    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalBodyContent;
}


    </script>


</div>
