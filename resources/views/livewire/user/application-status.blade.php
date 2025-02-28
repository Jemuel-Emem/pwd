<div class="p-6 rounded-lg shadow-md bg-white h-fit mb-8 mt-2 w-5/12">
    <h3 class="text-3xl font-semibold text-gray-800 mb-6">Application Status</h3>

    <!-- Applicant Status Section -->
    <div class="bg-gradient-to-r from-green-100 to-green-50 p-6 rounded-lg border border-green-300 mb-6 shadow-md">
        <p class="text-lg font-medium text-gray-700 mb-2">Applicant Status:</p>
        <p class="text-xl font-bold text-green-700">{{ $applicantStatus }}</p>
    </div>

    <!-- Benefits Section -->
    <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-6 rounded-lg border border-blue-300 shadow-md">
        <h4 class="text-xl font-medium text-gray-800 mb-4">Benefits:</h4>

        @if($benefits->isEmpty())
        <p class="text-gray-500 text-center">No benefits assigned.</p>
    @else
        <ul class="space-y-2">
            @foreach($benefits as $benefit)
                <li class="flex items-center space-x-3 p-3 bg-white rounded-lg shadow-sm border border-gray-200 hover:bg-blue-50 transition">
                    <span class="text-blue-600">🏷️</span>
                    <span class="text-gray-800 font-medium">{{ $benefit->particular }}</span>
                </li>
            @endforeach
        </ul>
    @endif

    </div>
</div>
