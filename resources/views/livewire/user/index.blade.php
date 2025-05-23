<div>
    <section>
        <div class="px-8 py-24 mx-auto md:px-12 lg:px-32 max-w-7xl">
            <div>
                <h1 class="text-4xl font-semibold tracking-tighter text-white lg:text-6xl text-balance">
                    Creating an inclusive system for persons with disabilities
                    <span class="text-white">(PWD) in Municipality ensures that no one is left behind</span>
                </h1>
                <p class="mt-4 text-base font-medium text-gray-200 text-balance">
                    Fostering a community where accessibility and equal opportunities empower every individual to thrive and contribute
                </p>
                <div class="flex flex-col items-center gap-2 mx-auto mt-8 md:flex-row">
                    <a href="{{ route('applicant') }}">
                        <button class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium text-white duration-200 bg-gray-900 md:w-auto rounded-xl hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-black" aria-label="Primary action">
                            Apply Now
                        </button>
                    </a>
                    <a href="{{ route('req') }}">
                        <button class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium duration-200 bg-gray-100 md:w-auto rounded-xl hover:bg-gray-200 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" aria-label="Secondary action">
                            Requirements
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="py-12 bg-gray-50">
        <h2 class="text-4xl font-bold text-gray-500 mb-10 text-center">Available Benefits</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mx-8">
            @foreach ($benefits as $benefit)
                <div class="w-80 bg-blue-100 shadow-lg rounded-2xl p-6 flex flex-col items-center text-center transform transition duration-300 hover:scale-105 hover:shadow-xl">


                    <h3 class="text-xl font-semibold text-blue-700">{{ $benefit->particular }}</h3>
                    <p class="text-gray-600 text-lg font-medium mt-2">Available Slots: {{ $benefit->quantity }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <section>
<label for="" class="text-4xl font-bold text-red-500">Announcement!</label>
        @if ($announcement)
            <div class="bg-blue-50 p-6 rounded-lg shadow-md mt-8 mx-8">
                <h2 class="text-2xl font-semibold text-gray-800">{{ $announcement->title }}</h2>
                <p class="mt-2 text-lg text-gray-600">{{ $announcement->description }}</p>
            </div>
        @else
            <div class="bg-gray-50 p-6 rounded-lg shadow-md mt-8 mx-8">
                <p class="text-lg text-gray-600">No current announcements available.</p>
            </div>
        @endif
    </section>




</div>
