<div class="bg-white p-6 rounded-lg shadow-md">


    @if ($beneficiariesWithBenefits->isEmpty())
        <p class="text-gray-500">No users have received benefits yet.</p>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto bg-white border border-gray-200 rounded-lg shadow">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold">First Name</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Last Name</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Benefits</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Applicant Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($beneficiariesWithBenefits as $beneficiary)
                        <tr class="hover:bg-gray-100 transition-colors duration-200">
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $beneficiary->first_name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $beneficiary->last_name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $beneficiary->benefit }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $beneficiary->applicantstatus }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <div class="mt-4">
            {{ $beneficiariesWithBenefits->links('pagination::tailwind') }}
        </div>
    @endif
</div>
