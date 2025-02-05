<div class="p-6 rounded-lg shadow-md bg-white h-fit mb-8 mt-2 w-5/12">
    <h3 class="text-3xl font-semibold text-gray-800 mb-6">Application Status</h3>

    <div class="bg-gradient-to-r from-green-100 to-green-50 p-6 rounded-lg border border-green-300 mb-6 shadow-md">
        <p class="text-lg font-medium text-gray-700 mb-2">Applicant Status:</p>
        <p class="text-xl font-bold text-green-700">{{ $applicantStatus }}</p>
    </div>

    <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-6 rounded-lg border border-blue-300 shadow-md">
        <h4 class="text-xl font-medium text-gray-800 mb-4">Benefits:</h4>
        <table class="w-full border border-gray-300 rounded-lg shadow-sm">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Benefit Name</th>
                </tr>
            </thead>
            <tbody>
                @forelse($benefits as $benefit)
                    <tr class="hover:bg-blue-100 transition-colors">
                        <td class="px-6 py-4 text-gray-700">
                            {{ $benefit->benefit->particular ?? 'No benefit assigned' }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="px-6 py-4 text-center text-gray-500">No benefits found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
