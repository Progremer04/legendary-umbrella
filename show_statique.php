<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Statistics</title>
    <!-- Include Chart.js from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            text-align: center;
        }

        h1 {
            color: #3498db;
        }

        button {
            padding: 10px;
            font-size: 16px;
            background-color: #3498db;
            color: #fff;
            border: none;
            cursor: pointer;
            margin-bottom: 20px;
        }

        canvas {
            max-width: 100%;
            margin: 20px 0;
        }
    </style>
</head>
<body>

<h1>Student Statistics</h1>

<button onclick="showStatistics()">Show Statistics</button>
<button><a href="index.php" target="_blank">Came Back</a></button>

<!-- Canvas elements for charts -->
<div style="display: flex; flex-wrap: wrap; justify-content: space-around;">
    <canvas id="pieChart" width="400" height="300"></canvas>
    <canvas id="histogramChart" width="400" height="300"></canvas>
</div>

<script>
    function showStatistics() {
        // Fetch data from PHP script
        fetch('get_data.php')
            .then(response => response.json())
            .then(data => {
                // Proportional Circle Chart
                var ctxPie = document.getElementById('pieChart').getContext('2d');
                var pieChart = new Chart(ctxPie, {
                    type: 'pie',
                    data: {
                        labels: data.genders,
                        datasets: [{
                            data: data.genderCounts,
                            backgroundColor: ['#3498db', '#e74c3c'],
                        }]
                    }
                });

                // Histogram Chart
                var ctxHistogram = document.getElementById('histogramChart').getContext('2d');
                var histogramChart = new Chart(ctxHistogram, {
                    type: 'bar',
                    data: {
                        labels: data.genders,
                        datasets: [{
                            label: 'Number of Students by Gender',
                            data: data.genderCounts,
                            backgroundColor: ['#3498db', '#e74c3c'],
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
            })
            .catch(error => console.error('Error fetching data:', error));
    }
</script>

</body>
</html>
