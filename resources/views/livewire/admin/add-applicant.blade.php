<div>
    <x-notifications />
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg mt-4">
        <h2 class="text-2xl font-bold mb-6">Personal Information</h2>
        <form wire:submit.prevent="submit">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Personal Information -->
                <div>
                    <label for="firstname" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" id="firstname" wire:model="personal_info.first_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('personal_info.first_name') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="middlename" class="block text-sm font-medium text-gray-700">Middle Name</label>
                    <input type="text" id="middlename" wire:model="personal_info.middle_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('personal_info.middle_name') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="lastname" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" id="lastname" wire:model="personal_info.last_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('personal_info.last_name') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="suffix" class="block text-sm font-medium text-gray-700">Suffix</label>
                    <input type="text" id="suffix" wire:model="personal_info.suffix" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('personal_info.suffix') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="sex" class="block text-sm font-medium text-gray-700">Sex</label>
                    <select id="sex" wire:model="personal_info.sex" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Select</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                    @error('personal_info.sex') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="dob" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                    <input type="date" id="dob" wire:model="personal_info.date_of_birth" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('personal_info.date_of_birth') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
                    <input type="number" id="age" wire:model="personal_info.age" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('personal_info.age') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="civilstatus" class="block text-sm font-medium text-gray-700">Civil Status</label>
                    <select id="civilstatus" wire:model="personal_info.civil_status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Select</option>
                        <option>Single</option>
                        <option>Married</option>
                        <option>Divorced</option>
                        <option>Widowed</option>
                    </select>
                    @error('personal_info.civil_status') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="contactnumber" class="block text-sm font-medium text-gray-700">Contact Number</label>
                    <input type="tel" id="contactnumber" wire:model="personal_info.contact_number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('personal_info.contact_number') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" id="address" wire:model="personal_info.address" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('personal_info.address') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="barangay" class="block text-sm font-medium text-gray-700">Barangay</label>
                    <input type="text" id="barangay" wire:model="personal_info.barangay" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('personal_info.barangay') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="type_of_disability" class="block text-sm font-medium text-gray-700">Type of Disability</label>
                    <select id="type_of_disability" wire:model="personal_info.type_of_disability" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Select</option>
                        <option>Deaf or Hard of Hearing</option>
                        <option>Blind or Visually Impaired</option>
                        <option>Mobility Impairmnet</option>
                        <option>Intellectual Dissabilty</option>
                    </select>

                    @error('personal_info.type_of_disability') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="cause_of_disability" class="block text-sm font-medium text-gray-700">Cause of Disability</label>
                    <select id="cause_of_disability" wire:model="personal_info.cause_of_disability" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Select</option>
                        <option>Congenital/Inborn</option>
                        <option>Accident</option>
                        <option>Illness</option>

                    </select>

                    @error('personal_info.cause_of_disability') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>

            <h2 class="text-2xl font-bold mt-6 mb-6">Guardian Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Guardian Information -->
                <div>
                    <label for="g_firstname" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" id="g_firstname" wire:model="personal_info.g_first_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('personal_info.g_first_name') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="g_middlename" class="block text-sm font-medium text-gray-700">Middle Name</label>
                    <input type="text" id="g_middlename" wire:model="personal_info.g_middle_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('personal_info.g_middle_name') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="g_lastname" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" id="g_lastname" wire:model="personal_info.g_last_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('personal_info.g_last_name') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="g_suffix" class="block text-sm font-medium text-gray-700">Suffix</label>
                    <input type="text" id="g_suffix" wire:model="personal_info.g_suffix" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('personal_info.g_suffix') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="g_sex" class="block text-sm font-medium text-gray-700">Sex</label>
                    <select id="g_sex" wire:model="personal_info.g_sex" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Select</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                    @error('personal_info.g_sex') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="g_dob" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                    <input type="date" id="g_dob" wire:model="personal_info.g_date_of_birth" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('personal_info.g_date_of_birth') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="g_age" class="block text-sm font-medium text-gray-700">Age</label>
                    <input type="number" id="g_age" wire:model="personal_info.g_age" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('personal_info.g_age') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="g_civilstatus" class="block text-sm font-medium text-gray-700">Civil Status</label>
                    <select id="g_civilstatus" wire:model="personal_info.g_civil_status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Select</option>
                        <option>Single</option>
                        <option>Married</option>
                        <option>Divorced</option>
                        <option>Widowed</option>
                    </select>
                    @error('personal_info.g_civil_status') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="g_contactnumber" class="block text-sm font-medium text-gray-700">Contact Number</label>
                    <input type="tel" id="g_contactnumber" wire:model="personal_info.g_contact_number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('personal_info.g_contact_number') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="g_address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" id="g_address" wire:model="personal_info.g_address" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('personal_info.g_address') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="relationship_with_pwd" class="block text-sm font-medium text-gray-700">Relationship with PWD</label>
                    <input type="text" id="relationship_with_pwd" wire:model="personal_info.relationship_with_pwd" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('personal_info.relationship_with_pwd') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save Information
                </button>
            </div>
        </form>
    </div>
</div>
