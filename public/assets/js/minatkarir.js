
let data1 = document.getElementById('realistic');
let data2 = document.getElementById('investigative');
let data3 = document.getElementById('artistic');
let data4 = document.getElementById('social');
let data5 = document.getElementById('enterprise');
let data6 = document.getElementById('conventional');

let ctx = document.getElementById('myChart').getContext('2d');
    let myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Realistic', 'Investigative', 'Artistic', 'Social', 'Enterprise', 'Conventional'],
            datasets: [{
                label: 'Persentase (%)',
                // data:@json($data_diagram);
                data : [data1.value, data2.value, data3.value, data4.value, data5.value, data5.value],
                // data: [70, 60, 20, 10, 30, 70],
                backgroundColor: [
                  'rgba(210, 180, 140, 0.8)',
                  'rgba(128, 128, 0, 0.8)',
                  'rgba(204, 85, 0, 0.8)',
                  'rgba(183, 65, 14, 0.8)',
                  'rgba(204, 204, 0, 0.8)',
                  'rgba(138, 154, 91, 0.8)'
                ],
                borderColor: [
                  'rgba(210, 180, 140, 1)',
                  'rgba(128, 128, 0, 1)',
                  'rgba(204, 85, 0, 1)',
                  'rgba(183, 65, 14, 1)',
                  'rgba(204, 204, 0, 1)',
                  'rgba(138, 154, 91, 1)'
                ],
                borderWidth: 1,
                borderRadius: Number.MAX_VALUE,
                fill: true,
                borderSkipped: false,
            }]
        },
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }],
                xAxes: [{
            categoryPercentage: 0.8,
            barPercentage: 0.9
        }]
            }
        }
    });