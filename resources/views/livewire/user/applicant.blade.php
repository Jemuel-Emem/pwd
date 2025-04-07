<div>

    @if (!$isFormVisible)
    <div class="max-w-7xl mx-auto bg-white p-8 rounded-lg shadow-xl mt-6">
        <p class="text-lg font-medium text-gray-700">Your personal information has already been submitted.</p>

        <h2 class="text-2xl font-semibold text-gray-800 mt-6 mb-6">Submitted Information</h2>

        @if ($applicantStatus)
            <p class="text-lg font-medium text-gray-600">Applicant Status: <span class="font-bold text-green-600">{{ $applicantStatus }}</span></p>
        @else
            {{-- <p class="text-lg font-medium">No applicant status found for this user.</p> --}}
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-6">
            <div class="p-4 bg-gray-50 rounded-lg shadow-md border border-gray-200">
                <strong class="text-gray-700">First Name:</strong> <span class="text-gray-600">{{ $personal_info['first_name'] }}</span>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg shadow-md border border-gray-200">
                <strong class="text-gray-700">Middle Name:</strong> <span class="text-gray-600">{{ $personal_info['middle_name'] }}</span>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg shadow-md border border-gray-200">
                <strong class="text-gray-700">Last Name:</strong> <span class="text-gray-600">{{ $personal_info['last_name'] }}</span>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg shadow-md border border-gray-200">
                <strong class="text-gray-700">Suffix:</strong> <span class="text-gray-600">{{ $personal_info['suffix'] }}</span>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg shadow-md border border-gray-200">
                <strong class="text-gray-700">Sex:</strong> <span class="text-gray-600">{{ $personal_info['sex'] }}</span>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg shadow-md border border-gray-200">
                <strong class="text-gray-700">Date of Birth:</strong> <span class="text-gray-600">{{ $personal_info['date_of_birth'] }}</span>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg shadow-md border border-gray-200">
                <strong class="text-gray-700">Age:</strong> <span class="text-gray-600">{{ $personal_info['age'] }}</span>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg shadow-md border border-gray-200">
                <strong class="text-gray-700">Civil Status:</strong> <span class="text-gray-600">{{ $personal_info['civil_status'] }}</span>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg shadow-md border border-gray-200">
                <strong class="text-gray-700">Contact Number:</strong> <span class="text-gray-600">{{ $personal_info['contact_number'] }}</span>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg shadow-md border border-gray-200">
                <strong class="text-gray-700">Address:</strong> <span class="text-gray-600">{{ $personal_info['address'] }}</span>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg shadow-md border border-gray-200">
                <strong class="text-gray-700">Barangay:</strong> <span class="text-gray-600">{{ $personal_info['barangay'] }}</span>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg shadow-md border border-gray-200">
                <strong class="text-gray-700">Type of Disability:</strong> <span class="text-gray-600">{{ $personal_info['type_of_disability'] }}</span>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg shadow-md border border-gray-200">
                <strong class="text-gray-700">Cause of Disability:</strong> <span class="text-gray-600">{{ $personal_info['cause_of_disability'] }}</span>
            </div>

            <!-- Guardian Information -->
            <div class="p-4 bg-gray-50 rounded-lg shadow-md border border-gray-200">
                <strong class="text-gray-700">Guardian First Name:</strong> <span class="text-gray-600">{{ $personal_info['g_first_name'] }}</span>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg shadow-md border border-gray-200">
                <strong class="text-gray-700">Guardian Middle Name:</strong> <span class="text-gray-600">{{ $personal_info['g_middle_name'] }}</span>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg shadow-md border border-gray-200">
                <strong class="text-gray-700">Guardian Last Name:</strong> <span class="text-gray-600">{{ $personal_info['g_last_name'] }}</span>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg shadow-md border border-gray-200">
                <strong class="text-gray-700">Guardian Suffix:</strong> <span class="text-gray-600">{{ $personal_info['g_suffix'] }}</span>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg shadow-md border border-gray-200">
                <strong class="text-gray-700">Guardian Sex:</strong> <span class="text-gray-600">{{ $personal_info['g_sex'] }}</span>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg shadow-md border border-gray-200">
                <strong class="text-gray-700">Guardian Date of Birth:</strong> <span class="text-gray-600">{{ $personal_info['g_date_of_birth'] }}</span>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg shadow-md border border-gray-200">
                <strong class="text-gray-700">Guardian Age:</strong> <span class="text-gray-600">{{ $personal_info['g_age'] }}</span>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg shadow-md border border-gray-200">
                <strong class="text-gray-700">Guardian Civil Status:</strong> <span class="text-gray-600">{{ $personal_info['g_civil_status'] }}</span>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg shadow-md border border-gray-200">
                <strong class="text-gray-700">Guardian Contact Number:</strong> <span class="text-gray-600">{{ $personal_info['g_contact_number'] }}</span>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg shadow-md border border-gray-200">
                <strong class="text-gray-700">Guardian Address:</strong> <span class="text-gray-600">{{ $personal_info['g_address'] }}</span>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg shadow-md border border-gray-200">
                <strong class="text-gray-700">Relationship with PWD:</strong> <span class="text-gray-600">{{ $personal_info['relationship_with_pwd'] }}</span>
            </div>
            {{-- <td class="px-6 py-4 whitespace-nowrap">
                @if($applicant && $applicant->benefit)
                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                        {{ $applicant->benefit->particular }}
                    </span>
                @else
                    <span class="text-gray-500">No benefit selected</span>
                @endif
            </td> --}}
        </div>
    </div>

    @else

    <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow-lg mt-4">
        <h2 class="text-2xl font-bold mb-6">Personal Information Form</h2>
        <form wire:submit.prevent="submitPersonalInformation">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input id="first_name" type="text" wire:model.defer="personal_info.first_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                    @error('personal_info.first_name') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="middle_name" class="block text-sm font-medium text-gray-700">Middle Name</label>
                    <input id="middle_name" type="text" wire:model.defer="personal_info.middle_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                    @error('personal_info.middle_name') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input id="last_name" type="text" wire:model.defer="personal_info.last_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                    @error('personal_info.last_name') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="suffix" class="block text-sm font-medium text-gray-700">Suffix</label>
                    <input id="suffix" type="text" wire:model.defer="personal_info.suffix" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                    @error('personal_info.suffix') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="sex" class="block text-sm font-medium text-gray-700">Sex</label>
                    <select id="sex" wire:model.defer="personal_info.sex" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="">Select Sex</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    @error('personal_info.sex') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                    <input id="date_of_birth" type="date" wire:model.defer="personal_info.date_of_birth" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" onchange="calculateAge()"/>
                    @error('personal_info.date_of_birth') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
                    <input id="age" type="number" wire:model.defer="personal_info.age" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" readonly/>
                    @error('personal_info.age') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="civil_status" class="block text-sm font-medium text-gray-700">Civil Status</label>
                    <select id="civil_status" wire:model.defer="personal_info.civil_status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="">Select Civil Status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Widowed">Widowed</option>
                        <option value="Divorced">Divorced</option>
                    </select>
                    @error('personal_info.civil_status') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="contact_number" class="block text-sm font-medium text-gray-700">Contact Number</label>
                    <input id="contact_number" type="text" wire:model.defer="personal_info.contact_number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                    @error('personal_info.contact_number') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input id="address" type="text" wire:model.defer="personal_info.address" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                    @error('personal_info.address') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="barangay" class="block text-sm font-medium text-gray-700">Barangay</label>
                    <select id="barangay" wire:model.defer="personal_info.barangay" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="">Select Barangay</option>
                        <option value="Bambad">Bambad</option>
                        <option value="Bual">Bual</option>
                        <option value="Dansuli">Dansuli</option>
                        <option value="D'lotilla">D'lotilla</option>
                        <option value="Impao">Impao</option>
                        <option value="Kalawag I">Kalawag I</option>
                        <option value="Kalawag II">Kalawag II</option>
                        <option value="Kalawag III">Kalawag III</option>
                        <option value="Kenram">Kenram</option>
                        <option value="Kolambog">Kolambog</option>
                        <option value="Kudanding">Kudanding</option>
                        <option value="Lagandang">Lagandang</option>
                        <option value="Laguilayan">Laguilayan</option>
                        <option value="Mapantig">Mapantig</option>
                        <option value="New Pangasinan">New Pangasinan</option>
                        <option value="Sampao">Sampao</option>
                        <option value="Tayugo">Tayugo</option>
                    </select>
                    @error('personal_info.barangay') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="type_of_disability" class="block text-sm font-medium text-gray-700">Type of Disability</label>
                    <select id="type_of_disability" wire:model="personal_info.type_of_disability" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Select</option>
                        <option>Learning Disability</option>
                        <option>Hearing Impairment</option>
                        <option>Visual Disability</option>
                        <option>Development Disability</option>
                        <option>Emotional Disturbance</option>
                        <option>Orthopedic Impairment</option>
                        <option>Autism</option>
                        <option>Physical Disability</option>
                        <option>Deaf-Blindness</option>
                        <option>ADHD</option>
                        <option>Mobility Impairment</option>
                        <option>Mental - Illness Disability</option>
                        <option>Speech and Language Impairment</option>
                        <option>Intellectual Disability</option>
                        <option>Speech Disability</option>
                        <option>Cerebral Palsy</option>
                        <option>Neurological Disorder</option>
                        <option>Mental & Speech Disability</option>
                        <option>Dwarfism</option>
                    </select>

                    @error('personal_info.type_of_disability')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="cause_of_disability" class="block text-sm font-medium text-gray-700">Cause of Disability</label>
                    <input id="cause_of_disability" type="text" wire:model.defer="personal_info.cause_of_disability" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                    @error('personal_info.cause_of_disability') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="g_first_name" class="block text-sm font-medium text-gray-700">Guardian First Name</label>
                    <input id="g_first_name" type="text" wire:model.defer="personal_info.g_first_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                    @error('personal_info.g_first_name') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="g_middle_name" class="block text-sm font-medium text-gray-700">Guardian Middle Name</label>
                    <input id="g_middle_name" type="text" wire:model.defer="personal_info.g_middle_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                    @error('personal_info.g_middle_name') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="g_last_name" class="block text-sm font-medium text-gray-700">Guardian Last Name</label>
                    <input id="g_last_name" type="text" wire:model.defer="personal_info.g_last_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                    @error('personal_info.g_last_name') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="g_suffix" class="block text-sm font-medium text-gray-700">Guardian Suffix</label>
                    <input id="g_suffix" type="text" wire:model.defer="personal_info.g_suffix" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                    @error('personal_info.g_suffix') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="g_sex" class="block text-sm font-medium text-gray-700">Guardian Sex</label>
                    <select id="g_sex" wire:model.defer="personal_info.g_sex" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="">Select Guardian Sex</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    @error('personal_info.g_sex') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="g_date_of_birth" class="block text-sm font-medium text-gray-700">Guardian Date of Birth</label>
                    <input id="g_date_of_birth" type="date" wire:model.defer="personal_info.g_date_of_birth" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" onchange="calculateGuardianAge()" />
                    @error('personal_info.g_date_of_birth') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="g_age" class="block text-sm font-medium text-gray-700">Guardian Age</label>
                    <input id="g_age" type="number" wire:model.defer="personal_info.g_age" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" readonly />
                    @error('personal_info.g_age') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="g_civil_status" class="block text-sm font-medium text-gray-700">Guardian Civil Status</label>
                    <select id="g_civil_status" wire:model.defer="personal_info.g_civil_status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="">Select Guardian Civil Status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Widowed">Widowed</option>
                        <option value="Divorced">Divorced</option>
                    </select>
                    @error('personal_info.g_civil_status') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="g_contact_number" class="block text-sm font-medium text-gray-700">Guardian Contact Number</label>
                    <input id="g_contact_number" type="text" wire:model.defer="personal_info.g_contact_number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                    @error('personal_info.g_contact_number') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="g_address" class="block text-sm font-medium text-gray-700">Guardian Address</label>
                    <input id="g_address" type="text" wire:model.defer="personal_info.g_address" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                    @error('personal_info.g_address') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="relationship_with_pwd" class="block text-sm font-medium text-gray-700">Relationship with PWD</label>
                    <input id="relationship_with_pwd" type="text" wire:model.defer="personal_info.relationship_with_pwd" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                    @error('personal_info.relationship_with_pwd') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="benefit_id" class="block text-sm font-medium text-gray-700">Benefit</label>
                    <select
                        id="benefit_id"
                        wire:model="benefit_id"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    >
                        <option value="">Select Benefit</option>
                        @foreach($benefitsList as $benefit)
                            <option value="{{ $benefit->id }}">{{ $benefit->particular }}</option>
                        @endforeach
                    </select>
                    @error('benefit_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Submit</button>
            </div>
        </form>
    </div>
    @endif


    <script>
        function calculateAge() {
            let dob = document.getElementById('date_of_birth').value;
            if (dob) {
                let dobDate = new Date(dob);
                let today = new Date();
                let age = today.getFullYear() - dobDate.getFullYear();
                let monthDiff = today.getMonth() - dobDate.getMonth();
                let dayDiff = today.getDate() - dobDate.getDate();

                // Adjust age if the birthday hasn't occurred yet this year
                if (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)) {
                    age--;
                }

                document.getElementById('age').value = age;
            }
        }

        function calculateGuardianAge() {
        let dob = document.getElementById('g_date_of_birth').value;
        if (dob) {
            let birthDate = new Date(dob);
            let today = new Date();
            let age = today.getFullYear() - birthDate.getFullYear();
            let monthDiff = today.getMonth() - birthDate.getMonth();
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            document.getElementById('g_age').value = age;
        }
    }
    </script>
</div>
