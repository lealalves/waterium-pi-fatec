feather.replace({ 'aria-hidden': 'true' })

var colors = ['#007bff', '#28a745', '#333333', '#c3e6cb', '#dc3545', '#6c757d'];
var chBar = document.getElementById("chBar");
new Chart(chBar, {
  type: 'bar',
  data: {
    labels: ["Jardim Ipanema", "Jardim São Paulo", "Jardim Brasil"],
    datasets: [
      {
        label: "ph",
        backgroundColor: colors[0],
        data: [7.50, 6, 4.20]
      },
      {
        label: "turbidez",
        backgroundColor: colors[1],
        data: [1.20, 2.3, 1.90]
      },
      {
        label: "fluoreto",
        backgroundColor: colors[2],
        data: [0.03, 0.05, 0.09]
      },
      {
        label: "cloro (ppm)",
        backgroundColor: colors[5],
        data: [0.80, 0.50, 0.30]
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: "média de parâmetros de caixas d'água mês de setembro"
    },
    legend: {
      display: true
    },
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }],
      xAxes: [{
        barPercentage: 0.4,
        categoryPercentage: 0.5
      }]
    }
  }
});