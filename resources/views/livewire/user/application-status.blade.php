<div class="p-6 bg-white rounded-lg shadow-md border border-gray-200 h-5/12 mb-8 mt-2 w-5/12">
    <!-- Application Status Header -->
    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Application Status</h3>

    <!-- Status Information -->
    <div class="bg-gray-50 p-4 rounded-lg border border-gray-300 mb-4">
        <p class="text-lg font-medium text-gray-700 mb-2">Applicant Status:</p>
        <p class="text-xl font-bold text-green-600">{{ $applicantStatus }}</p>
    </div>

    <!-- Benefits Table -->
    <div class="bg-gray-50 p-4 rounded-lg border border-gray-300">
        <h4 class="text-lg font-medium text-gray-700 mb-2">Benefits:</h4>
        <table class="w-full border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border border-gray-300 text-left">Benefit Name</th>

                </tr>
            </thead>
            <tbody>
                @forelse($benefits as $benefit)
                    <tr>
                        <td class="px-4 py-2 border border-gray-300">{{ $benefit->benefit}}</td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="px-4 py-2 border border-gray-300 text-center">No benefits found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
