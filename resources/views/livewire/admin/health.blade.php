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
                    <option value="">Select User</option>
                    @foreach (App\Models\User::all() as $user)
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
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">User ID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Email</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">BP</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">BY</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Weight</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Height</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($users as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                            @if ($user->healthRecords->isNotEmpty())
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->healthRecords->first()->blood_pressure }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->healthRecords->first()->blood_type }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->healthRecords->first()->weight }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->healthRecords->first()->height }}</td>
                            @else
                                <td colspan="4" class="px-6 py-4 whitespace-nowrap text-center">No health records</td>
                            @endif
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button wire:click="editHealthInfo({{ $user->healthRecords->first()->id ?? '' }})"
                                    class="text-indigo-600 hover:text-indigo-900" {{ $user->healthRecords->isEmpty() ? 'disabled' : '' }}>Edit</button>
                                <button wire:click="deleteHealthInfo({{ $user->healthRecords->first()->id ?? '' }})"
                                    class="text-red-600 hover:text-red-900 ml-2" {{ $user->healthRecords->isEmpty() ? 'disabled' : '' }}>Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-4">No users or health records found.</td>
                        </tr>
                    @endforelse
                </tbody>


            </table>
        </div>
    </div>


    <div class="mt-4">
        {{ $users->links() }}
    </div>

</div>
