<div>
    <!-- Search Input -->
    <div class="w-full flex justify-end gap-2">
        <input type="text" wire:model="search" placeholder="Search by name" class="w-80 h-10 form-control mb-3">
        <button class="bg-green-500 text-white h-10 w-32 hover:bg-green-600" wire:click="searchh">Search</button>
    </div>

    <!-- Beneficiaries Table -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Suffix</th>
                <th>Sex</th>
                <th>Date of Birth</th>
                <th>Age</th>
                <th>Civil Status</th>
                <th>Contact Number</th>
                <th>Address</th>
                <th>Barangay</th>
                <th>Type of Disability</th>
                <th>Cause of Disability</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($beneficiaries as $beneficiary)
                <tr>
                    <td>{{ $beneficiary->first_name }}</td>
                    <td>{{ $beneficiary->middle_name }}</td>
                    <td>{{ $beneficiary->last_name }}</td>
                    <td>{{ $beneficiary->suffix }}</td>
                    <td>{{ ucfirst($beneficiary->sex) }}</td>
                    <td>{{ \Carbon\Carbon::parse($beneficiary->date_of_birth)->format('Y-m-d') }}</td>
                    <td>{{ $beneficiary->age }}</td>
                    <td>{{ $beneficiary->civil_status }}</td>
                    <td>{{ $beneficiary->contact_number }}</td>
                    <td>{{ $beneficiary->address }}</td>
                    <td>{{ $beneficiary->barangay }}</td>
                    <td>{{ $beneficiary->type_of_disability }}</td>
                    <td>{{ $beneficiary->cause_of_disability }}</td>
                    <td>{{ ucfirst($beneficiary->applicantstatus) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="13">No beneficiaries found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="mt-3">
        {{ $beneficiaries->links() }}
    </div>
</div>
