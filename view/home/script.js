var colors = ['#007bff','#28a745','#333333','#c3e6cb','#dc3545','#6c757d'];
  var chBar = document.getElementById("chBar"); 
  new Chart(chBar, {
  type: 'bar',
  data: {
    labels: ["Vutupoca", "Jardim São Paulo", "Jardim Brasil"],
    datasets: [
      {
        label: "ph",
        backgroundColor: "#3e95cd",
        data: [2,4,6]
      },
      {
        label: "cloro (ppm)",
        backgroundColor: "#8e5ea2",
        data: [4,3,5]
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