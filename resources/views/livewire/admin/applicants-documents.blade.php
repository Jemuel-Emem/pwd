<div class="max-w-6xl mx-auto py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Applicants Documents</h1>
    </div>
    <div class="mb-6 flex items-center">
        <input type="text" wire:model.debounce.300ms="search" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Search applicants...">
        <button wire:click="searchApplicantsDocuments" class="ml-4 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Search</button>
    </div>
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="overflow-x-auto max-h-96">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-800">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Medical Certification</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Brgy Certification</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Birth Certificate</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Whole Body Picture</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">ID Picture</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($requirements as $requirement)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap"><a href="" target="_blank">{{ $requirement->name }}</a></td>
                            <td class="px-6 py-4 whitespace-nowrap"><a href="{{ Storage::url($requirement->medical_certification) }}" target="_blank"><img src="{{ Storage::url($requirement->medical_certification) }}" alt="Medical Certification" width="50"></a></td>
                            <td class="px-6 py-4 whitespace-nowrap"><a href="{{ Storage::url($requirement->brgy_certification) }}" target="_blank"><img src="{{ Storage::url($requirement->brgy_certification) }}" alt="Brgy Certification" width="50"></a></td>
                            <td class="px-6 py-4 whitespace-nowrap"><a href="{{ Storage::url($requirement->birth_certificate) }}" target="_blank"><img src="{{ Storage::url($requirement->birth_certificate) }}" alt="Birth Certificate" width="50"></a></td>
                            <td class="px-6 py-4 whitespace-nowrap"><a href="{{ Storage::url($requirement->whole_body_picture) }}" target="_blank"><img src="{{ Storage::url($requirement->whole_body_picture) }}" alt="Whole Body Picture" width="50"></a></td>
                            <td class="px-6 py-4 whitespace-nowrap"><a href="{{ Storage::url($requirement->id_picture) }}" target="_blank"><img src="{{ Storage::url($requirement->id_picture) }}" alt="ID Picture" width="50"></a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">No requirements found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-6 py-3">
            {{ $requirements->links() }}
        </div>
    </div>
</div>
