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

    <div class="col-span-2">
        <canvas id="barangayBenefitChart" width="400" height="200"></canvas>
    </div>

    <script>
        var barangayNames = @json($barangayBenefitCounts->pluck('barangay'));
        var benefitCounts = @json($barangayBenefitCounts->pluck('count'));


        function generateRandomColors(count) {
            var colors = [];
            for (var i = 0; i < count; i++) {
                var color = 'rgba(' + Math.floor(Math.random() * 256) + ',' +
                            Math.floor(Math.random() * 256) + ',' +
                            Math.floor(Math.random() * 256) + ', 0.5)';
                colors.push(color);
            }
            return colors;
        }

        var barColors = generateRandomColors(barangayNames.length);

        var ctx = document.getElementById('barangayBenefitChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: barangayNames,
                datasets: [{
                    label: 'Benifits Distributed',
                    data: benefitCounts,
                    backgroundColor: barColors,
                    borderColor: barColors.map(color => color.replace('0.5', '1')),
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</div>
