<div>
    <h1 class="text-2xl font-semibold text-gray-800 mb-4">Manage Announcements</h1>

    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-4 mb-4 rounded">
            {{ session('message') }}
        </div>
    @endif


    <form wire:submit.prevent="{{ $isEdit ? 'updateAnnouncement' : 'createAnnouncement' }}">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" id="title" wire:model="title"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" wire:model="description"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="mt-6">
            <button type="submit"
                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ $isEdit ? 'Update Announcement' : 'Upload Announcement' }}
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
        <h2 class="text-xl font-semibold text-gray-800">Announcements List</h2>
        <div class="mt-4 overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-800">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Title</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Description</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($announcements as $announcement)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $announcement->title }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $announcement->description }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button wire:click="editAnnouncement({{ $announcement->id }})"
                                    class="text-indigo-600 hover:text-indigo-900">Edit</button>
                                <button wire:click="deleteAnnouncement({{ $announcement->id }})"
                                    class="text-red-600 hover:text-red-900 ml-2">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-4">No announcements found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $announcements->links() }}
    </div>
</div>
