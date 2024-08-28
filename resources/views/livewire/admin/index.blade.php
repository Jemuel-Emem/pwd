<div class="grid grid-cols-2 gap-4 mb-6">
    <div class="bg-green-500 shadow-md rounded-lg p-4 flex items-center">
        <x-icon name="home" class="w-12 h-12 mr-4 text-gray-500 font-bold" />
        <div>
            <div class="text-xl font-bold text-white">PWD</div>
            <div class="text-gray-500 text-white">{{ $pwdCount }}</div>
        </div>
    </div>
    <div class="bg-blue-500 shadow-md rounded-lg p-4 flex items-center">
        <i class="ri-wheelchair-line text-6xl text-gray-500"></i>
        <div>
            <div class="text-xl text-white font-bold">Benefits</div>
            <div class="text-gray-500 text-white">{{ $benefitsCount }}</div>
        </div>
    </div>
</div>
