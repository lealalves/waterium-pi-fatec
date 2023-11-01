feather.replace({ 'aria-hidden': 'true' })

var colors = ['#007bff','#28a745','#333333','#c3e6cb','#dc3545','#6c757d'];

/* large line chart */
var chLine = document.getElementById("chLine");
var chartData = {
  labels: ["Setembro"],
  datasets: [{
    label: "ph",
    data: [6, 3],
    backgroundColor: 'transparent',
    borderColor: colors[0],
    borderWidth: 4,
    pointBackgroundColor: colors[0]
  },
  {
    label: "cloro",
    data: [5, 9],
    backgroundColor: 'transparent',
    borderColor: colors[1],
    borderWidth: 4,
    pointBackgroundColor: colors[1]
  }
  ]
};

if (chLine) {
  new Chart(chLine, {
    type: 'line',
    data: chartData,
    options: {
      title: {
        display: true,
        text: "parâmetros de caixas d'água"
      },
      scales: {
        xAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      },
      legend: {
        display: true
      },
      responsive: true
    }
  });
}