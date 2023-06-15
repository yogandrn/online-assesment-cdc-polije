
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
                data : [data1.value, data2.value, data3.value, data4.value, data5.value, data6.value],
                // data: [70, 60, 20, 10, 30, 70],
                backgroundColor: [
                  'rgba(84, 89, 158, 1)',
                  'rgba(132, 94, 194, 1)',
                  'rgba(214, 93, 177, 1)',
                  'rgba(255, 111, 145, 1)',
                  'rgba(255, 150, 113, 1)',
                  'rgba(255, 199, 95, 1)',
                ],
                borderColor: [
                  'rgba(84, 89, 158, 1)',
                  'rgba(132, 94, 194, 1)',
                  'rgba(214, 93, 177, 1)',
                  'rgba(255, 111, 145, 1)',
                  'rgba(255, 150, 113, 1)',
                  'rgba(255, 199, 95, 1)',
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