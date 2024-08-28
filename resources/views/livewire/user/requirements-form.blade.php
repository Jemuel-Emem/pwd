<div class="mt-4">
    <!-- Button to Add Requirement -->
    <x-button label="Add Requirements" wire:click="$set('add_modal', true)" />
    <!-- Table to Display Requirements -->
    <div class="relative overflow-x-auto mt-4">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">#</th>
                    <th scope="col" class="px-6 py-3">Medical Certification</th>
                    <th scope="col" class="px-6 py-3">Barangay Certification</th>
                    <th scope="col" class="px-6 py-3">Birth Certificate</th>
                    <th scope="col" class="px-6 py-3">Whole Body Picture</th>
                    <th scope="col" class="px-6 py-3">ID Picture</th>
                    <th scope="col" class="px-6 py-3 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-black bg-gray-200">
                @foreach($requirements as $requirement)
                <tr>
                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4"><img src="{{ Storage::url($requirement->medical_certification) }}" alt="Medical Certification" width="50"></td>
                    <td class="px-6 py-4"><img src="{{ Storage::url($requirement->brgy_certification) }}" alt="Barangay Certification" width="50"></td>
                    <td class="px-6 py-4"><img src="{{ Storage::url($requirement->birth_certificate) }}" alt="Birth Certificate" width="50"></td>
                    <td class="px-6 py-4"><img src="{{ Storage::url($requirement->whole_body_picture) }}" alt="Whole Body Picture" width="50"></td>
                    <td class="px-6 py-4"><img src="{{ Storage::url($requirement->id_picture) }}" alt="ID Picture" width="50"></td>
                    <td class="px-6 py-4 text-center">
                        <x-button label="Edit" wire:click="edit({{ $requirement->id }})" />

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $requirements->links() }}
    </div>

    <!-- Add Requirement Modal -->
    <x-modal-card title="Requirement" name="cardModal" wire:model.defer="add_modal">
        <div class="space-y-3">
            <div>
                <label for="medical_certification" class="block text-sm font-medium text-gray-700">Medical Certification</label>
                <input type="file" id="medical_certification" wire:model="medical_certification" class="mt-1 block w-full rounded-md border-gray-300 bg-white shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('medical_certification') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="brgy_certification" class="block text-sm font-medium text-gray-700">Barangay Certification</label>
                <input type="file" id="brgy_certification" wire:model="brgy_certification" class="mt-1 block w-full rounded-md border-gray-300 bg-white shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('brgy_certification') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="birth_certificate" class="block text-sm font-medium text-gray-700">Birth Certificate</label>
                <input type="file" id="birth_certificate" wire:model="birth_certificate" class="mt-1 block w-full rounded-md border-gray-300 bg-white shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('birth_certificate') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="whole_body_picture" class="block text-sm font-medium text-gray-700">Whole Body Picture</label>
                <input type="file" id="whole_body_picture" wire:model="whole_body_picture" class="mt-1 block w-full rounded-md border-gray-300 bg-white shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('whole_body_picture') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="id_picture" class="block text-sm font-medium text-gray-700">ID Picture</label>
                <input type="file" id="id_picture" wire:model="id_picture" class="mt-1 block w-full rounded-md border-gray-300 bg-white shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('id_picture') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>
        <x-slot name="footer">
            <div class="flex justify-end gap-x-4">
                <x-button flat label="Cancel" x-on:click="close" />
                <x-button primary label="Save" wire:click="submit" />
            </div>
        </x-slot>
    </x-modal-card>

    <!-- Edit Requirement Modal -->
    <x-modal-card title="Edit Requirement" name="cardModal" wire:model.defer="edit_modal">
        <div class="space-y-3">
            <div>
                <label for="existing_medical_certification" class="block text-sm font-medium text-gray-700">Existing Medical Certification</label>
                <img src="{{ Storage::url($existing_medical_certification) }}" alt="Existing Medical Certification" width="50">
                <input type="file" id="medical_certification" wire:model="medical_certification" class="mt-1 block w-full rounded-md border-gray-300 bg-white shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('medical_certification') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="existing_brgy_certification" class="block text-sm font-medium text-gray-700">Existing Barangay Certification</label>
                <img src="{{ Storage::url($existing_brgy_certification) }}" alt="Existing Barangay Certification" width="50">
                <input type="file" id="brgy_certification" wire:model="brgy_certification" class="mt-1 block w-full rounded-md border-gray-300 bg-white shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('brgy_certification') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="existing_birth_certificate" class="block text-sm font-medium text-gray-700">Existing Birth Certificate</label>
                <img src="{{ Storage::url($existing_birth_certificate) }}" alt="Existing Birth Certificate" width="50">
                <input type="file" id="birth_certificate" wire:model="birth_certificate" class="mt-1 block w-full rounded-md border-gray-300 bg-white shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('birth_certificate') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="existing_whole_body_picture" class="block text-sm font-medium text-gray-700">Existing Whole Body Picture</label>
                <img src="{{ Storage::url($existing_whole_body_picture) }}" alt="Existing Whole Body Picture" width="50">
                <input type="file" id="whole_body_picture" wire:model="whole_body_picture" class="mt-1 block w-full rounded-md border-gray-300 bg-white shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('whole_body_picture') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="existing_id_picture" class="block text-sm font-medium text-gray-700">Existing ID Picture</label>
                <img src="{{ Storage::url($existing_id_picture) }}" alt="Existing ID Picture" width="50">
                <input type="file" id="id_picture" wire:model="id_picture" class="mt-1 block w-full rounded-md border-gray-300 bg-white shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('id_picture') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>
        <x-slot name="footer">
            <div class="flex justify-end gap-x-4">
                <x-button flat label="Cancel" x-on:click="close" />
                <x-button primary label="Save" wire:click="update" />
            </div>
        </x-slot>
    </x-modal-card>

    <!-- Delete Confirmation Modal -->
    <x-modal title="Delete Requirement" description="Are you sure you want to delete this requirement?" wire:model.defer="delete_modal">
        <x-slot name="footer">
            <div class="flex justify-end gap-x-4">
                <x-button flat label="Cancel" x-on:click="close" />
                <x-button danger label="Delete" wire:click="delete" />
            </div>
        </x-slot>
    </x-modal>
</div>
