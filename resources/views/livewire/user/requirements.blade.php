<div class="mt-4">
    <!-- Button to trigger modal -->
    <x-button label="Add Requirements" class="w-full sm:w-auto" wire:click="$set('add_modal', true)" />

    <!-- Table for large screens -->
    <div class="relative overflow-x-auto mt-4">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 hidden sm:table">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Medical Certification</th>
                    <th class="px-4 py-2">Barangay Certification</th>
                    <th class="px-4 py-2">Birth Certificate</th>
                    <th class="px-4 py-2">Whole Body Picture</th>
                    <th class="px-4 py-2">ID Picture</th>
                    <th class="px-4 py-2 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-black bg-gray-200">
                @foreach($requirements as $requirement)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2"><img src="{{ Storage::url($requirement->medical_certification) }}" class="w-10 h-10 object-cover"></td>
                    <td class="px-4 py-2"><img src="{{ Storage::url($requirement->brgy_certification) }}" class="w-10 h-10 object-cover"></td>
                    <td class="px-4 py-2"><img src="{{ Storage::url($requirement->birth_certificate) }}" class="w-10 h-10 object-cover"></td>
                    <td class="px-4 py-2"><img src="{{ Storage::url($requirement->whole_body_picture) }}" class="w-10 h-10 object-cover"></td>
                    <td class="px-4 py-2"><img src="{{ Storage::url($requirement->id_picture) }}" class="w-10 h-10 object-cover"></td>
                    <td class="px-4 py-2 text-center">
                        <x-button label="Edit" class="text-xs sm:text-sm" wire:click="edit({{ $requirement->id }})" />
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <x-modal wire:model.defer="add_modal">
        <div class="p-4">
            <h2 class="text-lg font-bold mb-4">Add Requirements</h2>

            <form wire:submit.prevent="save">
                <div class="space-y-4">
                    <input type="file" wire:model="medical_certification" class="border p-2 w-full">
                    <input type="file" wire:model="brgy_certification" class="border p-2 w-full">
                    <input type="file" wire:model="birth_certificate" class="border p-2 w-full">
                    <input type="file" wire:model="whole_body_picture" class="border p-2 w-full">
                    <input type="file" wire:model="id_picture" class="border p-2 w-full">
                </div>

                <div class="mt-4 flex justify-end">
                    <x-button label="Cancel" class="mr-2 bg-gray-500" wire:click="$set('add_modal', false)" />
                    <x-button label="Save" type="submit" />
                </div>
            </form>
        </div>
    </x-modal>
</div>
