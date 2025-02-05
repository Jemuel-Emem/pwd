<div class="mt-4">

    <x-button label="Add Requirements" class="w-full sm:w-auto" wire:click="$set('add_modal', true)" />


    <div class="relative overflow-x-auto mt-4">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 hidden sm:table">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-4 py-2">#</th>
                    <th scope="col" class="px-4 py-2">Medical Certification</th>
                    <th scope="col" class="px-4 py-2">Barangay Certification</th>
                    <th scope="col" class="px-4 py-2">Birth Certificate</th>
                    <th scope="col" class="px-4 py-2">Whole Body Picture</th>
                    <th scope="col" class="px-4 py-2">ID Picture</th>
                    <th scope="col" class="px-4 py-2 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-black bg-gray-200">
                @foreach($requirements as $requirement)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2"><img src="{{ Storage::url($requirement->medical_certification) }}" alt="Medical Certification" class="w-10 h-10 object-cover"></td>
                    <td class="px-4 py-2"><img src="{{ Storage::url($requirement->brgy_certification) }}" alt="Barangay Certification" class="w-10 h-10 object-cover"></td>
                    <td class="px-4 py-2"><img src="{{ Storage::url($requirement->birth_certificate) }}" alt="Birth Certificate" class="w-10 h-10 object-cover"></td>
                    <td class="px-4 py-2"><img src="{{ Storage::url($requirement->whole_body_picture) }}" alt="Whole Body Picture" class="w-10 h-10 object-cover"></td>
                    <td class="px-4 py-2"><img src="{{ Storage::url($requirement->id_picture) }}" alt="ID Picture" class="w-10 h-10 object-cover"></td>
                    <td class="px-4 py-2 text-center">
                        <x-button label="Edit" class="text-xs sm:text-sm" wire:click="edit({{ $requirement->id }})" />
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Mobile View -->
        <div class="sm:hidden space-y-4">
            @foreach($requirements as $requirement)
            <div class="bg-gray-100 p-4 rounded-lg shadow-md">
                <div class="flex justify-between items-center mb-2">
                    <span class="font-semibold text-gray-700">#{{ $loop->iteration }}</span>
                    <x-button label="Edit" class="text-xs" wire:click="edit({{ $requirement->id }})" />
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div class="text-center">
                        <span class="text-xs block text-gray-600">Medical Cert</span>
                        <img src="{{ Storage::url($requirement->medical_certification) }}" class="w-14 h-14 object-cover mx-auto">
                    </div>
                    <div class="text-center">
                        <span class="text-xs block text-gray-600">Barangay Cert</span>
                        <img src="{{ Storage::url($requirement->brgy_certification) }}" class="w-14 h-14 object-cover mx-auto">
                    </div>
                    <div class="text-center">
                        <span class="text-xs block text-gray-600">Birth Cert</span>
                        <img src="{{ Storage::url($requirement->birth_certificate) }}" class="w-14 h-14 object-cover mx-auto">
                    </div>
                    <div class="text-center">
                        <span class="text-xs block text-gray-600">Whole Body</span>
                        <img src="{{ Storage::url($requirement->whole_body_picture) }}" class="w-14 h-14 object-cover mx-auto">
                    </div>
                    <div class="text-center">
                        <span class="text-xs block text-gray-600">ID Picture</span>
                        <img src="{{ Storage::url($requirement->id_picture) }}" class="w-14 h-14 object-cover mx-auto">
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{ $requirements->links() }}
    </div>



    <x-modal-card title="Requirement" name="cardModal" wire:model.defer="add_modal">
        <div class="space-y-3">
            <div>
                <label class="block text-sm font-medium text-gray-700">Medical Certification</label>
                <input type="file" wire:model="medical_certification" class="mt-1 block w-full rounded-md border-gray-300">
                @error('medical_certification') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Barangay Certification</label>
                <input type="file" wire:model="brgy_certification" class="mt-1 block w-full rounded-md border-gray-300">
                @error('brgy_certification') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Birth Certificate</label>
                <input type="file" wire:model="birth_certificate" class="mt-1 block w-full rounded-md border-gray-300">
                @error('birth_certificate') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Whole Body Picture</label>
                <input type="file" wire:model="whole_body_picture" class="mt-1 block w-full rounded-md border-gray-300">
                @error('whole_body_picture') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">ID Picture</label>
                <input type="file" wire:model="id_picture" class="mt-1 block w-full rounded-md border-gray-300">
                @error('id_picture') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
        </div>
        <x-slot name="footer">
            <div class="flex flex-col sm:flex-row justify-end gap-2 sm:gap-4">
                <x-button flat label="Cancel" x-on:click="close" class="w-full sm:w-auto" />
                <x-button primary label="Save" wire:click="submit" class="w-full sm:w-auto" />
            </div>
        </x-slot>
    </x-modal-card>


    <x-modal-card title="Edit Requirement" name="cardModal" wire:model.defer="edit_modal">
        <div class="space-y-3">
            <div>
                <label class="block text-sm font-medium text-gray-700">Existing Medical Certification</label>
                <img src="{{ Storage::url($existing_medical_certification) }}" class="w-16 h-16 object-cover">
                <input type="file" wire:model="medical_certification" class="mt-1 block w-full rounded-md border-gray-300">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Existing Barangay Certification</label>
                <img src="{{ Storage::url($existing_brgy_certification) }}" class="w-16 h-16 object-cover">
                <input type="file" wire:model="brgy_certification" class="mt-1 block w-full rounded-md border-gray-300">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Existing Birth Certificate</label>
                <img src="{{ Storage::url($existing_birth_certificate) }}" class="w-16 h-16 object-cover">
                <input type="file" wire:model="birth_certificate" class="mt-1 block w-full rounded-md border-gray-300">
            </div>
        </div>
        <x-slot name="footer">
            <div class="flex flex-col sm:flex-row justify-end gap-2 sm:gap-4">
                <x-button flat label="Cancel" x-on:click="close" class="w-full sm:w-auto" />
                <x-button primary label="Save" wire:click="update" class="w-full sm:w-auto" />
            </div>
        </x-slot>
    </x-modal-card>


    <x-modal title="Delete Requirement" description="Are you sure you want to delete this requirement?" wire:model.defer="delete_modal">
        <x-slot name="footer">
            <div class="flex flex-col sm:flex-row justify-end gap-2 sm:gap-4">
                <x-button flat label="Cancel" x-on:click="close" class="w-full sm:w-auto" />
                <x-button danger label="Delete" wire:click="delete" class="w-full sm:w-auto" />
            </div>
        </x-slot>
    </x-modal>
</div>
