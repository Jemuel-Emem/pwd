<div>
    <div class="p-6 bg-white rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-800">Qualified Applicants</h2>

            <!-- Date Filters -->
            <div class="flex items-center gap-4">
                <select wire:model="selectedMonth" class="p-2 border rounded-lg">
                    <option value="">Select Month</option>
                    @foreach(range(1,12) as $month)
                        <option value="{{ $month }}">{{ date("F", mktime(0, 0, 0, $month, 1)) }}</option>
                    @endforeach
                </select>

                <select wire:model="selectedYear" class="p-2 border rounded-lg">
                    <option value="">Select Year</option>
                    @foreach(range(date('Y'), date('Y') - 5) as $year)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </select>

                <button wire:click="filterApplicants" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    View Applicants
                </button>
            </div>
        </div>

        <div id="printableTable">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-sm">
                <thead class="bg-gray-900 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Full Name</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Sex</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Date of Birth</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Contact Number</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Address</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($qualifiedApplicants as $applicant)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-6 py-4">{{ $applicant->first_name }} {{ $applicant->middle_name }} {{ $applicant->last_name }}</td>
                            <td class="px-6 py-4">{{ $applicant->sex }}</td>
                            <td class="px-6 py-4">{{ $applicant->date_of_birth }}</td>
                            <td class="px-6 py-4">{{ $applicant->contact_number }}</td>
                            <td class="px-6 py-4">{{ $applicant->address }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">No qualified applicants found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <button onclick="printTable()" class="px-4 py-2 bg-gray-600 text-white hover:bg-gray-700 focus:outline-none mt-4 w-64">
            Print
        </button>
        <div class="mt-4">
            {{ $qualifiedApplicants->links() }}
        </div>
    </div>

    <script>
        function printTable() {
            var printContents = document.getElementById("printableTable").innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload(); // Reload to restore functionality
        }
    </script>

</div>
