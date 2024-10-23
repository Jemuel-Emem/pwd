<div>
    <h1 class="text-2xl font-semibold">Add Benefits</h1>
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-4 mb-4 rounded">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="submit">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label for="particular" class="block text-sm font-medium text-gray-700">Particular</label>
                <input type="text" id="particular" wire:model="particular" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('particular') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                <input type="text" id="quantity" wire:model="quantity" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('quantity') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="mt-6">
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Add Benefits
            </button>
        </div>
    </form>

    <div class="mt-8">
        <h2 class="text-xl font-semibold">Benefits List</h2>
        <div class="mt-4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-800 ">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Particular</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Quantity</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($benefits as $benefit)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $benefit->particular }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $benefit->quantity }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button wire:click="editBenefit({{ $benefit->id }})" class="text-indigo-600 hover:text-indigo-900">Edit</button>
                                <button wire:click="deleteBenefit({{ $benefit->id }})" class="text-red-600 hover:text-red-900 ml-2">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
